<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once(APPPATH.'libraries/stripe/lib/Stripe.php');



class Payment extends MY_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->model('payment_model');
        $this->load->model('cart_model');
        $this->load->library('stripegateway');
    }
	
	public function index(){  
            $data = array();  
           
            if($this->input->post('checkout')){
               $data['totalamount'] = $this->input->post('totalamount');
               $data['user_id'] = $this->input->post('userid');
               
            }
            $data['page'] = $this->config->item('bootsshop_template_dir_welcome') . "payment";
        
            $this->load->view($this->_container, $data);
	}
        
        public function confirmorder() {
                       
           if($this->input->post()){    
                $data['stripeToken'] = $this->input->post('stripeToken');
               $data['tax_amount'] = $this->input->post('tax_amount');
               $data['payamount'] = $this->input->post('payamount');
               $data['subtotal'] = $this->input->post('subtotal_amount');
               $data['tax_amount'] = $this->input->post('tax_amount');
               $userid = $this->session->userdata('id');
               $data['carts'] = $this->cart_model->getusercart($userid);               
               $this->session->set_userdata("cardinfo",$data['carts']);
               $this->session->set_userdata("payamount",$data['payamount']);
               $this->session->set_userdata("tax_amount",$data['tax_amount']);
               $this->session->set_userdata("subtotal",$data['subtotal']);
               
                $data['page'] = $this->config->item('bootsshop_template_dir_welcome') . "confirmorder";
                $this->load->view($this->_container, $data);
           }
            
        }
	
	public function process(){               
                       
            if($this->input->post("confirm")){
               $data['amount'] = $this->input->post('payamount')*100;
               $data['card'] = $this->input->post('stripeToken');
               $data["description"] =  "Stripe Payment";
               $charge = $this->stripegateway->checkout($data);
               
                              
               if($charge->status == "succeeded"){
                   
                   $cards = $this->session->userdata('cardinfo');
                   $userid = $this->session->userdata('id');
                   $data = array(
                        'user_id' => $userid,
                        'item_amount' => $this->input->post('subtotal'),
                        'amount' => $this->input->post('payamount'),
                        'currency' => 'SGD',
                        'payment_id' => $charge->id,                                        
                        'description' => 'Stripe Payment',
                        'date_purchased' => date('Y-m-d H:i:s'),
                        'first_name' => 'Tester',
                        'last_name' => 'One',
                        'address' => '#1200',
                        'zip' => '160059',
                        'city' => 'Amritsar'                      
                    );
                    $trans_id = $this->payment_model->insert($data);
                        
                    
                    if($trans_id) {
                        
                        $cardids = array();
                        # save the order item;                        
                        foreach($cards as $item){
                            $order_item = array(
                                'tans_id' => $trans_id,
                                'user_id' => $userid,
                                'product_id' => $item["product_id"],
                                'qty' => $item["qty"],
                                'item_amount' => $item["total_price"],
                                'amount' => $item["total_price"] *0.05,
                                
                            );
                            
                            
                            
                        }
                        
                        $cardids = implode(",", $cardids);
                        
                        # save the invoice
                        
                        $invoice = $this->payment_model->generateinvoice();
                        $invoice = array(
                            'invoice_no' =>$invoice,
                            'trans_id' =>$trans_id,
                            'user_id' =>$userid,
                        );
                        $this->payment_model->saveinvoice($invoice);
                        
                        # delete the cart
                        $this->payment_model->deletecarts($cardids);
                    }
                    
                    $data = array(
                        "cards" => $this->session->userdata('cardinfo'),
                        'item_amount' => $this->input->post('subtotal'),
                        'amount' => $this->input->post('payamount'),
                        'invoice' => $invoice
                    );
                    
                   
                    
                  // $data['page'] = $this->config->item('bootsshop_template_dir_welcome') . "paymentsuccess";
                  // $this->load->view($this->_container, $data);
                  // echo json_encode(array('status' => 200, 'success' => 'Payment successfully completed.'));
                   //exit();
                   
                   redirect('payment/success');
                
               }else {
                    echo json_encode(array('status' => 500, 'error' => 'Something went wrong. Try after some time.'));
                    exit();
               }
            }
  	}
	public function success(){
                          
                $data["carts"] = $this->session->userdata('cardinfo');
                $data["payamount"] = $this->session->userdata('payamount');
                $data["tax_amount"] = $this->session->userdata('tax_amount');
                $data["subtotal"] = $this->session->userdata('subtotal');
                
                $data['page'] = $this->config->item('bootsshop_template_dir_welcome') . "success";
                $this->load->view($this->_container, $data);
		//$this->load->view('stripe/success');
	}
}
