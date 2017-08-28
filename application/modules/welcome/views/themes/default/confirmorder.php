<?php
$this->load->model(array('welcome/products_model'));
?>
<h1>Confirm Order</h1>

<?php if(isset($carts) && sizeof($carts) > 0 ) { ?>

<div class="cart_content">
    <form method="post"  name="payment_form" action="<?=  base_url()?>payment/process" >
  <div class="column-labels">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price">Price(SGD)</label>
    <label class="product-quantity">Quantity</label>
   
    <label class="product-line-price">TotalPrice(SGD)</label>
  </div>
   <?php 
   
    foreach ($carts as $cart)
    {
        $productdetails  = $this->products_model->get_by_id($cart['product_id']);
        $img = $this->products_model->get_featured_image($cart['product_id']);
        
        $carids[] = $cart["id"];
    ?>

  <div class="product">
    <div class="product-image">
      <img src="<?php echo base_url().$img['image_path']; ?>">
    </div>
    <div class="product-details">
      <div class="product-title"><?php $productdetails['product_name']; ?></div>
      <p class="product-description">The best dog bones of all time. Holy crap. Your dog will be begging for these things! I got curious once and ate one myself. I'm a fan.</p>
    </div>
    <div class="product-price"><?php echo number_format($productdetails['product_price'], 2); ?></div>
    <div class="product-quantity">
      <?php echo number_format($cart['qty']); ?>
    </div>
    <div class="product-line-price"><?php echo number_format($cart['total_price'], 2); ?></div>
  </div>
    
<?php 
        //$carids = implode(",", $carids);
    } 

?>
    
   
    <div class="totals">
    <div class="totals-item">
      <label>Subtotal(SGD)</label>
      <div class="totals-value" id="cart-subtotal"><?php echo $subtotal;?></div>
    </div>
    <div class="totals-item">
      <label>Tax (5%)(SGD)</label>
      <div class="totals-value" id="cart-tax" name="tax_amount"><?php echo $tax_amount; ?></div>
    </div>    
    <div class="totals-item totals-item-total">
      <label>Grand Total(SGD)</label>
      <div class="totals-value" id="cart-total" name="totalamount"><?php echo $payamount; ?> </div>
    </div>
  </div>
    <input type="hidden" name="stripeToken" value="<?php echo $stripeToken; ?>" />
    <input type="hidden" name="payamount" value="<?php echo $payamount; ?>" />
    <input type="hidden" name="tax_amount" value="<?php echo $tax_amount; ?>" />
    <input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>" />
      
    <input type="submit" class="confirm" name="confirm" value="confirm payment" />
    <input type="button" class="btncancel" name="cancel" value="cancel"/>
    </form>
</div>


<?php } ?>
<style>
   @import "compass/css3";
/*
 I wanted to go with a mobile first approach, but it actually lead to more verbose CSS in this case, so I've gone web first. Can't always force things...
 Side note: I know that this style of nesting in SASS doesn't result in the most performance efficient CSS code... but on the OCD/organizational side, I like it. So for CodePen purposes, CSS selector performance be damned.
 */
/* Global settings */
/* Global "table" column settings */
.product-image {
  float: left;
  width: 20%;
}
.product-details {
  float: left;
  width: 37%;
}
.product-price {
  float: left;
  width: 12%;
}
.product-quantity {
  float: left;
  width: 10%;
}
.product-removal {
  float: left;
  width: 9%;
}
.product-line-price {
  float: left;
  width: 12%;
  text-align: right;
}
/* This is used as the traditional .clearfix class */
.group:before, .shopping-cart:before, .column-labels:before, .product:before, .totals-item:before, .group:after, .shopping-cart:after, .column-labels:after, .product:after, .totals-item:after {
  content: '';
  display: table;
}
.group:after, .shopping-cart:after, .column-labels:after, .product:after, .totals-item:after {
  clear: both;
}
.group, .shopping-cart, .column-labels, .product, .totals-item {
  zoom: 1;
}
/* Apply clearfix in a few places */
/* Apply dollar signs */
.product .product-price:before, .product .product-line-price:before, .totals-value:before {
  content: '$';
}
/* Body/Header stuff */
body {
  padding: 0px 30px 30px 20px;
  font-family: 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-weight: 100;
}
h1 {
  font-weight: 100;
}
label {
  color: #aaa;
}
.shopping-cart {
  margin-top: -45px;
}
/* Column headers */
.column-labels label {
  padding-bottom: 15px;
  margin-bottom: 15px;
  border-bottom: 1px solid #eee;
}
.column-labels .product-image, .column-labels .product-details, .column-labels .product-removal {
  text-indent: -9999px;
}
/* Product entries */
.product {
  margin-bottom: 20px;
  padding-bottom: 10px;
  border-bottom: 1px solid #eee;
}
.product .product-image {
  text-align: center;
}
.product .product-image img {
  width: 100px;
}
.product .product-details .product-title {
  margin-right: 20px;
  font-family: 'HelveticaNeue-Medium', 'Helvetica Neue Medium';
}
.product .product-details .product-description {
  margin: 5px 20px 5px 0;
  line-height: 1.4em;
}
.product .product-quantity input {
  width: 40px;
}
.product .remove-product {
  border: 0;
  padding: 4px 8px;
  background-color: #c66;
  color: #fff;
  font-family: 'HelveticaNeue-Medium', 'Helvetica Neue Medium';
  font-size: 12px;
  border-radius: 3px;
}
.product .remove-product:hover {
  background-color: #a44;
}
/* Totals section */
.totals .totals-item {
  float: right;
  clear: both;
  width: 100%;
  margin-bottom: 10px;
}
.totals .totals-item label {
  float: left;
  clear: both;
  width: 79%;
  text-align: right;
}
.totals .totals-item .totals-value {
  float: right;
  width: 21%;
  text-align: right;
}
.totals .totals-item-total {
  font-family: 'HelveticaNeue-Medium', 'Helvetica Neue Medium';
}
.checkout {
  float: right;
  border: 0;
  margin-top: 20px;
  padding: 6px 25px;
  background-color: #6b6;
  color: #fff;
  font-size: 25px;
  border-radius: 3px;
}
.checkout:hover {
  background-color: #494;
}
/* Make adjustments for tablet */
@media screen and (max-width: 650px) {
  .shopping-cart {
    margin: 0;
    padding-top: 20px;
    border-top: 1px solid #eee;
  }
  .column-labels {
    display: none;
  }
  .product-image {
    float: right;
    width: auto;
  }
  .product-image img {
    margin: 0 0 10px 10px;
  }
  .product-details {
    float: none;
    margin-bottom: 10px;
    width: auto;
  }
  .product-price {
    clear: both;
    width: 70px;
  }
  .product-quantity {
    width: 100px;
  }
  .product-quantity input {
    margin-left: 20px;
  }
  .product-quantity:before {
    content: 'x';
  }
  .product-removal {
    width: auto;
  }
  .product-line-price {
    float: right;
    width: 70px;
  }
}
/* Make more adjustments for phone */
@media screen and (max-width: 350px) {
  .product-removal {
    float: right;
  }
  .product-line-price {
    float: right;
    clear: left;
    width: auto;
    margin-top: 10px;
  }
  .product .product-line-price:before {
    content: 'Item Total: $';
  }
  .totals .totals-item label {
    width: 60%;
  }
  .totals .totals-item .totals-value {
    width: 40%;
  }
}



    