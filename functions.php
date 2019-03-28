<?php
	/**
	 * Created by PhpStorm.
	 * User: alexandrzanko
	 * Date: 12/4/18
	 * Time: 5:00 PM
	 */

	if (!defined( 'ABSPATH' )) exit();

	define( 'THEME_NAME', get_template() );
	define( 'BASE_URL', '/wp-content/themes/' . THEME_NAME );

//date_default_timezone_set("Europe/Minsk");


	require_once __DIR__ . '/utils/Assets.php';
	require_once __DIR__ . '/utils/SingletonOptions.php';

	require_once __DIR__ . '/core/init_theme.php';
//	require_once __DIR__ . '/core/custom-types/index.php';
	require_once __DIR__ . '/core/custom-types/partnerPostType.php';
	require_once __DIR__ . '/core/carbon/partnerMeta.php';
	require_once __DIR__ . '/core/carbon/shopOrderMeta.php';
	

	require_once __DIR__ . '/core/menu.php';
	require_once __DIR__ . '/core/styles.php';
	require_once __DIR__ . '/core/scripts.php';
	require_once __DIR__ . '/core/hooks.php';
	require_once __DIR__ . '/core/ajax.php';

//	require_once __DIR__ . '/core/cmb2/index.php';
//	require_once __DIR__ . '/core/cmb2/themeSettings.php';

	require_once  __DIR__ . '/core/carbon/optionPage.php';
	require_once  __DIR__ . '/core/carbon/homePage.php';
	require_once  __DIR__ . '/core/carbon/postPage.php';
	require_once  __DIR__ . '/core/carbon/contactMeta.php';
	require_once  __DIR__ . '/core/carbon/productMeta.php';
	require_once  __DIR__ . '/core/carbon/productCatMeta.php';
	require_once __DIR__ . '/vendor/autoload.php';
	
	require_once __DIR__ . '/core/addProductVarioatetionField.php';
	require_once __DIR__ . '/core/myAjax/createOrder.php';
	require_once __DIR__ . '/core/myAjax/becomePartner.php';
	require_once __DIR__ . '/core/myAjax/askAQuestion.php';
	require_once __DIR__ . '/core/webpayRespons.php';
	
	
	//----get permalink to checkout page
function getCheckoutPermaLink(){
	$checkout_args = [
		'post_type' => 'page',
		'meta_key' => '_wp_page_template',
		'meta_value' => 'template-checkout.php' ];
	$checkout_page_query = new WP_Query( $checkout_args );
	$checkout_page = $checkout_page_query->posts;
	return get_permalink($checkout_page[0]->ID);
}
	
	function getAskTheQuestionPermaLink(){
		$checkout_args = [
			'post_type' => 'page',
			'meta_key' => '_wp_page_template',
			'meta_value' => 'template-question.php' ];
		$checkout_page_query = new WP_Query( $checkout_args );
		$checkout_page = $checkout_page_query->posts;
		return get_permalink($checkout_page[0]->ID);
	}

function getMonthNameRu($index){
	$monthNames = [
		'января',
		'февраля',
		'марта',
		'апреля',
		'мая',
		'июня',
		'июля',
		'августа',
		'сентября',
		'октября',
		'ноября',
		'декабря',
	];
	return $monthNames[$index-1];
}