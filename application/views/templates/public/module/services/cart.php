<h2>Cart</h2>
<?php if(empty($cart)):?>
<div class="empty-cart" style="text-align: center;">
<h4>No Items in cart</h4>
</div>
<?php endif;?>

<?php if($cart) : foreach ($cart as $id=>$qty):?>
<?php print_r($cart);?>
<!-- <tr> -->
	<td><?php echo $id;?></td>
	<td><?php echo $qty;?></td>
<!-- </tr> -->
<?php endforeach; endif;?>