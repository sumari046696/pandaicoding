<?php

namespace App\Controllers;

use \CodeIgniter\Controller;
use App\Models\RegisterModel;

class Register extends BaseController
{
    public $registerModel;
    public $session;
    public $email;
    public function __construct()
    {
        helper('form');
        helper('date');
        $this->registerModel = new RegisterModel();
        $this->session  = \Config\Services::session();
        $this->email    = \Config\Services::email();
    }
    public function index()
    {
        $data = [];
        $data['validation'] = \config\services::validation();
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'firstname' => 'required',
                'lastlame'  => 'required',
                'usermame'  => 'required|min_length[6]|max_length[20]',
                'email'     => 'required|valid_email|is_unique[users.email]',
                'password'  => 'required|min_length[6]|max_length[16]',
                'cpassword' => 'required|matches[password]',
                'phone'     => 'required|exact_length[12]|numeric',
            ];
            if ($this->validate($rules))
            {
               $uniid = md5(str_shuffle('abscefihgjklmonpqrtuvwxzy'.time()));
               $userdata = [
                    'firstname'         => $this->request->getVar('firstname'),
                    'lastlame'          => $this->request->getVar('lastlame'),
                    'usermame'          => $this->request->getVar('usermame'),
                    'email'             => $this->request->getVar('email'),
                    'password'          => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'phone'             => $this->request->getVar('phone'),
                    'uniid'             => $uniid,
                    'activation_date'   => date("Y-m-d h:i:s")
               ];
               if ($this->registerModel->createUser($userdata)) {
                   $to = $this->request->getVar('email');
                   $subject = 'Account Activation link - boscoding';
                   $message = 'Hi '.$this->request->getVar('firstname').",<br><br>Thank You account created"
                   . "successfully. Please click the below link to activate your account<br><br>"
                   . "<a href='".base_url()."/register/activate/".$uniid."' target='_blank'>Activate Now</a><br><br>Thanks<br>bosCoding";
                   $this->email->setTo($to);
                   $this->email->setFrom('info@boscoding.com','Info');
                   $this->email->setSubject($subject);
                   $this->email->SetMessage($message);
                   $filepath = 'public/assets/images/logo.png';
                   $this->email->attach($filepath);
                   if ($this->email->send()) {
                        $this->session->setTempdata('success','Account Create successfully. Please activate your account', 3);
                        return redirect()->to(current_url());
                   } else {
                        $this->session->setTempdata('success','Account Create successfully. Sorry! unable to send activation link. Contact Admin', 3);
                        return redirect()->to(current_url());
                        //$data = $this->email->printDebugger(['headers']);
                        //print_r($data);
                   }
               } else {
                $this->session->setTempdata('error','Sorry! Unable to create an account, Try again', 3);
                return redirect()->to(current_url());
               }

            } else {
                $data['validation'] = $this->validator;
            }
        }
        return view('register_view', $data);
    }

    public function activate($uniid=null)
    {
        $data = [];
        if (!empty($uniid)) {
            $userdata = $this->registerModel->verifyUniid($uniid);
            if ($userdata) {
                if ($this->verifyExpiryTime($userdata->activation_date)) {
                    if ($userdata->status == 'inactive') {
                        $status = $this->registerModel->updateStatus($uniid);
                        if ($status == true) {
                            $data['success'] = 'Account Activated successfully';
                        }
                    } else {
                        $data['success'] = 'Your account is alredy actived.';
                    }

                } else {
                    $data['error'] = 'Sorry! Activation link was espired!!!';
                }

            } else {
                $data['error'] = 'Sorry! We are Unable to find you account.';
            }

        } else {
            $data['error'] = 'Sorry! Unable to process you request.';
        }

        return view('activation_view', $data);
    }

    public function verifyExpiryTime($regTime)
    {
        $currTime   = now();
        $regtime    = strtotime($regTime);
        $diffTime   = (int)$currTime - (int)$regTime;

        if (3600 < $diffTime) {
            return true;
        } else {
            return false;
        }


    }

}
