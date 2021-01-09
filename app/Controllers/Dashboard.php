<?php 
namespace App\Controllers;

use \CodeIgniter\Controller;
use App\Models\DashboardModel;

class Dashboard extends BaseController
{
    public $dModel;
    public function __construct(){
        $this->dModel = new DashboardModel();

    }

	public function index()
	{
        $data = [];
        if (!(session()->has('logged_user')||session()->has('google_user')||session()->has('facebook_user'))) {
            return redirect()->to(base_url()."/login");
        }

        $uniid = session()->get('logged_user');
        $data['userdata'] = $this->dModel->getLoggedInUserData($uniid);
        return view('admin/dashboard_view', $data);
        
    }
}
