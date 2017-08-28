<?php
$isUserLoggedIn = ($this->session->userdata('isUserLoggedIn')) ? true : false;
if ($isUserLoggedIn) {
    $userid = $this->session->userdata('id');
}
?>
<div class="row">
    <!--
    <div id="sidebar" class="span3">
        <ul class="nav nav-list bs-docs-sidenav" style="display: block;">											
            <?php if (count($product_categories)): ?>
                <?php foreach ($product_categories as $key => $list): ?>
                    <li class="subMenu"><a> <?= $list['category_description'] ?></a></li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
    -->
    <div class="span9">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li class="active">Products Name</li>
        </ul>
        <h3> Products Name <small class="pull-right"> 40 products are available </small></h3>	
        <hr class="soft"/>
        <form class="form-horizontal span6">
            <div class="control-group">
                <label class="control-label alignL">Sort By </label>
                <select>
                    <option>Product name A - Z</option>
                    <option>Product name Z - A</option>
                    <option>Product Stoke</option>
                    <option>Product Lowest first</option>
                </select>
            </div>
        </form>
        <!--
        <div id="myTab" class="pull-right">
            <a href="#listView" data-toggle="tab"><span class="btn btn-large active"><i class="icon-list"></i></span></a>
            <a href="#blockView" data-toggle="tab"><span class="btn btn-large active"><i class="icon-th-large icon-white"></i></span></a>
        </div>
        -->
        <br class="clr"/>
        <div class="tab-content">
            <div class="tab-pane active" id="listView">
                <?php if (count($products)): ?>
                    <?php foreach ($products as $key => $list): ?>
                        <div class="row">	  
                            <div id="productView" class="span2">
                                <img src="<?= base_url() . $list['featured_image'] ?>" alt=""/>
                            </div>
                            <div class="span4">
                                <h3>New | Available</h3>				
                                <hr class="soft"/>
                                <h5><?= $list['product_name'] ?> </h5>
                                <p>
                                    <?= $list['tag_line'] ?>
                                </p>
                                <a class="btn btn-small pull-right" href="<?= base_url() ?>products/details/<?= $list['product_id'] ?>">View Details</a>
                                <br class="clr"/>
                            </div>
                            <div class="span3 alignR">
                                <!--<form class="form-horizontal qtyFrm">-->
                                    <h3> $<?= $list['product_price'] ?></h3>
                                    
                                    <input type="number" class="span1" placeholder="Qty." name="qty" id="qty_<?= $list['product_id'] ?>" id="qty" min="1"/>

                                    <button type="button" class="btn btn-large pull-right addto_cart"  data-pid="<?= $list['product_id'] ?>" data-uid="<?php echo $userid; ?>" data-price="<?= $list['product_price'] ?>"><i class=" icon-shopping-cart"></i> Add to cart</button>

                                <!--</form>-->
                            </div>
                        </div>
                        <hr class="soft"/>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>


        </div>

        <a href="<?= base_url() ?>" class="btn btn-large pull-right">Compair Product</a>
        <div class="pagination">
            <ul>
                <li><a href="#">&lsaquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#">&rsaquo;</a></li>
            </ul>
        </div>
        <br class="clr"/>
    </div>
</div>

<script language="javascript" type="text/javascript">
    $(document).ready(function () {

        $('.addto_cart').click(function (e) {
            e.preventDefault();
            var pid = $(this).data('pid');
            var userid = $(this).data('uid');
            var price = $(this).data('price');
            var qty = $("#qty_"+pid).val();

            if (qty <= 0) {
                alert("Please choose quantity");
            } else {
                var totalprice = qty * price;
                
                                
                $.ajax({
                    type: "POST",
                    url: "<?= base_url() ?>cart/addtocart",
                    data: {
                      pid: pid, userid: userid, totalprice: totalprice, qty: qty,
                      access_token: $("#access_token").val()
                    },
                    success: function(result) {
                       var result =  JSON.parse(result);
                        if(result.status == "OK") {
                            $("#carttotal").html(result.carttotal);
                            $("#carttotalprice").html(result.carttotal);
                        }else if(result.status == "Not OK") {
                            alert(result.error_msg);
                        }
                    },
                    error: function(result) {
                      alert('error');
                    }
                  });
            }

        });
    });
</script>