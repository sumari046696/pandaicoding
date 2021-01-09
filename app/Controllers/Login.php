<?php
namespace App\Controllers;

use \CodeIgniter\Controller;
use App\Models\LoginModel;

class Login extends BaseController
{
    public $loginModel;
    public $session;
    public function __construct()
    {
        helper('form');
        $this->loginModel = new LoginModel();
        $this->session = session();
    }
    public function index()
    {
        $data = [];
        //Site Login
        $data['validation'] = null;
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email'     => 'required|valid_email',
                'password'  => 'required|min_length[6]|max_length[16]',
            ];
            if ($this->validate($rules)){

                $email  = $this->request->getVar('email');
                $password  = $this->request->getVar('password');

                $userdata = $this->loginModel->verifyEmail($email);
                if ($userdata) {

                    if (password_verify($password, $userdata['password'])) {
                        if ($userdata['status']=='active') {

                            $loginInfo = [
                                'uniid' => $userdata['uniid'],
                                'agent' => $this->getUserAgentInfo(),
                                'ip'    => $this->request->getIPAddress(),
                                'login_time'    => date('Y-m-d h:i:s'),
                            ];
                            $la_id = $this->loginModel->saveLoginInfo($loginInfo);
                            if ($la_id) {
                                $this->session->set('logged_info', $la_id);
                            } else {

                            }

                            $this->session->set('logged_user', $userdata['uniid']);
                            return redirect()->to(base_url().'/dashboard');
                        } else {
                            $this->session->setTempdata('error','Please active your accout. Contact Admin', 3);
                            return redirect()->to(current_url());
                        }
                    } else {
                        $this->session->setTempdata('error','Sorry! Wrong password entered for that email', 3);
                        return redirect()->to(current_url());
                    }

                } else {
                    $this->session->setTempdata('error','Sorry! Email does not exists', 3);
                    return redirect()->to(current_url());
                }

            } else {
                $data['validation'] = $this->validator;
            }
        }

        require_once 'app/Libraries/vendor/autoload.php';
        $google_client = new \Google_Client();
        $google_client->setClientId('496702007093-1hn24s0ddfljeo7m15qhua8nn8dv7fmt.apps.googleusercontent.com'); //Define your ClientID
        $google_client->setClientSecret('-bWofwg7SKSy71_7wiUD5gDg'); //Define your Client Secret Key
        $google_client->setRedirectUri(base_url().'/login/google_login'); //Define your Redirect Uri
        $google_client->addScope('email');
        $google_client->addScope('profile');
        if (!$this->session->get('access_token')) {
            $data['loginButton'] = $google_client->createAuthUrl();
        }
        // Google Login

        // Facebook Login
        require_once 'app/Libraries/vendor/autoload.php';
        $facebook = new \Facebook\Facebook([
            'app_id'                  => '349298416280518',
            'app_secret'              => 'a67e75614657b5f90d4c6e7694059449',
            'default_graph_version'   => 'v5.7'
        ]);
        $facebook_helper = $facebook->getRedirectLoginHelper();
        $facebook_permissions = ['email'];
        if (!$this->session->get('access_token')) {
            $fb_permissions = ['email'];
            $data['loginfacebookButton'] = $facebook_helper->getLoginUrl(base_url().'/login/facebook_login',$fb_permissions);
        }

        return view('login_view', $data);
    }

    public function google_login()
    {
       require_once '/app/Libraries/vendor/autoload.php';
        $google_client = new \Google_Client();
        $google_client->setClientId('496702007093-1hn24s0ddfljeo7m15qhua8nn8dv7fmt.apps.googleusercontent.com');
        $google_client->setClientSecret('-bWofwg7SKSy71_7wiUD5gDg');
        $google_client->setRedirectUri(base_url().'/login/google_login');
        $google_client->addScope('email');
        $google_client->addScope('profile');

        if ($this->request->getVar('code')) {
            $token = $google_client->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
            if(!isset($token['error']))
            {
                $google_client->setAccessToken($token['access_token']);
                $this->session->set('access_token', $token['access_token']);
                $google_service = new \Google_Service_Oauth2($google_client);
                $gdata = $google_service->userinfo->get();
                if ($this->loginModel->google_user_exists($gdata['id'])) {
                    //User Update
                    $userData = [
                        'first_name'    => $gdata['given_name'],
                        'last_name'     => $gdata['family_name'],
                        'email'         => $gdata['email'],
                        'profile_pic'   => $gdata['picture'],
                        'provider'   => 'Google'
                    ];
                    $this->loginModel->updateGoogleUser($userData,$gdata['id']);

                } else {
                    //User Insert
                    $userData = [
                        'oauth_id'      => $gdata['id'],
                        'first_name'    => $gdata['given_name'],
                        'last_name'     => $gdata['family_name'],
                        'email'         => $gdata['email'],
                        'profile_pic'   => $gdata['picture'],
                        'provider'   => 'Google'
                    ];
                    $this->loginModel->createGoogleUser($userData);
                }
                $this->session->set('google_user',$userData);
                return redirect()->to(base_url()."/dashboard");
            }
        }

        if (!$this->session->get('access_token')) {
            $data['loginButton'] = $google_client->createAuthUrl();
        }
    }

    public function facebook_login()
    {
       require_once '/app/Libraries/vendor/autoload.php';
        $facebook = new \Facebook\Facebook([
          'app_id'                  => '349298416280518',
          'app_secret'              => 'a67e75614657b5f90d4c6e7694059449',
          'default_graph_version'   => 'v2.3'
        ]);
        $facebook_helper = $facebook->getRedirectLoginHelper();

        if ($this->request->getVar('state')) {
            $facebook_helper->getPersistentDataHandler()->set('state', $this->request->getVar('state'));
        }

        if($this->request->getVar('code'))
        {
            if (session()->get('access_token')) {
                $access_token = session()->get('access_token');
            } else {
                $access_token = $facebook_helper->getAccessToken();
                session()->set('access_token',$access_token);
                $facebook->setDefaultAccessToken(session()->get('access_token'));
            }
            $graph_response = $facebook->get("/me?fields=id,first_name,last_name,email,picture", $access_token);
            $fb_user_info = $graph_response->getGraphUser();

            if ($this->loginModel->google_user_exists($fb_user_info['id'])) {
                //Update
                $fbdata = [
                    'oauth_id'      => $fb_user_info['id'],
                    'first_name'    => $fb_user_info['first_name'],
                    'last_name'     => $fb_user_info['last_name'],
                    'email'         => $fb_user_info['email'],
                    'profile_pic'   => $fb_user_info['picture']['url'],
                    'provider'      => 'Facebook'
                ];
                $this->loginModel->updateGoogleUser($fbdata,$fb_user_info['id']);
            } else {
                //insert
                $fbdata = [
                    'oauth_id'      => $fb_user_info['id'],
                    'first_name'    => $fb_user_info['first_name'],
                    'last_name'     => $fb_user_info['last_name'],
                    'email'         => $fb_user_info['email'],
                    'profile_pic'   => $fb_user_info['picture']['url'],
                    'provider'      => 'Facebook'
                ];
                $this->loginModel->createGoogleUser($fbdata);
            }

            $this->session->set('facebook_user',$fbdata);
            return redirect()->to(base_url()."/dashboard");
        }

        if (!$this->session->get('access_token')) {
            $fb_permissions = ['email'];
            $data['loginfacebookButton'] = $facebook_helper->getLoginUrl(base_url().'/login/facebook_login',$fb_permissions);
        }
    }

    public function getUserAgentInfo()
    {
        $agent = $this->request->getUserAgent();

            if ($agent->isBrowser()) {
                 $currentAgent = $agent->getBrowser().' '.$agent->getVersion();
            } elseif ($agent->isRobot()) {
                $currentAgent = $this->agent->robot();
            } elseif ($agent->isMobile()) {
                $currentAgent = $agent->getMobile();
            } else {
                $currentAgent = 'Unidentified User Agent';
            }

        return $currentAgent;

    }

}
