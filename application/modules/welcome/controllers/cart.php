<?php defined('BASEPATH') OR exit('No direct script access allowed');

class cart extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('cart_model');
        
        $this->load->library('cart');
    }

    public function index() {
        $userid = $this->session->userdata('id');
        $data['carts'] = $this->cart_model->getusercart($userid);        
        $data['page'] = $this->config->item('bootsshop_template_dir_welcome') . "cart";
        $this->load->view($this->_container, $data);
        
    }
    
   /*
    public function add() {
        $data['page'] = $this->config->item('bootsshop_template_dir_welcome') . "shopping_cart";        
        $this->load->view($this->_container, $data);
    }*/
    public function addtocart() {
        $this->load->model(array('welcome/products_model'));
        if($this->input->post()){
            
            $product = $this->products_model->get_by_id($this->input->post('pid'));

           // echo "<pre>"; print_r($product); echo "</pre>"; exit;
            if($product['qty_at_hand'] == 0){
                    $data['error_msg'] = 'Sold Out';
                    $data['status'] = 'Not OK';
                    echo json_encode($data);
            }else if ($product['qty_at_hand'] < $this->input->post('qty')) {
                    $data['error_msg'] = 'Hand On Qty: '.$product['qty_at_hand'];
                    $data['status'] = 'Not OK';
                    echo json_encode($data);
            }			
            else if($product['qty_at_hand'] != 0  && $product['qty_at_hand'] >= $this->input->post('qty')){

                    $cartData = array(
                            'user_id ' => strip_tags($this->input->post('userid')),
                            'product_id ' => strip_tags($this->input->post('pid')),
                            'total_price ' => strip_tags($this->input->post('totalprice')),
                            'qty' => strip_tags($this->input->post('qty'))                
                    );
                    //echo "<pre>"; print_r($cartData); echo "</pre>"; exit;
                    $insert = $this->cart_model->addtocart($cartData);
                    if($insert){
                        
                                                        
                            $this->cart_model->updateinventory($this->input->post('pid'),$this->input->post('qty'));
                            
                             // set flash data
                            $carts_data = $this->cart_model->getusercarttotal($this->input->post('userid'));     
                            $carts_data["status"] = "OK";
                            echo json_encode($carts_data);
                            
                    }else{
                            $data['error_msg'] = 'Products cannot add to cart';
                    }
            }
    }
}

    public function update() {
        if($this->input->post()){

            $cartData = array(                    
                    'total_price ' => $this->input->post('totalprice'),
                    'qty' => $this->input->post('qty')                
                );
            
            if($this->cart_model->updatecart($this->input->post('cid'), $cartData)) {               
                
                echo "OK";
            }else {
                echo "NOK";
            }
            
        }
        
       // $data['page'] = $this->config->item('bootsshop_template_dir_welcome') . "c";
       // $this->load->view($this->_container, $data);
    }
    
    public function delete() {
        if($this->input->post()){

            if($this->cart_model->deletecart($this->input->post('cid'))) {              
                
                echo "OK";
            }else {
                echo "NOK";
            }
            
        }
        
       // $data['page'] = $this->config->item('bootsshop_template_dir_welcome') . "c";
       // $this->load->view($this->_container, $data);
    }

    
}
