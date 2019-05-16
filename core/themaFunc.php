<?php
    /**
     * @param string $couponName
     * @param integer $productID
     * @return      boolean
     */
    function productHasCoupon($couponName, $productID) {
        $coupone_id = wc_get_coupon_id_by_code($couponName);
        if ($coupone_id === 0) {
            return false;
        }

        $coupone_meta = get_post_meta($coupone_id);
        $target_prod  = $coupone_meta["product_ids"][0];

        $arr_prods = explode(",", $target_prod);
        for ($i = 0; $i < count($arr_prods); $i++) {
            $arr_prods[$i] = intval($arr_prods[$i]);
        }

        if (!in_array($productID, $arr_prods)) {
            return false;
        }

        return true;
    }

    /**
     * @param integer $prodId
     * @return      array
     */
    function getVariatetionsIds($prodId) {
        $result = [];

        $_product   = wc_get_product($prodId);
        $variations = $_product->get_available_variations();

        foreach ($variations as $variation) {
            $result[] = $variation['variation_id'];
        }
        return $result;
    }

    /**
     * @param array $orderInfo
     * @param string $coupon
     * @return      array
     */
    function getOrderDiscount($orderInfo, $coupon = null) {
        $discountName = "";
        if (!empty($coupon)) {
            $couponId = wc_get_coupon_id_by_code($coupon);
            $discountName = $coupon;
        } elseif(!empty($orderInfo['userPromocode'])) {
            $couponId = wc_get_coupon_id_by_code($orderInfo['userPromocode']);
            $discountName = $orderInfo['userPromocode'];
        }else{
            return null;
        }
        $coupone_meta  = get_post_meta($couponId);
        $variatetionId = getVariatetionsIds($orderInfo['tariffId']);
        $quantity      = $orderInfo['item_quantity'];

        $prod      = wc_get_product($variatetionId);
        $prodPrice = $prod->get_price();

        $discount["type"]          = $coupone_meta["discount_type"][0];// Type: fixed_cart, percent, fixed_product, percent_product
        $discount["coupon_amount"] = $coupone_meta["coupon_amount"][0];
        $discount["name"] = $discountName;

        switch ($discount["type"]) {
            case "fixed_cart":
                $discount["total"] = $prodPrice * $quantity - $discount["coupon_amount"];
                break;
            case "percent":
                $discount["total"] = $prodPrice * $quantity / 100 * $discount["coupon_amount"];
                break;
            case "fixed_product":
                $discount["total"] = $prodPrice * $quantity - $discount["coupon_amount"] * $quantity;
                break;
            case "percent_product":
                $discount["total"] = $prodPrice * $quantity / 100 * $discount["coupon_amount"];
                break;
        }

        return $discount;
    }