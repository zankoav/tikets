<?php
	if (!defined( 'ABSPATH' )) exit();
	var_dump(carbon_get_theme_option('crb_link_to_search_page'));
	var_dump(carbon_get_theme_option('crb_logo_img'));
	?>

<?php

	get_template_part( "/core/views/mainMenu" );
	get_template_part( "/core/views/rightMenu" );