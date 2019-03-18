<?php
	/**
	 * Template Name: Checkout Order Template
	 */
	get_header();
	
	$wsb_store = carbon_get_theme_option('wsb_store');
//	$wsb_secret_key = carbon_get_theme_option('wsb_secret_key');
	$wsb_storeid = carbon_get_theme_option('wsb_storeid');
	$wsb_return_url = carbon_get_theme_option('wsb_return_url');
	$wsb_cancel_return_url = carbon_get_theme_option('wsb_cancel_return_url');
	$wsb_notify_url= carbon_get_theme_option('wsb_notify_url');
	
	$productID = $_GET['id'];
	
?>
<div class="app">
	<?php get_template_part( '/core/views/headerView' ); ?>
	<main class="main" >

		<form action="" method="post" style="
			  display: flex;
			  flex-direction: column;
			  width: 500px;
			  margin: 1rem auto;
">

<!--			<form action="https://securesandbox.webpay.by/" method="post" style="-->
<!--			  display: flex;-->
<!--			  flex-direction: column;-->
<!--			  width: 500px;-->
<!--			  margin: 1rem auto;-->
<!--">-->
			<label for="wsb_customer_name">Имя</label>
			<input type="text" name="wsb_customer_name" value="">
			<label for="wsb_customer_address">Адрес</label>
			<input type="text" name="wsb_customer_address" value="">
			<label for="wsb_customer_name">Тип доставки</label>
			<input type="text" name="wsb_service_date" value="сразу после оплаты">
			<label for="wsb_email">email</label>
			<input type="text" name="wsb_email" value="email">
			
			<input type="hidden" name="wsb_test" value="1">
			<input type="hidden" name="wsb_currency_id" value="BYN">
			
			<input type="hidden" name="*scart">
			<input type="hidden" name="wsb_version" value="2">
			<input type="hidden" name="wsb_language_id" value="russian">
			<input type="hidden" name="wsb_storeid" value="<?= $wsb_storeid?>">
			<input type="hidden" name="wsb_store" value="<?= $wsb_store?>">
			
			
			<input type="hidden" name="wsb_return_url" value="http://your site url.com/success.php">
			<input type="hidden" name="wsb_cancel_return_url" value="http://your site url.com/cancel.php">
			<input type="hidden" name="wsb_notify_url" value="http://your site url.com/notify.php">

			<input type="text" name="wsb_invoice_item_name[]" value="TEST PROD 2">
			<input type="hidden" name="wsb_invoice_item_quantity[]" value="1">
			<input type="text" name="wsb_invoice_item_price[]" value="10">
			<input type="hidden" name="wsb_total" value="10.00">
			<input type="hidden" name="wsb_tax" value="1050">
			<input type="hidden" name="wsb_shipping_name" value="Виртуальеый товар">

			<input type="hidden" name="wsb_order_num" value="ORDER-12345678">
			<input type="hidden" name="wsb_seed" value="1242649174">
			<input type="hidden" name="wsb_signature" value="912702512e447846add6fa4985c7a2f271de52e6">
			
			<input type="hidden" name="wsb_shipping_price" value="0.0">
			<input type="submit" value="Перейти к оплате">
		</form>

	</main>
	<?php get_template_part( '/core/views/footerView' ); ?>
</div>

<?php
	get_footer();
?>
