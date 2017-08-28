<?php
$isUserLoggedIn = ($this->session->userdata('isUserLoggedIn'))? true : false;
if($isUserLoggedIn) {
    $userid = $this->session->userdata('id');
    $this->load->model(array('welcome/cart_model'));
    $carts = $this->cart_model->getusercart($userid);
    $iscartempty = true;
    if(sizeof($carts) > 0) {
       $iscartempty = false;
       $alltotalprice = 0;
       $totalqty = 0;
       foreach($carts as $cart) {
           $totalqty += $cart['qty'];
           $alltotalprice += $cart['total_price'];
       } 
    }else {
        $totalqty = 0;
        $alltotalprice = 0.00;
    }    
}

	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Online Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

	<!-- Less styles  
	<link rel="stylesheet/less" type="text/css" href="<?=base_url()?>assets/frontend/less/bootsshop.less">
	<script src="<?=base_url()?>assets/frontend/less.js" type="text/javascript"></script>
	 -->
	 
	 <script src="<?=base_url()?>assets/frontend/assets/js/jquery.js"></script> <!-- Khin -->
	 
    <!-- Le styles  -->
    <link href="<?=base_url()?>assets/frontend/assets/css/bootstrap.css" rel="stylesheet"/>
    <link href="<?=base_url()?>assets/frontend/assets/css/bootstrap-responsive.css" rel="stylesheet"/>
	<link href="<?=base_url()?>assets/frontend/assets/css/docs.css" rel="stylesheet"/>
	 
    <link href="<?=base_url()?>assets/frontend/style.css" rel="stylesheet"/>
	<link href="<?=base_url()?>assets/frontend/product.css" rel="stylesheet"/>
	<link href="<?=base_url()?>assets/frontend/assets/js/google-code-prettify/prettify.css" rel="stylesheet"/>

	
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?=base_url()?>assets/frontend/assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url()?>assets/frontend/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url()?>assets/frontend/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url()?>assets/frontend/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?=base_url()?>assets/frontend/assets/ico/apple-touch-icon-57-precomposed.png">
  </head>
<body>
  <!-- Navbar
    ================================================== -->
<div class="navbar navbar-fixed-top">
              <div class="navbar-inner">
                <div class="container">
					<a id="logoM" href="<?=base_url()?>"><img src="<?=base_url()?>assets/frontend/assets/img/logo.png" alt="Bootsshop"/></a>
                  <a data-target="#sidebar" data-toggle="collapse" class="btn btn-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                  <div class="nav-collapse">
                    <ul class="nav">
					  <li class="<?=($current_page == 'home') ? 'active' : ''?>"><a href="<?=base_url()?>">Home	</a></li>
					  <li class="<?=($current_page == 'about-us') ? 'active' : ''?>"><a href="<?=base_url()?>about-us">About Us</a></li>
                      <li class="<?=($current_page == 'products') ? 'active' : ''?>"><a href="<?=base_url()?>products">Products</a></li>
					  <li class="<?=($current_page == 'delivery') ? 'active' : ''?>"><a href="<?=base_url()?>delivery">Delivery</a></li>
					  <li class="<?=($current_page == 'contact-us') ? 'active' : ''?>"><a href="<?=base_url()?>contact-us">Contact Us</a></li>
					</ul>
                    <form action="#" class="navbar-search pull-left">
                     <input id="srchFld" type="text" placeholder="I'm looking for ..." class="search-query span5"/>
                    </form>
					<?php if($isUserLoggedIn == false) { ?>
                    <ul class="nav pull-right">
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">Login <b class="caret"></b></a>
						<div class="dropdown-menu">
						<form class="form-horizontal loginFrm" action="<?=  base_url()?>user/login" method="POST">
						  <div class="control-group">								
							<input class="span3"  type="email" id="email" name="email" placeholder="Email" required="">
                                                        <?php echo form_error('email','<span class="help-block">','</span>'); ?>
						  </div>
						  <div class="control-group">
							<input type="password" class="span3" name="password" id="password" placeholder="Password">
						  </div>
						  <div class="control-group">
							<label class="checkbox">
							<input type="checkbox"> Remember me
							</label>
							<input type="submit" class="btn" name="login" value="Sign in">
						  </div>
						</form>					
						</div>
					</li>
					</ul>
					<?php }else { ?>
					<ul class="nav pull-right">
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">logout <b class="caret"></b></a>
					</li>
					</ul>	
					<?php }?>
                  </div><!-- /.nav-collapse -->
                </div>
              </div><!-- /navbar-inner -->
            </div>
<!-- ======================================================================================================================== -->	
<div id="mainBody" class="container">
<header id="header">
<div class="row">
<div class="span12">
<a href="<?=base_url()?>"><img src="<?=base_url()?>assets/frontend/assets/img/logo.png" alt="Bootsshop"/></a>
<?php if($isUserLoggedIn) { ?>
<div class="pull-right"> <br/>
    <a href="<?=base_url()?>cart/"> <span class="btn btn-mini btn-warning"> <i class="icon-shopping-cart icon-white"></i> <span id="carttotal"><?php echo number_format($totalqty);?></span></span> </a>
	<a href="<?=base_url()?>cart/"><span class="btn btn-mini active" id="carttotalprice"><?php echo number_format($alltotalprice, 2);?></span></a>
	<span class="btn btn-mini">&pound;</span>
	<span class="btn btn-mini">&euro;</span> 
</div>
<?php } ?>
</div>
</div>
<div class="clr"></div>
</header>
<!-- ==================================================Header End====================================================================== -->