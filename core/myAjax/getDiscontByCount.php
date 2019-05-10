<?php
    header('Content-Type: application/json; charset=utf-8');

    add_action('wp_ajax_getDiscontByCount', 'getDiscontByCount');
    add_action('wp_ajax_nopriv_getDiscontByCount', 'getDiscontByCount');

    function getDiscontByCount() {

        $user_prod_id = empty($_POST['user_prod_id']) ? '' : esc_attr($_POST['user_prod_id']);

        if(empty($user_prod_id)){
            $response['status'] = 0;
            $response['text']   = "error";
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
            wp_die();
            return;
        }



        $response['status'] = 1;
        $response['text']   = "промокод принят";
        $response['disconts']   = carbon_get_post_meta($user_prod_id, "quantity_discount");
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        wp_die();
    }