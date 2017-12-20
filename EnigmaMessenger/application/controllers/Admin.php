<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Admin extends CI_Controller{
    
    function __construct(){
        
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->helper(array('form','url'));      
        $this->load->library('session');
        $this->load->database();
        $this->load->model('admin_model');
        $this->load->model('api_model');
        $this->load->library('apn'); 
        
    }
   
   
    function sessionCheck(){
        
        if (!$this->session->userdata('is_login')){
            redirect('/admin/index');
        }
    }    
    
    function index(){
		if($this->session->userdata('is_login')){
			$item['users'] = count($this->admin_model->allUsers());
			$item['purchases'] = count($this->admin_model->allPurchases());
			$item['tickets'] = count($this->admin_model->allTickets());
			$item['events'] = count($this->admin_model->allEvents());
			$item['bookings'] = count($this->admin_model->allBookings());
			return $this->load->view("home_view",array("item" => (object)$item));
		}
        return $this->load->view("login_view");
    }    
    function register_test($username, $password) {
        
        if (!function_exists('password_hash')) {
                $this->load->helper('password');// password helper.php loading
        }
        
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
            
        $this->admin_model->registerUser($username, $password_hash);
        echo "register success";         
        
    }
    
    function register(){
        
        $data = $this->admin_model->getAdmins();
        
        $this->load->view('register_view', array('data' =>  $data));
        
    }
    
    function loginConfirm() {

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $admin = $this->admin_model->getAdminInfo($username);
        
        if(!function_exists('password_verify')){
            $this->load->helper('password');
        }
       
        
        if(     !empty($admin)&&     
                $username == $admin->username &&
                password_verify($password, $admin->password)
                //$password == $admin->password 
           )
           { 
               
               $this->admin_model->updateLastLogin($username);
               $this->session->set_userdata(array('is_login' => true, 'login_user' => $this->input->post('userid')));
               redirect('/admin/index');
               return;
           } else {//
               $this->session->set_flashdata('error',"Login Failed.");
               redirect('/admin/index');   
           } 
    }
    
    function logout(){
        
        $this->session->sess_destroy();
        redirect('/admin/index');
    }
    
	
	
	
	
}
