<?php
 
 /*
  Developer Name  : Alok Shukla
  Company Name    : Dataman computer systems pvt. ltd.
  Code writted at : 10 December 2017
  Description     : Hover cart display page.
 */ 
 ?> 
 
<div class="minicart-items-wrapper overflowed">
<ol class='minicart-items '>
	<?php
		$ifcartEmpty = $this->cart->contents();
		if(empty($ifcartEmpty)) { echo 'Cart is empty.'; } else { 
			$i=1; foreach ( $this->cart->contents() as $items ): 
	?>
	<li class="item product product-item fadeMe<?php echo $items['rowid']; ?>">
		<div class='product'>
			<a class='product-item-photo' href="#"> 
				<span class='product-image-container'> 
					<span class='product-image-wrapper'>
						<?php if( $this->cart->has_options($items['rowid'] ) == TRUE ) { 
							
							foreach ( $this->cart->product_options( $items['rowid'] ) as $key => $val ) :
								if($key == 'imgName'){ ?> <img class='product-image-photo' src="<?php echo $val; ?>" /><?php } 
							endforeach; 
						} 
						?>						
					</span>
				</span> 
			</a>
			<div class='product-item-details'>
				<div class='product-item-name'>
					<a href="#"><?php echo $items['name']; ?></a><div class='clearfix'></div>
					<?php if( $this->cart->has_options($items['rowid'] ) == TRUE ) { 
							foreach ( $this->cart->product_options( $items['rowid'] ) as $key => $val ) :
								if($key == 'ChoosenColor'){ 
									if(!empty($val)){ 
										echo $val; 
									} else { 
									echo ''; 
									} 
								}
								if($key == 'ChoosenSize') { 
									if(!empty($val)){ 
										echo ','.$val; 
									} else { 
										echo ''; 
									} 
								}
							endforeach; 
						} 
					?>					 
				</div>
				<div class='product-item-qty'>
					<label class='label'>Qty</label>
					<input class="item-qty cart-item-qty qty<?php echo $items['rowid']; ?>" type='number' min='1' maxlength='5' value='<?php echo $items['qty']; ?>'>
				</div>
				<div class='product-item-pricing'>
					<div class='price-container'>
					<span class='price-wrapper'>
						<span class='price-excluding-tax'>
							<span class='minicart-price'>
								<span class='price'><i class="fa fa-inr" aria-hidden="true"></i><span class='rowTotal rowTotal<?php echo $items['rowid']; ?>'><?php echo number_format($items['subtotal'],2); ?></span></span>
							</span>
						</span>
					</span> 
					</div>
					<div class="product actions">
						<div class='secondary'>
							<a class="action">
								<span class='delCart' data-val='<?php echo $items['rowid']; ?>'><i class="fa fa-trash cursorFa" aria-hidden="true"></i></span>
							</a>
						</div>
						<div class='primary'>
							<a class="action">
								<span class='editCart' data-val='<?php echo $items['rowid']; ?>' id='<?php echo $items['price']; ?>' ><i class="fa fa-pencil-square cursorFa" aria-hidden="true"></i></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</li>
			
	<?php $i++; endforeach; } ?>
	</ol>
	</div>
	<div class='subtotal'>
		<span class='label'><span>Total </span></span>
			<div class="amount price-container">
				<span class='price-wrapper'>
					<span class='price'> <span class='total'>&nbsp;</span></span>
				</span>
			</div>
	</div>
	<div class='actions'>
		<div class='secondary'>
			<a href="<?php echo baseUrl.'cart/'; ?>" class="btn btn-alt"><i class="icon icon-cart"></i><span>View and edit cart</span></a>
		</div>
		<div class='primary'> 
			<a class='btn' href="<?php echo baseUrl.'checkout/'; ?>"><i class="icon icon-external-link"></i><span>Go to Checkout</span></a>
		</div>
	</div>
<script type='text/javascript'>
$(document).ready(function(){
	
$(".editCart").click(function(){
	
	var currentrowID = $(this).data('val');
	var quantity 		 = $('.qty'+currentrowID).val();
	var price 		 	 = $(this).attr('id');
  var data = {  rowid: currentrowID, qty: quantity, price: price };
	
	$.ajax({
		type:"post",
		url:baseUrl+'XUPD',
		data:data,
		beforeSend: function() {
      $(".total").text('Updating..');
     },		
		success: function (response) {
			$('.totalAddedProducts').load(baseUrl+'totalProducts');
			var eachRowSubtotal = parseFloat(response).toFixed(2);
			$('.rowTotal'+currentrowID).text(eachRowSubtotal);
			$('.total').load(baseUrl+'countTotal');
		}
	});	
 });

$(".delCart").click(function(){
	
	var currentrowID = $(this).data('val');
  var data = {  rowid: currentrowID };
	
	$.ajax({
		type:"post",
		url:baseUrl+'XDPD',
		data:data,
		beforeSend: function() {
      $(".total").text('Updating..');
     },			
		success: function (data) {
			$('.fadeMe'+currentrowID).fadeOut();
			$('.totalAddedProducts').text(data);
			$('.total').load(baseUrl+'countTotal');
		}
	});	
 });
 $('.total').load(baseUrl+'countTotal');
 $('.totalAddedProducts').load(baseUrl+'totalProducts'); 
});		
</script>