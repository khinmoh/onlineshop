<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . 'libraries/Stripe/lib/Stripe.php');

class Payment extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->model('stripe/paymentmodel', 'payment');
    }
	
	public function index(){  //echo "*****"; exit;
            $data = array();  
           
            if($this->input->post('checkout')){
               $data['totalamount'] = $this->input->post('totalamount');
               $data['user_id'] = $this->input->post('userid');
               
               //echo "<pre>"; print_r($data); echo "</pre>"; exit;
            }
            $this->load->view('stripe/index',$data);
	}
	
	public function process(){
		try {
            //Stripe::setApiKey('sk_test_yourapikey');
            Stripe::setApiKey('sk_test_SGnia7tTM2uW6mPpDgY6jjg4');
            $charge = Stripe_Charge::create(array(
                        "amount" => 150000,
                        "currency" => "USD",
                        "card" => $this->input->post('access_token'),
                        "description" => "Stripe Payment"
            ));
            // this line will be reached if no error was thrown above
            
           // if($this->input->post('checkout')){
               $data['totalamount'] = $this->input->post('totalamount');
               $data['user_id'] = $this->input->post('userid');
               
               //echo "<pre>"; print_r($data); echo "</pre>"; exit;
           // }
            //exit;
            
            $data = array(
                'payment_id' => $charge->id,
                'payment_status' => 'success',
                'total' => $this->input->post('totalamount'),
                'description' => 'Stripe Payment',
                'first_name' => 'Tester',
                'last_name' => 'One',
                'address' => '#1200',
                'zip' => '160059',
                'city' => 'Amritsar',
                'created_on' => date('Y-m-d H:i:s'),
                'updated_on' => date('Y-m-d H:i:s')
            );
            $response = $this->payment->insert($data);
            if ($response) {
                echo json_encode(array('status' => 200, 'success' => 'Payment successfully completed.'));
                exit();
            } else {
                echo json_encode(array('status' => 500, 'error' => 'Something went wrong. Try after some time.'));
                exit();
            }
        } catch (Stripe_CardError $e) {
            echo json_encode(array('status' => 500, 'error' => STRIPE_FAILED));
            exit();
        } catch (Stripe_InvalidRequestError $e) {
            // Invalid parameters were supplied to Stripe's API
            echo json_encode(array('status' => 500, 'error' => $e->getMessage()));
            exit();
        } catch (Stripe_AuthenticationError $e) {
            // Authentication with Stripe's API failed
            echo json_encode(array('status' => 500, 'error' => AUTHENTICATION_STRIPE_FAILED));
            exit();
        } catch (Stripe_ApiConnectionError $e) {
            // Network communication with Stripe failed
            echo json_encode(array('status' => 500, 'error' => NETWORK_STRIPE_FAILED));
            exit();
        } catch (Stripe_Error $e) {
            // Display a very generic error to the user, and maybe send
            echo json_encode(array('status' => 500, 'error' => STRIPE_FAILED));
            exit();
        } catch (Exception $e) {
            // Something else happened, completely unrelated to Stripe
            echo json_encode(array('status' => 500, 'error' => STRIPE_FAILED));
            exit();
        }
	}
	public function success(){
		$this->load->view('stripe/success');
	}
}
