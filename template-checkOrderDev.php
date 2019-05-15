<?php

//    get_header();

//    $orderID = $_GET['order'];
//    var_dump("");
//    var_dump("------------------------------------------------------------------------------------");
//    var_dump("------------------------------------------");
//    var_dump("------------------------------------------");
//    var_dump("------------------------------------------------------------------------------------");

//    $order   = wc_get_order($orderID);
//    $coupons = $order->get_used_coupons();
//    if (count($coupons) > 0) :
//        var_dump($coupons);
//    else:
//    $tiket_id         = 0;
//    $variation_id     = 0;
//    $product_quantity = 0;
//    foreach ($order->get_items() as $item_id => $item) {
//        $tiket_id         = $item->get_product_id();
//        $variation_id     = $item->get_variation_id();
//        $product_quantity = $item->get_quantity();
//        break;
//    }
//    $tiket = get_post($tiket_id);
//    var_dump($tiket->post_title);
//    var_dump($tiket_id.','.$variation_id);
//    $count_discount = carbon_get_post_meta($tiket_id, "quantity_discount");
//
//    $max_quantity = $count_discount[0]["quantity_to"];
//    $min_quantity = $count_discount[0]["quantity_from"];
//    $max_discount = $count_discount[0]["discount"];
//    foreach ($count_discount as $discount) {
//        if ($discount["quantity_from"] < $min_quantity) {
//            $min_quantity = $discount["quantity_from"];
//        }
//        if ($discount["quantity_to"] > $max_quantity) {
//            $max_quantity = $discount["quantity_to"];
//        }
//        if ($max_discount < $discount["$discount"]) {
//            $max_discount = $discount["$discount"];
//        }
//    }
//
//    $carrent_disc = 0;
//    $carrent_item = [];
//    foreach ($count_discount as $discount) {
//        if ($product_quantity >= $discount["quantity_from"] && $product_quantity <= $discount["quantity_to"]) {
//            $carrent_disc = $discount["discount"];
//            $carrent_item = $discount;
//            break;
//        }
//        if ($product_quantity >= $discount["quantity_from"] && empty($discount["quantity_to"])) {
//            if ($max_quantity < $product_quantity) {
//                $carrent_disc = $discount["discount"];
//                $carrent_item = $discount;
//                break;
//            }
//        }
//    }
//    var_dump($carrent_item);
//    var_dump($carrent_disc);
//
//    $coupon_code = str_replace(" ", "_", $tiket->post_title) ."_". $carrent_item["quantity_from"] ."_". $carrent_item["quantity_to"];
//    var_dump($coupon_code);
//    $couponExist = wc_get_coupon_id_by_code($coupon_code);
//    if (empty($couponExist)) {
//        $amount        = $carrent_disc;
//        $discount_type = 'fixed_cart';
//
//        $coupon        = array(
//            'post_title'   => $coupon_code,
//            'post_content' => '',
//            'post_status'  => 'publish',
//            'post_author'  => 1,
//            'post_type'    => 'shop_coupon'
//        );
//        $new_coupon_id = wp_insert_post($coupon);
//        update_post_meta($new_coupon_id, 'discount_type', $discount_type);
//        update_post_meta($new_coupon_id, 'coupon_amount', $amount);
//        update_post_meta($new_coupon_id, 'individual_use', 'yes');
//        update_post_meta($new_coupon_id, 'product_ids', $tiket_id.','.$variation_id);
//        update_post_meta($new_coupon_id, 'exclude_product_ids', '');
//        update_post_meta($new_coupon_id, 'usage_limit', '');
//        update_post_meta($new_coupon_id, 'expiry_date', '');
//        update_post_meta($new_coupon_id, 'apply_before_tax', 'yes');
//        //    update_post_meta( $new_coupon_id, 'free_shipping', 'no' );
//    }
//
//
//    $order->add_coupon($coupon_code);
//    endif;
//    var_dump("------------------------------------------------------------------------------------");
//    var_dump("------------------------------------------");
//    var_dump("------------------------------------------");
//    var_dump("------------------------------------------------------------------------------------");
//    get_footer();