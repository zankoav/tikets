<?php
	/**
	 * Template Name: Checkout Order Template
	 */
	get_header('checkout');
	//	$wsb_secret_key = carbon_get_theme_option('wsb_secret_key');
	
	$wsb_store             = carbon_get_theme_option( 'wsb_store' );
	$wsb_storeid           = carbon_get_theme_option( 'wsb_storeid' );
	$wsb_return_url        = carbon_get_theme_option( 'wsb_return_url' );
	$wsb_cancel_return_url = carbon_get_theme_option( 'wsb_cancel_return_url' );
	$wsb_notify_url        = carbon_get_theme_option( 'wsb_notify_url' );
	
	$productID  = $_GET[ 'seminar' ];
	$_product   = wc_get_product( $productID );
	$prod_exist = empty( $_product ) ? false : true;
	if ($prod_exist) {
		$prodName   = $_product->get_title();
		$variations = $_product->get_available_variations();
		
		$variations_select = [];
		foreach($variations as $variation) {
			$variations_select[] = [
				'variation' => $variation[ "attributes" ][ "attribute_pa_tip-bileta" ],
				'$price' => $variation['display_regular_price'],
			];
//			if ($variation[ "attributes" ][ "attribute_pa_tip-bileta" ] == "busines") {
//				$business_ticket = $variation;
//			} elseif ($variation[ "attributes" ][ "attribute_pa_tip-bileta" ] == "vip") {
//				$vip_ticket = $variation;
//			} elseif ($variation[ "attributes" ][ "attribute_pa_tip-bileta" ] == "platinum") {
//				$platinum_ticket = $variation;
//			} elseif ($variation[ "attributes" ][ "attribute_pa_tip-bileta" ] == "standard") {
//				$standard_ticket = $variation;
//			}
		}
	}

?>
<div class="app">
	<?php get_template_part( '/core/views/headerView' ); ?>
	<main class="main">
		<?php if (!$prod_exist): ?>
			<h1>Семенар не найден</h1>
		<?php else: ?>
			<select id="ticket_type" name="ticket_type">
				<option disabled selected>Выберите тип билета</option>
				<?php foreach($variations_select as $item) :
					if ($item['variation'] == 'standard'):?>
						<option selected value="<?= $item['variation'];?>" data-price="<?= $item['$price']; ?>"><?= $item['variation']; ?></option>
				<?php else:?>
				<option value="<?= $item['variation'];?>" data-price="<?= $item['$price']; ?>"><?= $item['variation']; ?></option>
				<?php endif; endforeach;?>
			</select>
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
				<input type="hidden" name="*scart">
				<input type="hidden" name="wsb_storeid" value="<?= $wsb_storeid ?>">
				<input type="hidden" name="wsb_currency_id" value="BYN">
				<input type="hidden" name="wsb_version" value="2">
				<input type="hidden" name="wsb_test" value="1">
				<!--			<input type="hidden" name="wsb_store" value="--><? //= $wsb_store?><!--">-->

				<!--create order-->
				<input type="hidden" name="wsb_order_num" value="ORDER-12345678">
				<input type="hidden" name="wsb_seed" value="1242649174">
				<label for="wsb_invoice_item_name[0]">Название товара:</label>
				<input name="wsb_invoice_item_name[0]" type="text" value="<?= $prodName; ?>">
				<label for="wsb_invoice_item_price[0]"> Цена:</label>
				<input name="wsb_invoice_item_price[0]" type="text" value="10">
				<input type="hidden" name="wsb_invoice_item_quantity[0]" value="1">

				<input type="hidden" name="wsb_signature" value="912702512e447846add6fa4985c7a2f271de52e6">

				<label for="wsb_customer_name">Имя</label>
				<input type="text" name="wsb_customer_name" value="">
				<label for="wsb_customer_address">Адрес</label>
				<input type="text" name="wsb_customer_address" value="">
				<label for="wsb_email">email</label>
				<input type="text" name="wsb_email" value="email">

				<input type="hidden" name="wsb_return_url" value="<?= esc_url( $wsb_return_url ); ?>">
				<input type="hidden" name="wsb_cancel_return_url" value="<?= esc_url( $wsb_cancel_return_url ); ?>">
				<input type="hidden" name="wsb_notify_url" value="<?= esc_url( $wsb_cancel_return_url ); ?>">

				<input type="hidden" name="wsb_total" value="10.00">

				<input type="submit" id="submit-button" value="Перейти к оплате">
			</form>
		<?php endif; ?>
	</main>
	<?php get_template_part( '/core/views/footerView' ); ?>
</div>

<?php
	get_footer();
?>
