<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Products_model');
    }

    public function index() {
        $this->load->model(array('welcome/products_model'));
        $data['products'] = $this->products_model->get_all();
        $data['product_categories'] = $this->products_model->get_categories();
        $data['current_page'] = 'products';
        $data['page'] = $this->config->item('bootsshop_template_dir_welcome') . "products";
        $this->load->view($this->_container, $data);
    }

    public function product_details($product_id) {
        $this->load->model(array('welcome/products_model'));
        $data['product'] = $this->products_model->get_by_id($product_id);
        $data['product_categories'] = $this->products_model->get_categories();
        $data['featured_image'] = $this->products_model->get_featured_image($product_id);
        $data['product_images'] = $this->products_model->get_product_images($product_id);
        $data['current_page'] = 'products';
        $data['page'] = $this->config->item('bootsshop_template_dir_welcome') . "product_details";
        $this->load->view($this->_container, $data);
    }

    public function product_categories($category_id) {
        $data['current_page'] = 'products';
        $data['page'] = $this->config->item('bootsshop_template_dir_welcome') . "product_details";
        $this->load->view($this->_container, $data);
    }
	
	public function addtocart() {
		$this->load->model(array('welcome/products_model'));
		if($this->input->post()){
			$product = $this->products_model->get_by_id($this->input->post('pid'));
			
			//echo "<pre>"; print_r($product); echo "</pre>"; exit;
			if($product['qty_at_hand'] == 0){
				$data['error_msg'] = 'Sold Out';
				echo "Not OK";
			}else if ($product['qty_at_hand'] < $this->input->post('qty')) {
				$data['error_msg'] = 'Hand On Qty: '.$product['qty_at_hand'];
				echo "Not OK";
			}			
			else if($product['qty_at_hand'] != 0  && $product['qty_at_hand'] >= $this->input->post('qty')){
			
				$cartData = array(
					'user_id ' => strip_tags($this->input->post('userid')),
					'product_id ' => strip_tags($this->input->post('pid')),
					'total_price ' => strip_tags($this->input->post('totalprice')),
					'qty' => strip_tags($this->input->post('qty'))                
				);
				//echo "<pre>"; print_r($cartData); echo "</pre>"; exit;
				$insert = $this->products_model->addtocart($cartData);
				if($insert){
					 // set flash data
					$this->session->set_flashdata('msg', 'Products added to cart');
					//echo "OK";
                                        redirect('products/details'); // If javascript is not enabled, reload the page with new data
				}else{
					$data['error_msg'] = 'Products cannot add to cart';
				}
			}
		}
	}

}
