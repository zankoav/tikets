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
//	require_once __DIR__ . '/core/custom-types/programPostType.php';

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
	
//	function wpb_change_search_url() {
//		if ( is_search() && ! empty( $_GET['s'] ) ) {
//			wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
//			exit();
//		}
//	}
//	add_action( 'template_redirect', 'wpb_change_search_url' );