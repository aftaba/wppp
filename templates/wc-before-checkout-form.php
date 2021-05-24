<?php
/**
 * WooCommerce before checkout form template.
 *
 * @author     ThemeFusion
 * @copyright  (c) Copyright by ThemeFusion
 * @link       https://theme-fusion.com
 * @package    Avada
 * @subpackage Core
 * @since      5.1.0
 */

global $woocommerce;
?>


<ul class="woocommerce-side-nav woocommerce-checkout-nav">

<?php if( cart_has_goodbox() ): ?>

	<li class="distribution_method" class="is-active"><a data-name="col-a" href="#"><?php esc_attr_e( 'How would you like your Good Box/s distributed?', 'Avada' ); ?></a></li>
	<li><a data-name="col-b" href="#"><?php esc_attr_e( 'Are you buying this box in the name of a friend or a loved one?', 'Avada' ); ?></a></li>
	<li><a data-name="col-c" href="#"><?php esc_attr_e( 'Write a personal message', 'Avada' ); ?></a></li>
	
<?php else: ?>

<?php endif; ?>

	<li class="billing_address"><a data-name="col-1" href="#"><?php esc_attr_e( 'Billing Address', 'Avada' ); ?></a></li>
	<?php if ( WC()->cart->needs_shipping() && ! wc_ship_to_billing_address_only() ) : ?>
		<li class="shipping_address"><a data-name="col-2" href="#"><?php esc_attr_e( 'Shipping Address', 'Avada' ); ?></a></li>
	<?php elseif ( apply_filters( 'woocommerce_enable_order_notes_field', get_option( 'woocommerce_enable_order_comments', 'yes' ) === 'yes' ) ) : ?>
		<?php if ( ! WC()->cart->needs_shipping() || wc_ship_to_billing_address_only() ) : ?>
			<li><a data-name="col-2" href="#"><?php esc_attr_e( 'Additional Information', 'Avada' ); ?></a></li>
		<?php endif; ?>
	<?php endif; ?>

	<li><a data-name="order_review" href="#"><?php esc_html_e( 'Review &amp; Payment', 'Avada' ); ?></a></li>
</ul>

<div class="woocommerce-content-box avada-checkout">
