<?php

 /*
  Developer Name  : Alok Shukla
  Company Name    : Dataman computer systems pvt. ltd.
  Code writted at : 10 December 2017
  Description     : Checkout page.
 */ 

 ?> 
<div class="block">
	<div class="container">
		<ul class="breadcrumbs">
			<li><a href="<?php echo baseUrl; ?>"><i class="fa fa-home" aria-hidden="true"></i></a></li>
			<li> / <a href='<?php echo current_url(); ?>'>Shopping Cart</a></li>
		</ul>
	</div>
</div>
	
<div class="container">
	<div class="alert alert-success alert-dismissable hideBydefault">
		<strong>Success!</strong> Cart has been updated successfully. <a href="#" class="closeAlert">X</a>
	</div>
	<div class="cart-table">
		<div class="table-header">
			<div class="photo">Product Image</div>
			<div class="checkoutPage">Product Name</div>
			<div class="price">Unit Price </div>
			<!--
			<div class="price">Color </div>
			<div class="price">Metal </div>
			--->
			<div class="qty-width">Qty</div>
			<div class="subtotal">Subtotal</div>
			<div class="remove"><span class="hidden-sm hidden-xs">Remove</span></div>
		</div>
			
		<?php foreach ( $this->cart->contents() as $cartdata ) : ?>  
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
			<div class="checkoutPage">
			<?php echo $cartdata['name']; ?>			
			</div>
			<div class="price size-width">
				<?php echo '$'.$cartdata['price']; ?>		
			</div>
			<div class="qty-width">
				<?php echo $cartdata['qty']; ?>
			</div>
			<div class="subtotal">
				<span><?php echo '$'.$cartdata['subtotal']; ?></span>
			</div>
			<div class="remove">
				<a href="javascript:void(0);" class="icon icon-close-2 onClick2dlt" data-val='<?php echo $cartdata['rowid']; ?>'>
					<i class='glyphicon glyphicon-trash'></i>
				</a>
			</div>  
		</div>
		<?php endforeach; ?>
		
		<div class="table-footer">
			<button class="btn btn-lg continueShop champColor">Continue Shopping</button>
			<button class="btn btn-lg pull-right clearShop champColor"><i class="icon icon-bin"></i><span>Clear Shopping Cart</span></button>
		</div>
	</div>

<div class="row">
	<div class="col-md-3 total-wrapper">
		<table class="total-price">
			<tr class="total"><td>Grand Total</td><td><span class='totalAmount'></span></td></tr>
		</table>
	</div>
</div>
<script type='text/javascript'>

$(document).ready(function(){
	
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
			  $('.totalAmount').load( baseUrl+'countTotal', function(){
				 var grandTotal = $('.totalAmount').text();
			 	 $('#productPrice').val(grandTotal);
			  });
			}
		}
	});	
 });

 $('.totalAmount').load( baseUrl+'countTotal', function(){
	var grandTotal = $('.totalAmount').text();
	$('#productPrice').val(grandTotal);
 });
 
});
</script> 

<div class="col-sm-8 col-md-8">

<div class='row'>
	<h2 class="leftPadZero">Customer Information </h2>
	<div class="alert alert-success" 	role="alert" style="display: none;"><div id="Formsuccess"></div></div>
	<div class="alert alert-danger" 	role="alert" style="display: none;"><div id="alertMsg"></div></div>					

	<form role="form" name='Form' id="Form" enctype="multipart/form-data" method="post" accept-charset="utf-8" >

<?php if($this->session->userdata('customerLoggedin')!='YES'){ ?>

		<input type='hidden' value='' name='productPrice' id='productPrice' />
		<input type='hidden' value='<?php echo $data = serialize($this->cart->contents()); ?>' name='orderedProduct' 	id='orderedProduct'  />
		<input type='hidden' value='checkoutCreator' name='customerType' />
		
		<div class='formBox'>
			<label>Name <span class="required">*</span></label>
			<input type="text" class="form-control" 				name='customerName' 	  id='customerName' 		maxlength="100" />
		</div>
		<div class='formBox'>
			<label>Email <span class="required">*</span></label>
			<input type="text" class="form-control" 				name='customerEmail' 	  id='customerEmail' 		value='' maxlength='400' />
		</div>
		<div class='formBox'>
			<label>Password ( Not required for Guest users )</label>
			<input type="text" class="form-control" 				name='customerPassword' id='customerPassword' value='' maxlength='400' />		
		</div>
		<div class='formBox'>
			<label>Mobile No <span class="required">*</span></label>
			<input type="text" class="form-control numeric" name='customerMobile'   id='customerMobile' 	value=''  maxlength='15'>
		</div>
		<div class='formBox'>
			<label>Billing Address <input type='checkbox' 	value='' class='onClicktoBilling' /> Shipping address same as Billing address.</label>
			<textarea class="form-control input-lg billingAddress" 	name="billingAddress"></textarea>				
		</div>
		<div class='formBox'>
			<label>Shipping Address</label> 
			<textarea class="form-control input-lg shippingAddress" name="shippingAddress"></textarea>						
		</div>
		<div> 
			<button type="button" class="btn btn-lg champColor placeOrderBtn">
				<span class='spinner'>Placing....<i class="fa fa-spinner fa-spin"></i></span>
				<span class='hideMe'><i class="fa fa-share" aria-hidden="true"></i> Place Order </span>
			</button> 
		</div>

<?php } else {

	$rowID 	= $this->session->userdata('rowID');
	$SQL 		= "Select * FROM as_customers WHERE ID = $rowID";
	$QRY 		= $this->db->query($SQL);
	$d   = $QRY->row_array();
 ?> 

		<input type='hidden' value='' name='productPrice' id='productPrice' />
		<input type='hidden' value='<?php echo $data = serialize($this->cart->contents()); ?>' name='orderedProduct' 	id='orderedProduct'  />
		<input type='hidden' value='checkoutCreator' name='customerType' />
		
		<div class='formBox'>
			<label>Name <span class="required">*</span></label>
			<input type="text" class="form-control" value="<?php echo $d['customerName']; ?>" name='customerName' 	  id='customerName' 		maxlength="100" />
		</div>
		<div class='formBox'> 
			<label>Email <span class="required">*</span></label>
			<input type="text" class="form-control" 	readonly="readonly"	name='customerEmail' 	  id='customerEmail' 		value="<?php echo $d['customerEmail']; ?>" maxlength='400' />
			<input type="hidden"	name='customerPassword' 	  id='customerPassword' 		value="<?php echo $d['customerPassword']; ?>" maxlength='400' />
		</div> 
		<div class='formBox'>
			<label>Mobile No <span class="required">*</span></label>
			<input type="text" class="form-control numeric" name='customerMobile'   id='customerMobile' 	value="<?php echo $d['customerMobile']; ?>"  maxlength='15'>
		</div>
		<div class='formBox'>
			<label>Billing Address <input type='checkbox' 	value='' class='onClicktoBilling' /> Shipping address same as Billing address.</label>
			<textarea class="form-control input-lg billingAddress" 	name="billingAddress"><?php echo $d['billingAddress']; ?></textarea>				
		</div>
		<div class='formBox'>
			<label>Shipping Address</label> 
			<textarea class="form-control input-lg shippingAddress" name="shippingAddress"><?php echo $d['shippingAddress']; ?></textarea>						
		</div>
		<div> 
			<button type="button" class="btn btn-lg champColor placeOrderBtn">
				<span class='spinner'>Placing....<i class="fa fa-spinner fa-spin"></i></span>
				<span class='hideMe'><i class="fa fa-share" aria-hidden="true"></i> Place Order </span>
			</button> 
		</div>

<?php } ?>
</form>
</div>
</div>
</div>