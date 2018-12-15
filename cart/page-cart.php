<?php
 
 /*
  Developer Name  : Alok Shukla
  Company Name    : Dataman computer systems pvt. ltd.
  Code writted at : 10 December 2017
  Description     : Cart page.
 */ 
 
	$cart = $this->cart->contents();
	if(empty($cart)) { 
?>
<div class="container">
	<div align="center" class="whenCartempty">
		<img src="<?php echo wimgFolder; ?>empty-basket.png" />
		<h2 align="center">SHOPPING CART IS</h2>
		<h2 align="center">EMPTY</h2>
		<div><button type="button" class="btn btn-lg champColor continueShop">Continue Shopping</button></div>
	</div>
</div>
<?php	}	else { ?>
	
<main class="page-main">
<div class="block">
	<div class="container">
		<ul class="breadcrumbs">
			<li><a href="<?php echo baseUrl; ?>"><i class="fa fa-home" aria-hidden="true"></i></a></li>
			<li> / <a href='<?php echo current_url(); ?>'>Shopping Cart</a></li>
		</ul>
	</div>
</div> 	
<div class="block">
<div class="container">
<div class="alert alert-success alert-dismissable hideBydefault">
	<a href="#" class="closeAlert">X</a>
	<strong>Success!</strong> Cart has been updated successfully.
</div>
<div class="cart-table">
<div class="table-header">
	<div class="photo"> 		Product Image </div>
	<div class="name"> 			Product Name </div>
	<div class="price"> 		Unit Price </div>
	<div class="qty"> 			Qty </div>
	<div class="subtotal"> 	Subtotal </div>
	<div class="remove"> 		<span class="hidden-sm hidden-xs">Remove</span> </div>
	<div class="edit">			<span class="hidden-sm hidden-xs">Update</span> </div>
</div>

<?php foreach ( $this->cart->contents() as $cartdata ) {  ?>
      
<div class="table-row fadeGrid<?php echo $cartdata['rowid']; ?>">
<div class="photo">
<a href="#">
	<?php if( $this->cart->has_options($cartdata['rowid'] ) == TRUE )
	{ 
		foreach( $this->cart->product_options( $cartdata['rowid'] ) as $key => $val ) :
		if($key == 'imgName'){ ?><img src="<?php echo $val; ?>"><?php } 
		endforeach; 
	} 
	?>		 
</a>
</div>

<div class="name">
<?php echo $cartdata['name']; ?><div class='cleafix'></div>
<?php if( $this->cart->has_options($cartdata['rowid'] ) == TRUE ) { 
	foreach ( $this->cart->product_options( $cartdata['rowid'] ) as $key => $val ) :
		if($key == 'ChoosenColor'){ 
			if(!empty($val)){ echo '<span class=optionsGreen><i class="fa fa-check" aria-hidden="true"></i> Color:</span>'.$val.'<div class=cleafix></div>';} else { echo ''; } 
		}
		if($key == 'ChoosenSize') { 
			if(!empty($val)){ echo '<span class=optionsGreen><i class="fa fa-check" aria-hidden="true"></i> Size:</span>'.$val.'<div class=cleafix></div>';}  else { echo ''; } 
		}
		if($key == 'ChoosenMetal') { 
			if(!empty($val)){ echo '<span class=optionsGreen><i class="fa fa-check" aria-hidden="true"></i> Metal:</span>'.$val.'<div class=cleafix></div>';} else { echo ''; } 
		}		
	endforeach; 
} 
?>		
</div>
<div class="price"><?php echo '$'.$cartdata['price']; ?></div>

<div class="qty qty-changer">
	<fieldset>
	<input type="button" 	value="-" class="decrease">
	<input type="text" 		class="qtyCart<?php echo $cartdata['rowid']; ?>" value="<?php echo $cartdata['qty']; ?>" data-min="1" data-max="5">
	<input type="button" 	value="+" class="increase">
	</fieldset>
</div>

<div class="subtotal">
	<span class='eachRowSubtotal<?php echo $cartdata['rowid']; ?>'>
		<?php echo '$'.$cartdata['subtotal']; ?>
	</span>
</div>
<div class="remove">
	<a href="javascript:void(0);" class="icon icon-close-2 onClick2dlt" data-val='<?php echo $cartdata['rowid']; ?>'>
		<i class='glyphicon glyphicon-trash'></i>
	</a>
</div>  
<div class="edit">
	<a href="javascript:void(0);" class='onClick2edit' data-val='<?php echo $cartdata['rowid']; ?>' data-value='<?php echo $cartdata['price']; ?>'>
		<i class="glyphicon glyphicon-refresh"></i>
	</a> 
</div>
</div>
 
<?php } ?>
	
<div class="table-footer">
	<button class="btn btn-lg continueShop champColor">CONTINUE SHOPPING</button>
	<button class="btn btn-lg pull-right clearShop champColor"><i class="icon icon-bin"></i><span>Clear Shopping Cart</span></button>
</div>
</div>
<div class="row">
<div class="col-md-3 total-wrapper">
	<table class="total-price">
		<tr class="GrandTotal">
			<td>Grand Total</td>
			<td><span class='totalAmount'></span></td>
		</tr>
	</table>
	<div class="cart-action">
	<div><button class="btn btn-lg checkoutBtn champColor">Proceed To Checkout</button></div>
	</div>
</div>
</div>
</div>
</div>
</main>
<script type='text/javascript'>
$(document).ready(function(){
	
$(".onClick2edit").click(function(){
	
	var currentrowID 			= $(this).data('val');
	var quantity 				 	= $('.qtyCart'+currentrowID).val();
	var currentPrice 		 	= $(this).data('value');
	
	var data = {  rowid: currentrowID, qty: quantity, price: currentPrice };
	
	$.ajax({
		type:"post",
		url:baseUrl+'XUPKart',
		data:data,
		beforeSend: function() {
      $(".totalAmount").text('Updating..');
     },		
		success: function (response) {
			
			$('.totalAddedProducts').load(baseUrl+'totalProducts');
			var eachRowSubtotal = parseFloat(response).toFixed(2);
			$('.eachRowSubtotal'+currentrowID).text('$'+eachRowSubtotal);
			$('.totalAmount').load(baseUrl+'countTotal');
			$('.hideBydefault').show();
		}
	});	
 });

$(".onClick2dlt").click(function(){
	
	var currentrowID = $(this).data('val');
  var data = {  rowid: currentrowID };
	
	$.ajax({
		type:"post",
		url:baseUrl+'XDKart',
		data:data,
		beforeSend: function() {
      $(".totalAmount").text('Updating..');
     },			
		success: function (data) {
			if(data==0){
				window.location.href=baseUrl+'cart/'
			}else{
				$('.fadeGrid'+currentrowID).slideUp();
				$('.totalAddedProducts').text(data);
				$('.totalAmount').load(baseUrl+'countTotal');			
			}
		}
	});	
 });
 
 $(".closeAlert").click(function(){
	$('.hideBydefault').hide();
 });
 
 $('.totalAmount').load(baseUrl+'countTotal');
});
</script> 
<?php } ?>