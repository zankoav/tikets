<?php
    header('Content-Type: application/json; charset=utf-8');

    add_action('wp_ajax_checkCoupone', 'checkCoupone');
    add_action('wp_ajax_nopriv_checkCoupone', 'checkCoupone');

    function checkCoupone() {

        $user_promocode = empty($_POST['user_promocode']) ? '' : esc_attr($_POST['user_promocode']);
        $user_prod_tariff_id = empty($_POST['user_prod_tariff_id']) ? '' : esc_attr($_POST['user_prod_tariff_id']);
        $user_prod_id = empty($_POST['user_prod_id']) ? '' : esc_attr($_POST['user_prod_id']);

        if (empty($user_prod_tariff_id) || empty($user_prod_id) ){
            $response['status'] = 0;
            $response['text']   = "error";
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
            wp_die();
            return;
        }
        if (empty($user_promocode)) {
            $response['status'] = 0;
            $response['text']   = "поле не заполнено";
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
            wp_die();
            return;
        }

        $coupone_id = wc_get_coupon_id_by_code($user_promocode);
        if ($coupone_id === 0) {
            $response['status'] = 0;
            $response['text']   = "промокод не существует";
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
            wp_die();
            return;
        }

        $coupone_meta = get_post_meta($coupone_id);
        $target_prod = $coupone_meta["product_ids"][0];
        $arr_prods = explode(",",$target_prod);
        for ($i = 0 ; $i <count($arr_prods); $i++){
            $arr_prods[$i] = intval($arr_prods[$i]);
        }

        if (!in_array($user_prod_id, $arr_prods)){
            if (!in_array($user_prod_tariff_id, $arr_prods) ){
                $response['status'] = 0;
                $response['user_prod_id_in_arr'] = !in_array($user_prod_id, $arr_prods);
                $response['user_prod_tariff_id_in_arr'] = !in_array($user_prod_tariff_id, $arr_prods);
                $response['text']   = "промокод не подходит для этого билета";
                echo json_encode($response, JSON_UNESCAPED_UNICODE);
                wp_die();
                return;
            }
        }

        $response['status'] = 1;
        $response['text']   = "промокод принят";
        $response['discount_type']   = $coupone_meta["discount_type"][0];
        $response['coupon_amount']   = $coupone_meta["coupon_amount"][0];
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        wp_die();
    }