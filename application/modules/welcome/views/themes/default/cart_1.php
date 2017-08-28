<?php 
echo form_open('path/to/controller/update/method'); 
$this->load->model(array('welcome/products_model'));
?>

<table cellpadding="6" cellspacing="1" style="width:100%" border="0">

<tr>
        <th>Product</th>
        <th>Qty</th>
        <th style="text-align:right">Unit Price (SGD)</th>
        <th style="text-align:right">Line Total(SGD)</th>
</tr>

<?php 
$i = 1; 
$totalamount = 0;
?>



<?php foreach ($carts as $items): ?>

<?php 
$productdetails  = $this->products_model->get_by_id($items['product_id']);
//echo "<pre>"; print_r($items); echo "</pre>"; 
$img = $this->products_model->get_featured_image($items['product_id']);

//echo "<pre>"; print_r($productdetails); echo "</pre>"; //exit;

$totalamount += $items['total_price'];

?>

        <?php echo form_hidden($i.'[rowid]', $items['id']); ?>

        <tr>
                
                <td>
                 <?php echo $productdetails['product_name']; ?>
                </td>
                <td style="text-align:right"><?php echo number_format($items['qty']); ?></td>
                <td style="text-align:right">$<?php echo number_format($productdetails['product_price'], 2); ?></td>
                <td style="text-align:right">$<?php echo number_format($items['total_price'], 2); ?></td>
        </tr>

<?php $i++; ?>

<?php endforeach; ?>

<tr>
        <td colspan="2"> </td>
        <td class="right"><strong>Total</strong></td>
        <td class="right">$<?php echo number_format($items['total_price'], 2);?></td>
</tr>

</table>

<p><?php echo form_submit('', 'Update your Cart'); ?></p>