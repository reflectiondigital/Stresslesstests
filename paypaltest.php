<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Intro to Study for Success Video | Stressless Tests</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
body{
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
}

.bg1{
	background-color: #CCCCCC;
}

.bg2{
	background-color: #EFEFEF;
}

.update-btn{
	background-color: #CCCCCC;
	margin-left: 5px;
}

input{
	border: 1px solid #333333;
	padding: 2px;

}

.paypal-btn{
	float: right;
	border: none;
	margin-top: 20px;
}
</style>

</head>

<body>
<?php

$shipBase = 3;
$shipPerBook = .99;

function calcShipping($qty, $default, $incr){
	$shipping = $default + ($incr * $qty);
	return $shipping;
}
	
if ($_SERVER['REQUEST_METHOD'] == "POST"){
//------------------------------------------------------------------------------
//Form has been submitted
//------------------------------------------------------------------------------

	$quantity  = $_POST['quantity'];
	if ($quantity < 5){
		$quantity = 5;
		$price = 16.95;
		//PUT JS ALERT HERE!
		$alert = "Quantities must be 5 or higher!";
	} else if ($quantity < 20){
		$price = 16.95;
	} else {
		$price = 15.95;
	}
	
	

} else {
//------------------------------------------------------------------------------
//Form has not been submitted, begin building the form
//------------------------------------------------------------------------------
	$quantity = 5;
	$price = 16.95;
	
}

//Set Cost
$amount  = $price * $quantity;

?>
<form name="bookOrder" method="post" action="<?php echo $PHP_SELF;?>">
<div id="alert" style="color: red; font-weight:bold;"><?php echo $alert; ?></div>
<table width="575" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="325" class="bg1"><strong>Item</strong></td>
    <td width="175" align="center" class="bg1"><strong>Quantity</strong></td>
    <td width="75" class="bg1"><strong>Amount</strong></td>
  </tr>
  <tr>
    <td class="bg2">What's My Style? Book</td>
    <td align="center" class="bg2"><input name="quantity" type="text" id="quantity" value="<?php echo $quantity; ?>" size="5"><input name="update" type="submit" value="Update" class="update-btn"></td>
    <td class="bg2">$ <?php echo number_format($amount, 2); ?></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td class="bg2"><div align="right"><strong>Shipping</strong></div></td>
    <td class="bg2">$ <?php $shipping = calcShipping($quantity, $shipBase, $shipPerBook); echo number_format($shipping, 2); ?></td>
  </tr>
 
  <tr>
    <td>&nbsp;</td>
    <td class="bg2"><div align="right"><strong>Total</strong></div></td>
    <td class="bg2">$ <?php echo number_format($shipping + $amount, 2); ?></td>
  </tr>
</table>

</form>

<form name="PayPal" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
	  <input type="hidden" name="cmd" value="_xclick">
		
		<input type="hidden" name="currency_code" value="USD">
		<input type="hidden" name="lc" value="US">
		<input type="hidden" name="bn" value="PP-BuyNowBF">
        <input type="hidden" name="return" value="http://stresslesstests.org/book">
           
  <input type="hidden" name="amount" value="<?php echo $price; ?>">
        <input type="hidden" name="business" value="bcaldwell@comcast.net">
        <input type="hidden" name="item_name" value="What's My Style? Book">
  <input type="hidden" name="quantity" value="<?php echo $quantity; ?>"> 
  <input type="hidden" name="shipping" value="<?php echo $shipping; ?>">   
        <input type="hidden" name="item_number" value="book">		
	
    
    <input name="Submit" type="image" value="Checkout with PayPal" src="/files/image/btn_xpressCheckout.gif" class="paypal-btn" />
       
</form>



</body>
</html>
