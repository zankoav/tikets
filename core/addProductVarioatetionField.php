<?php
	
	add_action( 'woocommerce_product_after_variable_attributes', 'bbloomer_add_custom_field_to_variations', 10, 3 );
	
	function bbloomer_add_custom_field_to_variations($loop, $variation_data, $variation){
		// Textarea
		woocommerce_wp_textarea_input(
			array(
				'id'          => '_ticket_benefits[' . $variation->ID . ']',
				'label'       => __( 'Преимушества билета', 'woocommerce' ),
				'placeholder' => '',
				'description' => __( 'Перечислять преимущества через ;', 'woocommerce' ),
				'value'       => get_post_meta( $variation->ID, '_ticket_benefits', true ),
			)
		);
	}

// -----------------------------------------
// 2. Save custom field on product variation save
	
	add_action( 'woocommerce_save_product_variation', 'bbloomer_save_custom_field_variations', 10, 2 );
	
	function bbloomer_save_custom_field_variations($variation_id, $i){
		// Textarea
		$textarea = $_POST['_ticket_benefits'][ $variation_id];
		if( ! empty( $textarea ) ) {
			update_post_meta( $variation_id, '_ticket_benefits', esc_attr( $textarea ) );
		}
	}

// -----------------------------------------
// 3. Store custom field value into variation data
	
	add_filter( 'woocommerce_available_variation', 'bbloomer_add_custom_field_variation_data' );
	
	function bbloomer_add_custom_field_variation_data($variations){
		$variations['_ticket_benefits'] = get_post_meta( $variations[ 'variation_id' ], '_ticket_benefits', true );
		return $variations;
	}