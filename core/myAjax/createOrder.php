<?php

    if (!defined('ABSPATH')) {
        exit();
    }

    add_action('wp_ajax_createOrder', 'createOrder');
    add_action('wp_ajax_nopriv_createOrder', 'createOrder');
    function createOrder() {

        //get data fom front
        $form_data = [
            'customer_name' => empty($_POST['name']) ? '' : esc_attr($_POST['name']),
            'item_quantity' => empty($_POST['ticketCount']) ? '' : esc_attr($_POST['ticketCount']),
            'product_id'    => empty($_POST['programId']) ? '' : esc_attr($_POST['programId']),
            'ticket_type'   => empty($_POST['tariffId']) ? '' : esc_attr($_POST['tariffId']),
            'wsb_email'     => empty($_POST['email']) ? '' : esc_attr($_POST['email']),
            'phone'         => empty($_POST['phone']) ? '' : esc_attr($_POST['phone']),
            'userPromocode' => empty($_POST['userPromocode']) ? '' : esc_attr($_POST['userPromocode']),
        ];

        //error if wrong email
        if (!filter_var($form_data['wsb_email'], FILTER_VALIDATE_EMAIL)) {
            $response['status']  = 0;
            $response['message'] = "invalid email";
            echo json_encode($response);
            wp_die();
            return;
        }

        //error if one of fields is empty
        foreach ($form_data as $key => $form_datum) {
            if ($key ==  'userPromocode'){
                continue;
            }
            if (empty($form_datum)) {
                $response['status']  = 0;
                $response['message'] = $key . " is empty! end equel " . $form_datum;
                echo json_encode($response);
                wp_die();
                return;
            }
        }

        $orderInfo     = createOrderEntity($form_data);

        $product       = wc_get_product($form_data['product_id']);
        $wsb_order_num = $orderInfo['orderId'];
        $wsb_total     = $orderInfo['totalPrice'];

        $wsb_secret_key = carbon_get_theme_option('wsb_secret_key');
        $wsb_storeid    = carbon_get_theme_option('wsb_storeid');


        $wsb_return_url        = get_permalink((int)$form_data['product_id']);
        $wsb_cancel_return_url = carbon_get_theme_option('wsb_cancel_return_url');
        $wsb_notify_url        = carbon_get_theme_option('wsb_notify_url');
        $wsb_seed              = time();

        $test_mode            = carbon_get_theme_option('payment_test_mode');
        $wsb_signature_origin = $wsb_seed . $wsb_storeid . $wsb_order_num . $test_mode . 'BYN' . $wsb_total . $wsb_secret_key;
        $wsb_signature        = sha1($wsb_signature_origin);

        //		update_post_meta($orderInfo[ 'orderId' ], 'webpay_signature', $wsb_signature);
        //		update_post_meta($orderInfo[ 'orderId' ], 'webpay_feed', $wsb_seed);

        $response = [
            'wsb_order_num'                => $orderInfo['orderId'],
            'wsb_total'                    => $orderInfo['totalPrice'],
            'wsb_signature'                => $wsb_signature,
            'wsb_seed'                     => $wsb_seed,
            'wsb_customer_name'            => $form_data['customer_name'],
            'wsb_invoice_item_name[0]'     => $product->get_title() . '(' . $orderInfo['$variationName'] . ')',
            'wsb_invoice_item_price[0]'    => $orderInfo['price'],
            'wsb_invoice_item_quantity[0]' => $form_data['item_quantity'],
            'wsb_email'                    => $form_data['wsb_email'],
            'wsb_storeid'                  => $wsb_storeid,
            '*scart',
            'wsb_currency_id'              => 'BYN',
            'wsb_version'                  => '2',
            'wsb_test'                     => $test_mode,
            'wsb_return_url'               => get_permalink($form_data['product_id']),
            'wsb_cancel_return_url'        => get_permalink($wsb_cancel_return_url),
            'wsb_notify_url'               => get_permalink($wsb_notify_url),
        ];
        //add discount
//            'orderId'
//            'totalPrice'
//            '$variationName'
//            'price'
//            'discount'
        if (!empty($orderInfo["discount"])){
            $wsb_discount_name  = $orderInfo["discount"];
            $wsb_discount_price  = $orderInfo["price"] * $orderInfo["quantity"] - $orderInfo["totalPrice"] ;
            $response["wsb_discount_name"] = $wsb_discount_name;
            $response["wsb_discount_price"] = $wsb_discount_price;
        }

        echo json_encode($response);
        wp_die();
    }


    function createOrderEntity($form_data) {
        $address = [
            'first_name' => $form_data['customer_name'],
            'last_name'  => '',
            'company'    => '',
            'email'      => $form_data['wsb_email'],
            'phone'      => '',
            'address_1'  => $form_data['customer_address'],
            'address_2'  => '',
            'city'       => '',
            'state'      => '',
            'postcode'   => '',
            'country'    => '',
        ];

        $product_id        = (int)$form_data['product_id'];
        $order             = wc_create_order();
        $membershipProduct = new WC_Product_Variable($product_id);
        $quantity          = (int)$form_data['item_quantity'];
        $ticket_type       = (int)$form_data['ticket_type'];

        $variationName = '';
        $price         = '';

        $theMemberships  = $membershipProduct->get_available_variations();
        $variationsArray = [];
        foreach ($theMemberships as $membership) {
            if ((int)$membership['variation_id'] == $ticket_type) {
                $variationID                  = $membership['variation_id'];
                $variationsArray['variation'] = $membership['attributes'];
                $variationName                = $membership["attributes"]["attribute_pa_tip-bileta"];
                $price                        = $membership['display_regular_price'];
            }
        }

        if ($variationID) {
            $varProduct = new WC_Product_Variation($variationID);

            $order->add_product($varProduct, $quantity, $variationsArray);
            $order->set_address($address, 'billing');
            $order->set_address($address, 'shipping');
            $order->calculate_totals();
            $order->update_status('pending');
        }

//add discount if coupon exist
//if coupon don't exit check discount by quantity
        $discountByCount = "";
        if (!empty($form_data["userPromocode"]) && productHasCoupon($form_data["userPromocode"], $product_id)) {
            $order->apply_coupon($form_data["userPromocode"]);
            $discountByCount = $form_data["userPromocode"];
        } else {
            $tiket_id         = $product_id;
            $variatetionsIds  = getVariatetionsIds($tiket_id);
            $product_quantity = $quantity;

            $tiket          = get_post($tiket_id);

//check discount by quantity
            $count_discount = carbon_get_post_meta($tiket_id, "quantity_discount");
            if (!empty($count_discount)){
                $max_quantity = $count_discount[0]["quantity_to"];
                $min_quantity = $count_discount[0]["quantity_from"];
                $max_discount = $count_discount[0]["discount"];
                foreach ($count_discount as $discount) {
                    if ($discount["quantity_from"] < $min_quantity) {
                        $min_quantity = $discount["quantity_from"];
                    }
                    if ($discount["quantity_to"] > $max_quantity) {
                        $max_quantity = $discount["quantity_to"];
                    }
                    if ($max_discount < $discount["$discount"]) {
                        $max_discount = $discount["$discount"];
                    }
                }

                $carrent_disc = 0;
                $carrent_item = [];
                foreach ($count_discount as $discount) {
                    if ($product_quantity >= $discount["quantity_from"] && $product_quantity <= $discount["quantity_to"]) {
                        $carrent_disc = $discount["discount"];
                        $carrent_item = $discount;
                        break;
                    }
                    if ($product_quantity >= $discount["quantity_from"] && empty($discount["quantity_to"])) {
                        if ($max_quantity < $product_quantity) {
                            $carrent_disc = $discount["discount"];
                            $carrent_item = $discount;
                            break;
                        }
                    }
                }
                $coupon_code = str_replace(" ", "_", $tiket->post_title) . "_" . $carrent_item["quantity_from"] . "_" . $carrent_item["quantity_to"] . "_" . $carrent_disc;

                //передать код купона, в результат
                $discountByCount = "Скидка за покупку больше ". $carrent_item["quantity_from"];

                $couponExist = wc_get_coupon_id_by_code($coupon_code);
                if (empty($couponExist)) {
                    $amount        = $carrent_disc;
                    $discount_type = 'percent';

                    $coupon        = array(
                        'post_title'   => $coupon_code,
                        'post_content' => '',
                        'post_status'  => 'publish',
                        'post_author'  => 1,
                        'post_type'    => 'shop_coupon'
                    );
                    $new_coupon_id = wp_insert_post($coupon);
                    update_post_meta($new_coupon_id, 'discount_type', $discount_type);
                    update_post_meta($new_coupon_id, 'coupon_amount', $amount);
                    update_post_meta($new_coupon_id, 'individual_use', 'yes');
                    update_post_meta($new_coupon_id, 'product_ids', $tiket_id . ',' . implode(",", $variatetionsIds));
                    update_post_meta($new_coupon_id, 'exclude_product_ids', '');
                    update_post_meta($new_coupon_id, 'usage_limit', '');
                    update_post_meta($new_coupon_id, 'expiry_date', '');
                    update_post_meta($new_coupon_id, 'apply_before_tax', 'yes');
                    //    update_post_meta( $new_coupon_id, 'free_shipping', 'no' );
                }
                $order->apply_coupon($coupon_code);
            }
        }

        $result = [
            'orderId'        => $order->get_id(),
            'totalPrice'     => $order->get_total(),
            '$variationName' => $variationName,
            'price'          => $price,
            'quantity'          => $quantity,
        ] ;
        if (!empty($discountByCount)){
            $result['discount'] = $discountByCount;
        }

        return $result;
    }
