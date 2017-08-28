<?php 
echo form_open('path/to/controller/update/method'); 
$this->load->model(array('welcome/products_model'));

?>
<style>
    
    
    
    .cart_page {
        
        width:90%;
            margin:auto;
    }
    
    .course_title {
        font-size: 14px;
        margin-left:10px;
    }

    .course_img { 
        vertical-align: top;
        width: 100px;
        display: inline-block;
    }

    .course_details {
        width: 80%;
        display: inline-block;
    }

    .course_quantity, .course_unit_price, .course_line_total, .course_action {
        text-align: center;
    }

    .cart_page .page_heading {
        text-align: center;
}
    .cart_page .page_heading #cart_loader {width: 44px;height: 44px;display: block;margin: 0 0 0 -22px;background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAYAAAAehFoBAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAMhJREFUeNrs2TEKwkAUhOEXBSurQM5jo2AbyG2EgIfyCkKqXEDiGYI2QkBn5aXYYBqb7MAM/Ft/LNutWbwtqtEVDei9UIMbajf93A51CyLn6twWrUwQOq0csTl6EICDMV/jOKG9pb+Nv21rCW53rM1wvFzPsD5zOc1WRjaBBRZYYIEFFlhggQUWWGCBBRZYYIEFFvh/cE/kfQbwnQh8C+ALEfhrLYznU6YY5RUBuJpe98HS/Vg8zr2R8E16Rk0C0MYt0dftR4ABAFfva4h/thfHAAAAAElFTkSuQmCC') 0 0 no-repeat;position: fixed;left: 50%;top: 0;z-index: 1000;
    opacity: 0;


    }
    .cart_page .page_heading #cart_loader:after {content: '';width: 44px;height: 44px;display: block;background: url('fancybox_loading.gif') 50% 50% no-repeat;}

    .cart_page .page_heading #cart_loader.loading {top: 60px;
    opacity: 1;
    }


    .cart_list {width: 100%;max-width: 100%;margin: 10px 0 0 0;}
    .cart_list th {padding: 5px 20px;background: #e864a0;border: 1px solid #FFFFFF;font-size: 14px;color: #FFFFFF;text-align: center;}
    .cart_list th th {text-align: center;}
    .cart_list td {padding: 10px; border: 1px solid #eeeeee;}

    .cart_list .cart_price {font-size: 15px;text-align: center;}


    .cart_item {}
    .cart_item__img {width: 140px;float: left;}
    .cart_item__info {margin: 0 0 0 160px;}
    .cart_item__name {margin: 0;font-size: 15px;}
    .cart_item__variant {margin: 15px 0 0 0;font-size: 12px;color: {{ settings.color_4 }};}

    .cart_item__details {margin: 10px 0 0 0;}
    .cart_item__details p {margin: 5px 0 0 0;font-size: 12px;}
    .cart_item__details p span {font-size: 12px;}

    .cart_item .quantity_box {width: 88px;height: 24px;margin: 0;position: relative;}
    .cart_item .quantity_box input {width: 40px;position: absolute;left: 24px;top: 0;}
    .cart_item .quantity_box .quantity_down {margin: 0;position: absolute;left: 0;top: 0;
    -webkit-border-radius: 5px 0 0 5px;
            border-radius: 5px 0 0 5px;
    }
    .cart_item .quantity_box .quantity_up {margin: 0;position: absolute;right: 0;top: 0;
    -webkit-border-radius: 0 5px 5px 0;
            border-radius: 0 5px 5px 0;
    }
    .cart_item .cart_update {width: 88px;display: block;margin: 5px 0 0 0;}

    .cart_item__remove {font-size: 14px;}
    .cart_item__remove i {vertical-align: baseline;}

    .cart_list .cart_buttons .btn {float: right;margin: 0 0 0 20px;}
    .cart_list .cart_buttons .btn-alt {float: none;margin: 0;}
    .cart_list .cart_buttons .btn:before {margin: 0 7px 0 0;font: 14px 'FontAwesome';}
    .cart_list .cart_buttons .cart_continue:before {content: '\f060';}
    .cart_list .cart_buttons .cart_update:before {content: '\f021';}
    .cart_list .cart_buttons #cart_clear:before {content: '\f1f8';}

    .cart_list .cart_summary .cart_summary__row {margin: 0;padding: 0 0 10px 0;border-bottom: 1px solid {{ settings.border_color }};font-size: 18px;color: {{ settings.color_2 }};}
    .cart_list .cart_summary .cart_summary__row ~ .cart_summary__row {padding: 10px 0;}
    .cart_list .cart_summary .cart_summary__row span {float: right;}

    .cart_list .cart_summary .cart_summary__notification {margin: 20px 0 0 0;}

    .cart_list .cart_summary .cart_summary__instructions {margin: 15px 0 0 0;}
    .cart_list .cart_summary .cart_summary__instructions label {display: block;padding: 0 0 3px 0;font-weight: normal;color: {{ settings.color_2 }};}
    .cart_list .cart_summary .cart_summary__instructions textarea {width: auto !important;height: 100px !important;max-width: 100% !important;resize: none;}

    .cart_list .cart_summary .cart_summary__checkout {}
    .cart_list .cart_summary .cart_summary__checkout button {float: right;margin: 20px 0 0 10px;padding: 10px 20px;font-size: 16px;}

    .cart_list .cart_summary .cart_summary__methods {float: left;}
    .cart_list .cart_summary .cart_summary__methods li {float: left;margin: 20px 10px 0 0;}

    /* EMPTY CART NOTIFICATION */
    .cart_empty {}
    .cart_empty .alert {}
    .cart_empty h3 {}
    .cart_empty h3 a {font-weight: inherit;text-decoration: underline;}
    .cart_empty h3 a:hover {text-decoration: none;}

    .paypal{ 
            width: 233px;
             height: 57px;
            color: transparent !important;
       
    }

    .smoovpay
    {
            width: 233px;
             height: 57px;
            color: transparent !important;

    }
	
	.allpaymentbtn{
		width: 136px;
        height: 57px;
        color: transparent !important;
		margin-left: 10px !important;
	}
	
	// 30 May 2017
	.buttoncontainer {
		float: right;
	}
	.buttoncontainer tr td {
		border: 0;
	}
	.cart_buttons table tr td {
		border: 0 none;
		padding: 0;
		padding-top: 5px;
	}
	

</style>

<script>
     $(document).ready(function() {
        
           $(document).on('click','.cart_item__remove', (function () {

                var cidi = $(this).attr("data-cid");
                var uidi = $(this).attr("data-uid");

                $.ajax({
                    method: "POST",
                    url: "/courses/deletefromcart",
                    data: { cid: cidi, uid : uidi}
                })
                .done(function( data ) {
                    if(data === "OK") {
                        
                          if(eval($('.cartbadge').text())-1 == 0) {
                            $('.cartbadge').text(eval($('.cartbadge').text())-1);  
                            $('.cartbadge').hide();  
                          } else {
                            $('.cartbadge').text(eval($('.cartbadge').text())-1);
                         }
                          //location.reload(true);
						  window.location.href = "/payments/cart";
                    }
                });
                                              
            }));

           
        $("#AddCoupon").click(function() {
            window.location.href = "/payments/cart?coupon_code=" + $("#coupon_code").val();
        
        });

        $("#coupon_code").keydown(function(event){
            if(event.keyCode === 13) {
                event.preventDefault();
                 return false;
            } 
        })
       
          
  });

 </script>
<div class="cart_page" style="padding-bottom:60px;">
<?php 



if($carts)
{
    ?>
     <a href="/courses"><img src ="../img/continue-shopping-button.png" style="float:left;height: 43px;margin: 5px;"> </a>
    <?php
}
?>
    <h2 class="page_heading" style="padding:10px;">Shopping Cart<span id="cart_loader" </span></h2>    
    <div id="cart_content">

        <?php
        if(isset($carts) && sizeof($carts) > 0 )
        {
            

           //$courseArray = explode(',', $cartCourses->course_id);
           //$count = sizeof($courseArray);
            ?>    
            <form action="/payment" method="post" class="" class="form-inline">
            <input type="hidden" class="offsetAmount" name="offsetAmount" size="4" value="0" />
            <input type="hidden" class="coupon_value" name="coupon_value" value="0">
            
            <input type="hidden" class="cartid" name="cartid" value="<?php echo $cartCourses->id ?>"/>
            <input type="hidden" class="original_value" name="original_value" value="">
            <input type="hidden" class="coupon_unit" name="coupon_unit" value="">
            <input type="hidden" class="coupon_usage_type" name="coupon_usage_type" value="">

            <input type="hidden" class="course_id" name="course_id" value="380">
            <input type="hidden" class="owner_id" name="owner_id" value="3">
            <input type="hidden" class="flatdiscount" name="flatdiscount" value="<?php // echo $discount;?>">
            <table class="cart_list" id="content">

                <tr>
                    <th style="text-align:left;" width="60%">Product</th>

                    <th width="8%">Qty</th>
                    <th width="15%">Unit Price (SGD)</th>
                    <th width="15%">Line Total (SGD)</th>
                    <th width="3%"></th>
                </tr>

                <?php 

                $tax_amount = 0;
                $pricewithouttax = 0;
                $discountamount = 0;
                $totalamount = 0;

                
                    foreach ($carts as $cart)
                    {
                        $productdetails  = $this->products_model->get_by_id($cart['product_id']);
                        $img = $this->products_model->get_featured_image($cart['product_id']);
                        $totalamount += $cart['total_price'];
                        
                      
                    // Line Item 
                    
                    ?>
                    <tr class="cart_item" data-id="">
                        <td>
                            <div class="course_img">
                                <?php
                                    if($courseDetail['img_link'] <> '') 
                                    {
                                        $imgLink =  $img['[image_path]'];
                                    } else {
                                        $imgLink = '/img/no-image-available.jpg';
                                    }
                                ?>
                                <img src="<?php echo $imgLink; ?>" width="100" alt="" />
                            </div>
                            <div class="course_details">
                                <h3 class="course_title">
                                    <a href="/s/<?php echo $courseDetail['superslug']; ?>">
                                        <?php echo $productdetails['product_name']; ?>
                                    </a>
                                </h3>
                                <div class="course_details">
                                    <?php
                                        if($courseDetail['skillsfuture'] == "1")
                                        {
                                            echo '<p class="item_type" style="margin-left:10px;"><span>Product type:</span> SkillsFuture</p>';
                                        }
                                         
                                       // echo '<p class="item_vendor" style="margin-left:10px;"><span>Vendor:</span>' . $this->Payments->get_course_owner_name($courseDetail['owner_id']) . '</p>';
                                    ?>
                                </div>
                            </div>
                        </td>

                        <td class="course_quantity">
                              <?php echo number_format($cart['qty']); ?>
                        </td>

                        <td class="course_unit_price">
                             <?php

                               // $pricing = $this->Payments->get_usd($courseDetail['id'], $courseDetail['price']);
                                //echo  '$' . number_format($pricing[1],2); 
                             echo  '$' .number_format($productdetails['product_price'], 2); ?>
                           
                        </td>

                        <td class="course_line_total">
                             <?php
                                echo  '$' . number_format($cart['total_price'], 2); 

                            ?>
                        </td>

                        <td class="course_action">
                            <a class="cart_item__remove" title="" href="#" data-cid="<?php echo $courseDetail['id']; ?>" data-uid="<?php echo $userid; ?>"><i class="fa fa-trash"></i></a>
                        </td>

                    </tr>
                   <?php 
                   if (((isset($_GET['coupon_code'])) && ($activecoupon !=0)) || ($subdomain !="")) {
						
                       if($subdomain)
                       {
                            $coupon_validity = $this->Payments->get_couponData($subdomain, $courseDetail['id'], $courseDetail['owner_id']);
                       }
                       else
                       {							
                            $coupon_validity = $this->Payments->get_couponData($_GET['coupon_code'], $courseDetail['id'], $courseDetail['owner_id']);
                       }
                        $coupon_validity = json_decode($coupon_validity);
                        
                        if($coupon_validity->validity == 'valid') {
                            // Line Item (discount)
                            ?>
                            <tr class="cart_item" data-id="">
                                <td>
                                    <div class="course_img"">
                                        
                                    </div>
                                    <div class="course_details">
                                        <h3 class="course_title">
                                           <!-- <a href="/s/<?php echo $courseDetail['superslug']; ?>">
                                                <?php echo  $courseDetail['course_title']; ?>
                                            </a> -->
                                        </h3>
                                        <div class="course_details">
                                            <?php

                                                if($coupon_validity->coupon_unit == '1') {
                                                    $coupon_tag = '$' . $coupon_validity->coupon_value;
                                                }
                                                if($coupon_validity->coupon_unit == '2') {
                                                    $coupon_tag = $coupon_validity->coupon_value . '%';
                                                }
                                                echo '<p class="item_discount"><span>Discount:</span>' . $coupon_tag . ' (Coupon Code: ' . $_GET['coupon_code'] . ' applied)</p>';
                                            ?>
                                        </div>
                                    </div>
                                </td>

                                <td class="course_quantity">
                                       1
                                </td>

                                <td class="course_unit_price">
                                     <?php

                                        if($coupon_validity->coupon_unit == '2') {
                                            $coupon_tag = $pricing[1] * ($coupon_validity->coupon_value/100);
                                        } else $coupon_tag = $coupon_validity->coupon_value;

                                        echo '-  $' . number_format($coupon_tag, 2) ;
                                    ?>
                                </td>

                                <td class="course_line_total">
                                     <?php

                                        if($coupon_validity->coupon_unit == '2') {
                                            $coupon_tag = $pricing[1] * ($coupon_validity->coupon_value/100);
                                        } else $coupon_tag = $coupon_validity->coupon_value;

                                        echo '- $' . number_format($coupon_tag, 2) ;
                                    ?>
                                </td>

                                <td class="course_action">
                                </td>

                            </tr>
                        
                    <?php
                            $discountamount = $discountamount + $coupon_tag;
                            
                        }    
                        
                        
                    } 
                    
                    $pricewithouttax = $pricewithouttax + $pricing[1];
                    ?>
                     
                    
                <?php
                        
                   
                }
                         echo '<tr><td colspan="1" style="border:none;">  </td> <td colspan="6"> <input type="hidden" name="course_id" id="course_id" value="' . implode(',', $courseArr) . '"></td></tr>';
                
                ?>
                <tfoot>
                     <tr class="cart_buttons" >
                       <td colspan="1" style="border:none;">
                       
                        </td>

                        <td colspan="2" style="text-align:right;" class="cart_price">

                            <span class="money" > Final Amount to Pay  </span> <br>
                        </td>
                        <?php
                        if (isset($_GET['coupon_code']) || $subdomain)
                        {
                            $subTotal = $pricewithouttax - $discountamount;
                        }
                        else {                         
                                                       
                            $subTotal = $totalamount;
                            
                        }
                                                

                        ?>
                        
                        <td colspan="1" style="text-align:center;" 
                            <span class="money" >  $<?php echo number_format($totalamount,2);?>  </span>
                            <input type="hidden" class="coursePrice" name="coursePrice" value="<?=$pricewithouttax;?>">
                        </td>
                        <td colspan="1">

                        </td>
                    </tr>	


                   	

                    <tr class="cart_buttons">
                         <td colspan="1" style="border:none;">
                           <a  href="/courses"><img src ="../img/continue-shopping-button.png" style="height: 43px;"></a>
                        </td>
                        <td colspan="4" style="text-align:right;">
							
                        <table class="buttoncontainer" style="float: right;">

                        <tr>
                        <td colspan="3"><input class="btn allpaymentbtn" type="button" name="payment" value="Pay"></td>
                        </tr>

                        </table>

                        </td>
                    </tr>	
                </tfoot>
            </table> 
			
        </form>            
        <?php
        }
        else {
        ?>
        <div class="cart_empty">
                <p class="alert alert-warning">Your cart is currently empty. <a href="/courses">Browse</a> to find the courses you are interested</p>

        </div>
        <?php
        }
        ?>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>

