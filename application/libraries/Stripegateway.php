<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include("./vendor/autoload.php");
class Stripegateway {
    public function __construct() {
        $stripe = array(
            "secret_key" => "sk_test_SGnia7tTM2uW6mPpDgY6jjg4",
            "public_key" => "pk_test_KCTsJjM3bQI6RY7HVUDaoJ7t"
            
        );
        \Stripe\Stripe::setApiKey($stripe["secret_key"]);
    }
    
    public function checkout($data){
       
        $message = "";
        try {
            $charge = \Stripe\Charge::create(array(
                        "amount" => $data["amount"],
                        "currency" => "SGD",
                        "card" => $data['card'],
                        "description" => "Stripe Payment"
            ));
            $message = $charge->status;
            return $charge;
        }catch(Exception $e){
            $message = $e->getMessage();
            return $message;
        }
        
    }
}

