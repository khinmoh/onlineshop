<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

    function __construct() {
        parent::__construct();       
       $this->load->library('form_validation','session');
        $this->load->model('Users_model');
    }
     /*
     * User registration
     */
    public function register() { //echo "****"; exit;
        
        $this->load->helper(array('form', 'url'));
     
        $data = array();
        $userData = array();
        if($this->input->post('signup')){  
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]');

            $userData = array(
                'name' => strip_tags($this->input->post('name')),
                'email' => strip_tags($this->input->post('email')),
                'password' => md5($this->input->post('password')),
                'gender' => $this->input->post('gender'),
                'phone' => strip_tags($this->input->post('phone'))
            );
             
            if($this->form_validation->run() == true){               
                $insert = $this->Users_model->insert($userData);
                if($insert){
                    $this->session->set_userdata('success_msg', 'Your registration was successfully. Please login to your account.');
                    redirect('user/login');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }
        $data['user'] = $userData;
        //load the view
        $data['page'] = $this->config->item('bootsshop_template_dir_welcome') . "registration";
        
        $this->load->view($this->_container, $data);
    }
    /*
    public function login() {       
        
        $data['page'] = $this->config->item('bootsshop_template_dir_welcome') . "login";
        $this->load->view($this->_container, $data);
    }*/
    
    /*
     * User login
     */
    public function login(){
        
        $this->load->helper(array('form', 'url')); 
        
        $data = array();
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
		//echo "####"; echo $this->input->post('login'); exit;
        if($this->input->post('login')){
			
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run() == true) {
                $con['returnType'] = 'single';
                $con['conditions'] = array(
                    'email'=>$this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'status' => '1'
                );
                $checkLoginUser = $this->Users_model->getRows($con);
				
				//echo "<pre>"; print_r($checkLoginUser); echo "</pre>"; exit;
                if($checkLoginUser){
                    $this->session->set_userdata('isUserLoggedIn',TRUE);
                    //$this->session->set_userdata('userId',$checkLogin['id']);
                    $this->session->set_userdata($checkLoginUser);
                    redirect('products');
                }else{
                    $data['error_msg'] = 'Invalid email or password, please try again.';
                }
            }
        }
                
        $data['page'] = $this->config->item('bootsshop_template_dir_welcome') . "login";
        $this->load->view($this->_container, $data);
    }

    public function reset_password() {
        $data['page'] = $this->config->item('bootsshop_template_dir_welcome') . "password_reset";
        $this->load->view($this->_container, $data);
    }

    public function logout() {
        
    }
    
    /*
     * Existing email check during validation
     */
    public function email_check($str){
        $con['returnType'] = 'count';
        $con['conditions'] = array('email'=>$str);
        
        $checkEmail = $this->Users_model->getRows($con);        
        if($checkEmail > 0){
            $this->form_validation->set_message('email_check', 'The given email already exists.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
