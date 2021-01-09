<?php 
namespace App\Controllers;

use \CodeIgniter\Controller;
use App\Models\UserModel;

class User extends BaseController
{
    public $uModel;
    public function __construct(){
        $this->uModel = new UserModel();

    }

	public function index()
	{
        if (!session()->has('logged_user')) {
            return redirect()->to(base_url()."/login");
        }

        $uniid = session()->get('logged_user');
        $data['userdata'] = $this->uModel->getLoggedInUserData($uniid);
        return view('admin/user_view', $data);
        
    }

    public function logout()
    {
        if (session()->has('logged_info')) {
            $la_id = session()->get('logged_info');
            $this->uModel->updateLogoutTime($la_id);
        }

        session()->remove('logged_user');
        session()->destroy();
        return redirect()->to(base_url()."/login");
    }

    public function login_activity()
    {
        $data['userdata'] = $this->uModel->getLoggedInUserData(session()->get('logged_user'));
        $data['login_info'] = $this->uModel->getLoginUserInfo(session()->get('logged_user'));
        
        return view('admin/login_activity', $data);
    }

}
