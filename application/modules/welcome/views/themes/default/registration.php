<div class="row">
<div id="sidebar" class="span3">
	<ul class="nav nav-list bs-docs-sidenav" style="display: block;">											
		<li class="subMenu"><a> ELECTRONICS [230]</a>
			<ul>
			<li><a class="active" href="products.html">Cameras (100)</a></li>
			<li><a href="products.html">Computers, Tablets & laptop (30)</a></li>
			<li><a href="products.html">Mobile Phone (80)</a></li>
			<li><a href="products.html">Sound & Vision (15)</a></li>
			</ul>
		</li>
		<li class="subMenu"><a> CLOTHES [840] </a>
		<ul>
			<li><a href="products.html">Women's Clothing (45)</a></li>
			<li><a href="products.html">Women's Shoes (8)</a></li>												
			<li><a href="products.html">Women's Hand Bags (5)</a></li>	
			<li><a href="products.html">Men's Clothings  (45)</a></li>
			<li><a href="products.html">Men's Shoes (6)</a></li>												
			<li><a href="products.html">Kids Clothing (5)</a></li>												
			<li><a href="products.html">Kids Shoes (3)</a></li>												
		</ul>
		</li>
		<li class="subMenu"><a>FOOD AND BEVERAGES [1000]</a>
			<ul>
			<li><a href="products.html">Angoves  (35)</a></li>
			<li><a href="products.html">Bouchard Aine & Fils (8)</a></li>												
			<li><a href="products.html">French Rabbit (5)</a></li>	
			<li><a href="products.html">Louis Bernard  (45)</a></li>
			<li><a href="products.html">BIB Wine (Bag in Box) (8)</a></li>												
			<li><a href="products.html">Other Liquors & Wine (5)</a></li>												
			<li><a href="products.html">Garden (3)</a></li>												
			<li><a href="products.html">Khao Shong (11)</a></li>												
		</ul>
		</li>
		<li><a href="products.html">HEALTH & BEAUTY [18]</a></li>
		<li><a href="products.html">SPORTS & LEISURE [58]</a></li>
		<li><a href="products.html">BOOKS & ENTERTAINMENTS [14]</a></li>
		<li style="border:0"> &nbsp;</li>						
		<li> <a href="product_summary.html"><strong>3 Items in your cart  <span class="badge badge-warning pull-right" style="line-height:18px;">$155.00</span></strong></a></li>
		<li style="border:0"> &nbsp;</li>	
		<li>
		  <div class="thumbnail">
			<img src="assets/products/1.jpg" alt="">
			<div class="caption">
			  <h5>Product name</h5>
			  <p> 
				Lorem Ipsum is simply dummy text. 
			  </p>
			  <h4><a class="btn" href="product_details.html">VIEW</a> <span class="pull-right">$222.00</span></h4>
			</div>
		  </div>
		</li>
		<li style="border:0"> &nbsp;</li>		
		<li class="last">
		  <div class="thumbnail">
			<img src="assets/products/2.jpg" alt="">
			<div class="caption">
			  <h5>Product name</h5>
			  <p> 
				Lorem Ipsum is simply dummy text. 
			  </p>
			  <h4><a class="btn" href="product_details.html">VIEW</a> <span class="pull-right">$222.00</span></h4>
			</div>
		  </div>
		</li> 
	  </ul>
</div>

	<div class="span9">
    <ul class="breadcrumb">
        <li><a href="<?=  base_url()?>">Home</a> <span class="divider">/</span></li>
		<li class="active">Register</li>
    </ul>
	<h3> User Registration</h3>	
	<hr class="soft"/>
	
	<div class="row">
		<div class="span9">
                <div class="well">
                <h5>CREATE YOUR ACCOUNT</h5><br/>
        <form action="<?=  base_url()?>user/register" method="post">                
            <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name" required="" value="<?php echo !empty($user['name'])?$user['name']:''; ?>">
          <?php echo form_error('name','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="" value="<?php echo !empty($user['email'])?$user['email']:''; ?>">
          <?php echo form_error('email','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?php echo !empty($user['phone'])?$user['phone']:''; ?>">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Password" required="">
          <?php echo form_error('password','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="conf_password" placeholder="Confirm password" required="">
          <?php echo form_error('conf_password','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <?php
            if(!empty($user['gender']) && $user['gender'] == 'Female'){
                $fcheck = 'checked="checked"';
                $mcheck = '';
            }else{
                $mcheck = 'checked="checked"';
                $fcheck = '';
            }
            ?>
            <div class="radio">
                <label>
                <input type="radio" name="gender" value="Male" <?php echo $mcheck; ?>>
                Male
                </label>
            </div>
            <div class="radio">
                <label>
                  <input type="radio" name="gender" value="Female" <?php echo $fcheck; ?>>
                  Female
                </label>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" name="signup" class="btn-primary" value="Submit"/>
        </div>
    </form>
    <p class="footInfo">Already have an account? <a href="<?php echo base_url(); ?>users/login">Login here</a></p> 
		</div>
		</div>
		
		
	</div>	
	
</div>
</div>