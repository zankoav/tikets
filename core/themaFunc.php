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
    function getVariatetionsIds($prodId){
        $result = [];

        $_product   = wc_get_product( $prodId );
        $variations = $_product->get_available_variations();

        foreach($variations as $variation) {
            $result[] = $variation[ 'variation_id' ];
        }
        return $result;
    }