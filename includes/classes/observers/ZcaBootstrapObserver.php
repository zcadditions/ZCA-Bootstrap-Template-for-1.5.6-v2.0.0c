<?php
// -----
// Part of the ZCA Bootstrap template, @zcadditions, @lat9.
//
class ZcaBootstrapObserver extends base 
{
    // -----
    // On construction, watch for various notifications ONLY IF the ZCA Bootstrap template
    // is currently active.
    //
    public function __construct() 
    {
        if (!defined('PRODUCT_INFO_SHOW_BOOTSTRAP_MODAL_POPUPS')) {
            define('PRODUCT_INFO_SHOW_BOOTSTRAP_MODAL_POPUPS', 'Yes');
        }
        
        if (zca_bootstrap_active()) {
            $this->attach(
                $this, 
                array(
                    //- From /includes/functions/functions_prices.php (zen_get_products_display)
                    'NOTIFY_ZEN_GET_PRODUCTS_DISPLAY_PRICE_SALE',
                    'NOTIFY_ZEN_GET_PRODUCTS_DISPLAY_PRICE_SPECIAL',
                    'NOTIFY_ZEN_GET_PRODUCTS_DISPLAY_PRICE_NORMAL',
                    'NOTIFY_ZEN_GET_PRODUCTS_DISPLAY_PRICE_FREE_OR_CALL',
                    
                    //- From /includes/functions/html_output.php
                    'NOTIFY_ZEN_CSS_BUTTON_SUBMIT',
                    'NOTIFY_ZEN_CSS_BUTTON_BUTTON',
                    'NOTIFY_ZEN_DRAW_INPUT_FIELD',
                    'NOTIFY_ZEN_DRAW_SELECTION_FIELD',
                    'NOTIFY_ZEN_DRAW_TEXTAREA_FIELD',
                    'NOTIFY_ZEN_DRAW_PULL_DOWN_MENU',
                    
                    //- From /includes/classes/order.php
                    'NOTIFY_ORDER_COUPON_LINK',
                    
                    //- From /includes/modules{/bootstrap}/additional_images.php
                    'NOTIFY_MODULES_ADDITIONAL_IMAGES_SCRIPT_LINK',
                )
            );
        }
    }

    public function update(&$class, $eventID, $p1, &$p2, &$p3, &$p4, &$p5)
    {
        switch ($eventID) {
            case 'NOTIFY_ZEN_GET_PRODUCTS_DISPLAY_PRICE_SALE':
                $this->setVariables($eventID, $p1);
                
                if ($this->display_sale_price) {
                    if (SHOW_SALE_DISCOUNT == 1) {
                        if ($this->display_normal_price != 0) {
                            $show_discount_amount = number_format(100 - (($this->display_sale_price / $this->display_normal_price) * 100), SHOW_SALE_DISCOUNT_DECIMALS);
                        } else {
                            $show_discount_amount = '';
                        }
                        $show_sale_discount = '<span class="mx-auto w-100 p-1 productPriceDiscount">' . PRODUCT_PRICE_DISCOUNT_PREFIX . $show_discount_amount . PRODUCT_PRICE_DISCOUNT_PERCENTAGE . '</span>';
                    } else {
                        $show_sale_discount = '<span class="mx-auto w-100 p-1 productPriceDiscount">' . PRODUCT_PRICE_DISCOUNT_PREFIX . $this->displayPrice($this->display_normal_price - $this->display_sale_price) . PRODUCT_PRICE_DISCOUNT_AMOUNT . '</span>';
                    }
                } else {
                    if (SHOW_SALE_DISCOUNT == 1) {
                        $show_sale_discount = '<span class="mx-auto w-100 p-1 productPriceDiscount">' . PRODUCT_PRICE_DISCOUNT_PREFIX . number_format(100 - (($this->display_special_price / $this->display_normal_price) * 100), SHOW_SALE_DISCOUNT_DECIMALS) . PRODUCT_PRICE_DISCOUNT_PERCENTAGE . '</span>';
                    } else {
                        $show_sale_discount = '<span class="mx-auto w-100 p-1 productPriceDiscount">' . PRODUCT_PRICE_DISCOUNT_PREFIX . $this->displayPrice($this->display_normal_price - $this->display_special_price) . PRODUCT_PRICE_DISCOUNT_AMOUNT . '</span>';
                    }
                }
                $p2 = true;
                $p3 = $show_sale_discount;
                break;
                
            case 'NOTIFY_ZEN_GET_PRODUCTS_DISPLAY_PRICE_SPECIAL':
                $this->setVariables($eventID, $p1);
                
                $show_normal_price = '<span class="mx-auto w-100 p-1 normalprice">' . $this->displayPrice($this->display_normal_price) . ' </span>';
                if ($this->display_sale_price && $this->display_sale_price != $this->display_special_price) {
                    $show_special_price = '<span class="mx-auto w-100 p-1 productSpecialPriceSale">' . $this->displayPrice($this->display_special_price) . '</span>';
                    if ($this->product_is_free == '1') {
                        $show_sale_price = '<span class="mx-auto w-100 p-1 productSalePrice">' . PRODUCT_PRICE_SALE . '<s>' . $this->displayPrice($this->display_sale_price) . '</s></span>';
                    } else {
                        $show_sale_price = '<span class="mx-auto w-100 p-1 productSalePrice">' . PRODUCT_PRICE_SALE . $this->displayPrice($this->display_sale_price) . '</span>';
                    }
                } else {
                    if ($this->product_is_free == '1') {
                        $show_special_price = '<span class="mx-auto w-100 p-1 productSpecialPrice">' . '<s>' . $this->displayPrice($this->display_special_price) . '</s>' . '</span>';
                    } else {
                        $show_special_price = '<span class="mx-auto w-100 p-1 productSpecialPrice">' . $this->displayPrice($this->display_special_price) . '</span>';
                    }
                    $show_sale_price = '';
                }
                $p2 = true;
                $p3 = $show_normal_price;
                $p4 = $show_special_price;
                $p5 = $show_sale_price;
                break;
                
            case 'NOTIFY_ZEN_GET_PRODUCTS_DISPLAY_PRICE_NORMAL':
                $this->setVariables($eventID, $p1);
                
                if ($this->display_sale_price) {
                    $show_normal_price = '<span class="mx-auto w-100 p-1 normalprice">' . $this->displayPrice($this->display_normal_price) . ' </span>';
                    $show_special_price = '';
                    $show_sale_price = '<span class="mx-auto w-100 p-1 productSalePrice">' . PRODUCT_PRICE_SALE . $this->displayPrice($this->display_sale_price) . '</span>';
                } else {
                    if ($this->product_is_free == '1') {
                        $show_normal_price = '<span class="mx-auto w-100 p-1 productFreePrice"><s>' . $this->displayPrice($this->display_normal_price) . '</s></span>';
                    } else {
                        $show_normal_price = '<span class="mx-auto w-100 p-1 productBasePrice">' . $this->displayPrice($this->display_normal_price) . '</span>';
                    }
                    $show_special_price = '';
                    $show_sale_price = '';
                }
                $p2 = true;
                $p3 = $show_normal_price;
                $p4 = $show_special_price;
                $p5 = $show_sale_price;
                break;
                
            case 'NOTIFY_ZEN_GET_PRODUCTS_DISPLAY_PRICE_FREE_OR_CALL':
                $this->setVariables($eventID, $p1);
                
                $free_tag = $call_tag = '';
                
                if ($this->product_is_free == '1') {
                    if (OTHER_IMAGE_PRICE_IS_FREE_ON == '0') {
                        $free_tag = '<span class="mx-auto w-100 p-1">' . PRODUCTS_PRICE_IS_FREE_TEXT . '</span>';
                    } else {
                        $free_tag = '<span class="mx-auto w-100 p-1">' . zen_image(DIR_WS_TEMPLATE_IMAGES . OTHER_IMAGE_PRICE_IS_FREE, PRODUCTS_PRICE_IS_FREE_TEXT, '', '', '') . '</span>';
                    }
                }

                if ($this->product_is_call) {
                    if (PRODUCTS_PRICE_IS_CALL_IMAGE_ON == '0') {
                        $call_tag = '<span class="mx-auto w-100 p-1">' . PRODUCTS_PRICE_IS_CALL_FOR_PRICE_TEXT . '</span>';
                    } else {
                        $call_tag = '<span class="mx-auto w-100 p-1">' . zen_image(DIR_WS_TEMPLATE_IMAGES . OTHER_IMAGE_CALL_FOR_PRICE, PRODUCTS_PRICE_IS_CALL_FOR_PRICE_TEXT, '', '', '') . '</span>';
                    }
                }
                $p2 = true;
                $p3 = $free_tag;
                $p4 = $call_tag;
                break;
                
            case 'NOTIFY_ZEN_CSS_BUTTON_SUBMIT':
                $this->setVariables($eventID, $p1);
                
                $css_button = '<button type="submit" class="btn '. $this->button_name . $this->sec_class . '"' . $this->parameters . '>' . $this->text . '</button>';
                $p2 = $css_button;
                break;
                
            case 'NOTIFY_ZEN_CSS_BUTTON_BUTTON':
                $this->setVariables($eventID, $p1);
                
                $css_button = '<button type="button" class="btn '. $this->button_name . $this->sec_class . '"' . $this->parameters . '>' . $this->text . '</button>';
                $p2 = $css_button;
                break;
                
            case 'NOTIFY_ZEN_DRAW_INPUT_FIELD':
                $field = $p2;
                if (strpos($field, 'class="') !== false) {
                    $field = str_replace('class="', 'class="form-control ', $field);
                } else {
                    $field = str_replace('<input ', '<input class="form-control" ', $field);
                }
                $p2 = $field;
                break;
                
            case 'NOTIFY_ZEN_DRAW_SELECTION_FIELD':
                $selection = $p2;
                if (strpos($selection, 'class="') !== false) {
                    $selection = str_replace('class="', 'class="custom-control-input ', $selection);
                } else {
                    $selection = str_replace('<input ', '<input class="custom-control-input" ', $selection);
                }
                $p2 = $selection;
                break;
                
            case 'NOTIFY_ZEN_DRAW_TEXTAREA_FIELD':
                $field = $p2;
                if (strpos($field, 'class="') !== false) {
                    $field = str_replace('class="', 'class="form-control ', $field);
                } else {
                    $field = str_replace('<textarea ', '<textarea class="form-control" ', $field);
                }
                $p2 = $field;
                break;
                
            case 'NOTIFY_ZEN_DRAW_PULL_DOWN_MENU':
                $field = $p2;
                if (strpos($field, 'class="') !== false) {
                    $field = str_replace('class="', 'class="custom-select', $field);
                } else {
                    $field = str_replace('<select ', '<select class="custom-select" ', $field);
                }
                $p2 = $field;
                break;
                
            case 'NOTIFY_NOTIFY_ORDER_COUPON_LINK':
                $zc_coupon_link = '<a data-toggle="modal" data-id="'. $p1['coupon_id']. '" href="#couponHelpModal">';
                $p2 = $zc_coupon_link;
                break;

            case 'NOTIFY_MODULES_ADDITIONAL_IMAGES_SCRIPT_LINK':
                if (PRODUCT_INFO_SHOW_BOOTSTRAP_MODAL_POPUPS == 'Yes') {
                    $products_image_large = $p1['products_image_large'];
                    $i = $p1['index'];
                    $link = '<a href="javascript:void(0)" class="imageModal">';
                    $link .= '<img src="' . $products_image_large . '" height="' . SMALL_IMAGE_HEIGHT . '" width="'. SMALL_IMAGE_WIDTH . '" id="' . $i . '">';
                    $link .= '<div class="p-1"></div>';
                    $link .= '<span class="imgLink">' . TEXT_CLICK_TO_ENLARGE . '</span>';
                    $link .= '</a>';
                    
                    $p2 = $link;
                    $p3 = 'class="card p-3 mb-3"';
                }
                break;
                
            default:
                break;
        }
    }
    
    // -----
    // This function creates class variables for each of the elements in the
    // (presumed) associative array received with the notification.
    //
    protected function setVariables($eventID, $updateParms)
    {
        if (!is_array($updateParms)) {
            trigger_error("Unknown read-only parameters received for $eventID: " . json_encode($updateParms), E_USER_ERROR);
        }
        
        foreach ($updateParms as $key => $value) {
            $this->$key = $value;
        }
    }
    
    // -----
    // This function creates the display of a given price in the current currency.  The caller is PRESUMED
    // to have set $this->products_tax_class_id or a PHP error will result.
    //
    protected function displayPrice($value)
    {
        return $GLOBALS['currencies']->display_price($value, zen_get_tax_rate($this->products_tax_class_id));
    }
}
