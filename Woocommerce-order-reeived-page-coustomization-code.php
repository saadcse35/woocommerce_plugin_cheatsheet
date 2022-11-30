//-----------------Customise Order Received Text-----------------//

add_filter('woocommerce_thankyou_order_received_text', 'wc_order_received_text', 10, 2);

function wc_order_received_text($text, $order)
{
    $is_admin = current_user_can('manage_options');

    $user_id = get_current_user_id();

    $customer_id = $order->get_customer_id();

    if ($is_admin && $user_id != $customer_id) {
        $return = __('<h2>Order Verification from Admin</h2>', 'woocommerce');
        return $return;
    }

    else{
        $return = __('Thank you for your order. We will send you a confirmation email with QR Code as soon as your order has been processed.', 'woocommerce');
        return $return;
    }

}






//--------------Add Order Status to Order Received Page-----------------//

add_action('woocommerce_thankyou', 'oqc_print_order_status', 10, 1);

function oqc_print_order_status($order_id)
{

    $is_admin = current_user_can('manage_options');

    if ($is_admin) {

        wp_enqueue_style('oqc_admin_style', plugin_dir_url(__FILE__) . 'assets/css/style.css', array(), time(), 'all');

        $order = wc_get_order($order_id);
        $order_status = $order->get_status();



        if ($order_status == 'completed') {
            echo '<p class="oqc_order oqc_completed">Order Completed</p>';
        } elseif ($order_status == 'cancelled') {
            echo '<p class="oqc_order oqc_cancelled">Order Cancelled</p>';
        } elseif ($order_status == 'failed') {
            echo '<p class="oqc_order oqc_failed">Order Failed</p>';
        } elseif ($order_status == 'refunded') {
            echo '<p class="oqc_order oqc_refunded">Order Refunded</p>';
        } elseif ($order_status == 'pending') {
            echo '<p class="oqc_order oqc_pending">Order Pending</p>';
        } elseif ($order_status == 'on-hold') {
            echo '<p class="oqc_order oqc_hold">Order On Hold</p>';
        } elseif ($order_status == 'processing') {
            echo '<p class="oqc_order oqc_processing">Order Processing</p>';
        } elseif ($order_status == 'checkout-draft') {
            echo '<p class="oqc_order oqc_draft">Order Drafted</p>';
        }
    }

}



//---------Add Custom Button to Order Received Page----------------//

add_action('woocommerce_thankyou', 'oqc_button_for_complete_order', 12, 1);

function oqc_button_for_complete_order($order_id)
{
    $is_admin = current_user_can('manage_options');

    if ($is_admin) {

        $order = wc_get_order($order_id);
        $order_status = $order->get_status();
        if ($order_status == 'processing' || $order_status == 'on-hold' || $order_status == 'pending') {
            ?>
            <div class="oqc_btn_for_order">
                <a href="<?php echo esc_url(wp_nonce_url(add_query_arg(array('confirm_order' => $order_id)), 'woocommerce-confirm-order')); ?>"
                   class="button complete-order oqc_btn oqc_completed_btn"><?php _e('Complete Order', 'woocommerce'); ?></a>


                <a href="<?php echo esc_url(wp_nonce_url(add_query_arg(array('cancel_order' => $order_id)), 'woocommerce-cancel_order')); ?>"
                   class="button cancel-order oqc_btn oqc_cancelled_btn"><?php _e('Cancel Order', 'woocommerce'); ?></a>
            </div>

            <?php

        }
    }

}


//---------------Change Order Status to Completed----------------//

add_action('template_redirect', 'oqc_on_confirm_order_click_complete_order');

function oqc_on_confirm_order_click_complete_order($order_id)
{

    $is_admin = current_user_can('manage_options');

    if (isset($_GET['confirm_order'], $_GET['_wpnonce']) && $is_admin && wp_verify_nonce(wp_unslash($_GET['_wpnonce']), 'woocommerce-confirm-order')) {
        $order = wc_get_order($_GET['confirm_order']);
        $order->update_status('completed', 'Order confirmed by Admin');
    }
}

//-----------------Change Order Status to Cancelled-----------------//

add_action('template_redirect', 'oqc_on_confirm_order_click_cancle_order');

function oqc_on_confirm_order_click_cancle_order($order_id)
{
    $is_admin = current_user_can('manage_options');

    if (isset($_GET['cancel_order'], $_GET['_wpnonce']) && $is_admin && wp_verify_nonce(wp_unslash($_GET['_wpnonce']), 'woocommerce-cancel_order')) {
        $order = wc_get_order($_GET['cancel_order']);
        $order->update_status('cancelled', 'Order Cancelled by Admin');
    }
}





remove_action('woocommerce_order_details_after_order_table', 'woocommerce_order_again_button');


//----------------------Add Shipping & BIlling Address for Admin in thank you page----------------------//

add_action('woocommerce_thankyou', 'oqc_showing_billing_shipping_address_for_admin', 11, 1);

function oqc_showing_billing_shipping_address_for_admin($order_id)
{
    $is_admin = current_user_can('manage_options');

    $user_id = get_current_user_id();

    $order = wc_get_order( $order_id );

    $customer_id = $order->get_customer_id();


    if ($is_admin && $user_id != $customer_id) {
        ?>

        <?php if (!wc_ship_to_billing_address_only() && $order->needs_shipping_address() && get_option('woocommerce_calc_shipping') !== 'no') : ?>

            <div class="col2-set addresses oqc_address_for_admin">

                <div class="col-1 oqc_div_1">

                    <?php endif; ?>

                    <header class="title">
                        <h3><?php _e('Billing Address', 'woocommerce'); ?></h3>
                    </header>
                    <address>
                        <?php
                        if (!$order->get_formatted_billing_address()) _e('N/A', 'woocommerce'); else echo $order->get_formatted_billing_address();

                        if($order->get_billing_phone()) echo '<p class="woocommerce-customer-details--phone">' . esc_html($order->get_billing_phone()) . '</p>';
                        if($order->get_billing_email()) echo '<p class="woocommerce-customer-details--email">' . esc_html($order->get_billing_email()) . '</p>';

                        ?>
                    </address>



                    <?php if (!wc_ship_to_billing_address_only() && $order->needs_shipping_address() && get_option('woocommerce_calc_shipping') !== 'no') : ?>

                </div><!-- /.col-1 -->

                <div class="col-2 oqc_div_2">

                        <header class="title">
                            <h3><?php _e('Shipping Address', 'woocommerce'); ?></h3>
                        </header>
                        <address>
                            <?php
                            if (!$order->get_formatted_shipping_address()) _e('N/A', 'woocommerce'); else echo $order->get_formatted_shipping_address();
                            ?>
                        </address>

                </div><!-- /.col-2 -->

            </div><!-- /.col2-set -->

        <?php endif; ?>

        <div class="clear"></div>

        <?php
    }
}
