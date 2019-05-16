<?php

    /**
     * Template
     * Name
     * : Check Order News Archive Template
     */
//    get_header();
//
//    $orderID = $_GET['order'];
//    var_dump("");
//    var_dump("------------------------------------------------------------------------------------");
//    var_dump("------------------------------------------");
//    var_dump("------------------------------------------");
//    var_dump("------------------------------------------------------------------------------------");
//
//    $order        = wc_get_order($orderID);
//    var_dump($order);
//    $coupons      = $order->get_used_coupons();
//    $coupone_id   = wc_get_coupon_id_by_code($coupons[0]);
//    $coupone_meta = get_post_meta($coupone_id);
//
//    $product         = wc_get_product(188);
//    $variatetionsIds = getVariatetionsIds(188);
//    $quantity        = 10;
//
//    $prod = wc_get_product($variatetionsIds[1]);
//    var_dump($prod->get_name());
//    $prodPrice = $prod->get_price();
//
//    $discount["type"]          = $coupone_meta["discount_type"][0];// Type: fixed_cart, percent, fixed_product, percent_product
//    $discount["coupon_amount"] = $coupone_meta["coupon_amount"][0];
//
//    echo '$quantity ';
//    var_dump($quantity);
//    switch ($discount["type"]) {
//        case "fixed_cart":
//            $discount["total"] = $prodPrice * $quantity - $discount["coupon_amount"];
//            break;
//        case "percent":
//            $discount["total"] = $prodPrice * $quantity / 100 * $discount["coupon_amount"] ;
//            break;
//        case "fixed_product":
//            $discount["total"] = $prodPrice * $quantity - $discount["coupon_amount"] * $quantity;
//            break;
//        case "percent_product":
//            $discount["total"] = $prodPrice * $quantity / 100 * $discount["coupon_amount"] ;
//            break;
//    }
//echo '$discount ';
//var_dump($discount);
//
//    var_dump("------------------------------------------------------------------------------------");
//    var_dump("------------------------------------------");
//    var_dump("------------------------------------------");
//    var_dump("------------------------------------------------------------------------------------");
//    get_footer();