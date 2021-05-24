<?php
/**
 * Extra files & functions are hooked here.
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package Avada
 * @subpackage Core
 * @since 1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

if ( ! defined( 'AVADA_VERSION' ) ) {
	define( 'AVADA_VERSION', '6.2.3' );
}

if ( ! defined( 'AVADA_MIN_PHP_VER_REQUIRED' ) ) {
	define( 'AVADA_MIN_PHP_VER_REQUIRED', '5.6' );
}

if ( ! defined( 'AVADA_MIN_WP_VER_REQUIRED' ) ) {
	define( 'AVADA_MIN_WP_VER_REQUIRED', '4.7' );
}

// Developer mode.
if ( ! defined( 'AVADA_DEV_MODE' ) ) {
	define( 'AVADA_DEV_MODE', false );
}























/**
 * Compatibility check.
 *
 * Check that the site meets the minimum requirements for the theme before proceeding.
 *
 * @since 6.0
 */
if ( version_compare( $GLOBALS['wp_version'], AVADA_MIN_WP_VER_REQUIRED, '<' ) || version_compare( PHP_VERSION, AVADA_MIN_PHP_VER_REQUIRED, '<' ) ) {
	require_once get_template_directory() . '/includes/bootstrap-compat.php';
	return;
}

/**
 * Bootstrap the theme.
 *
 * @since 6.0
 */
require_once get_template_directory() . '/includes/bootstrap.php';

/* Omit closing PHP tag to avoid "Headers already sent" issues. */

function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'custom-css', get_template_directory_uri() . '/assets/css/custom.css');
}
add_action( 'wp_enqueue_scripts','wpdocs_theme_name_scripts',99);



add_action('custom_wc_checkout_gift','custom_wc_checkout_gift',5);
function custom_wc_checkout_gift(){
	?>
	<style>
		#order_comments_field .optional{display: none;}
		.gift-email-wrap input, .gift-email-wrap textarea {background: transparent !important;border: 1px solid #ddd !important;max-width: 500px;margin-left: 40px;margin-bottom: 20px;}
	</style>
	<div class="woocommerce-billing-fields avada-select">
		<h3 style="border: none;margin-bottom: 0;padding: 0;">Are you buying this box in the name of a friend or a loved one?</h3>
		<p style="border: none;margin-bottom: 0;padding: 0;">This means that you are donating a box to someone in need but on behalf of someone else.</p>
		<p style="border: none;margin-bottom: 0;padding: 0;"><em>E.g: Buying a box in your Mum's name for Mother's Day. If you fill in the gift recipients email and details below, they will receive a certificate of donation.</em></p>
		<div class="gift-wrap radio-group form-row validate-required ">
		 	<div class="woocommerce-input-wrapper">
				<div class="checkboxFive form-row validate-required">
					<input id="is_gift_no" type="radio" name="is_gift" value="no" class="input-radio" checked />
			        <label for="is_gift_no">No</label> 
			    </div>
			    <div class="checkboxFive">
					<input id="is_gift_yes" type="radio" name="is_gift" value="yes" class="input-radio"/>
			        <label for="is_gift_yes">Yes</label>
			    </div>
			 </div>
		</div>
		<div class="" id="show-me" style="display: none;">
			<div class="gift-email-wrap form-row validate-required ">
				<div class="woocommerce-input-wrapper">
					
					<input type="text" name="gift_fullname" id="gift_fullname" required class="input-text" placeholder="Please enter recipient fullname">
					
				</div>
			</div>
			<div class="gift-email-wrap form-row validate-required form-row form-row-wide validate-required validate-email">
				<div class="woocommerce-input-wrapper">
					<input type="email" name="gift_email" id="gift_email" required class="input-text" placeholder="Please enter recipient email" autocomplete="email">
				</div>
			</div>
			<div class="gift-email-wrap form-row  ">
				<div class="woocommerce-input-wrapper">
					<textarea name="gift_certificate" id="gift_certificate" class="input-text" placeholder="Notes for the Gift/Gift Certificate" required></textarea>
				</div>
			</div>
			<div class="gift-email-wrap form-row ">
				<div class="woocommerce-input-wrapper">
					<textarea name="gift_general_note" id="gift_general_note" class="input-text" placeholder="General Notes for the Gift" required></textarea>
				</div>
			</div>
		</div>
	</div>
<?php
}
add_action('custom_wc_checkout_delivery_method','custom_wc_checkout_delivery_method',5);
function custom_wc_checkout_delivery_method(){
	?>
	<h3>How would you like to give your box?</h3>
	<div class="donate_type_group radio-group">
	    <div class="checkboxFive">
			<input id="dt_charity_house" type="radio" name="donate_type" value="charity_house" checked />
	        <label for="dt_charity_house">
		        I would like my Good Box/s delivered to a charity by The Good Box.
		        <div class="tt-box">
		        	<i class="fa fa-info-circle"></i>
		        	<div class="content">
		        		If you select this option your Good Box will be packed by The Good Box team and then sent via freight to one of our many charity partners. We send boxes to charities who need them most at the time. We keep you updated via our newsletter with where your boxes went! You can find a full list of our charity partners on the website.
		        	</div>
		        </div>
		    </label>
	    </div>
		<div class="checkboxFive">
			<input id="dt_directly" type="radio" name="donate_type" value="directly" />
	        <label for="dt_directly">
	        	I would like my Good Box/s delivered to my house/work and I will personally give the box to someone in need.
	        	<div class="tt-box">
	        		<i class="fa fa-info-circle"></i>
	        		<div class="content">
	        			This option means the box will be delivered to YOU. People usually select this option if they see someone sleeping rough (on the street) that they want to personally give the box to and have a great conversation.
	        		</div>
	        	</div>
	        </label> 
	    </div>
	    <!-- <label for="dt_directly"><input id="dt_directly" type="radio" name="donate_type" value="directly" checked /> Donate Directly </label>
		<label for="dt_charity_house"><input id="dt_charity_house" type="radio" name="donate_type" value="charity_house" /> Charity House </label> -->
	</div>
	<p><em>Please ensure you have made the right selection above. We can't change your order once it has been processed</em></p>
	<?php
}
//add_action( 'woocommerce_checkout_billing', 'bbloomer_checkout_radio_choice' );
 
function bbloomer_checkout_radio_choice() {
    
   $chosen = WC()->session->get('radio_chosen');
   $chosen = empty( $chosen ) ? WC()->checkout->get_value('radio_choice') : $chosen;
   $chosen = empty( $chosen ) ? 'no_option' : $chosen;
       
   $args = array(
   'type' => 'radio',
   'required' => true,
   'class' => array( 'form-row-wide' ),
   'options' => array(
      /*'no_option' => 'No Option',*/
      'option_1' => 'Option 1 ($10)',
      'option_2' => 'Option 2 ($30)',
   ),
   'default' => $chosen
   );
    
   echo '<div id="checkout-radio">';
   echo '<h3>Customize Your Order!</h3>';
   woocommerce_form_field( 'radio_choice', $args, $chosen );
   echo '</div>';
    
}
function cart_has_merch(){
	global $woocommerce;
	$cat_check = false;
	$cart = $woocommerce->cart->get_cart();
	foreach ( $cart as $cart_key => $cart_item ) {
		$product = wc_get_product( $cart_item['data']->get_id() );
		if ( has_term( 'merchandise', 'product_cat', $product->get_id() ) ) {
			$cat_check = true;
			break; // break because we only need one "true" to matter here
		}
	}
	return $cat_check;
}
function cart_has_goodbox(){
	global $woocommerce;
	$cat_check = false;
	$cart = $woocommerce->cart->get_cart();
	foreach ( $cart as $cart_key => $cart_item ) {
		$product = wc_get_product( $cart_item['data']->get_id() );
		if ( has_term( 'the-good-boxes', 'product_cat', $product->get_id() ) ) {
			$cat_check = true;
			break; // break because we only need one "true" to matter here
		}
	}
	return $cat_check;
}
function customize_show_coupon_js() {
	wc_enqueue_js( '
	    if('.(cart_has_goodbox() ? 'true' : 'false') .'){
	   	 	jQuery(".woocommerce-side-nav .distribution_method a").click();
	    }else{
	    	jQuery(".woocommerce-side-nav .billing_address a").click();
	    }
		check_shipping();
		$(".donate_type_group input").on("change",function(){
			check_shipping();
		});
		function check_shipping(){
			var cart_has_merch = '.(cart_has_merch() ? 'true' : 'false') .';
			if(cart_has_merch){
				$(".woocommerce-checkout-nav .shipping_address").removeClass("disabled");
			}else{
				$(".woocommerce-checkout-nav .shipping_address").addClass("disabled");
				$(".col-1 .continue-checkout").attr("data-name","col-2");
				var dt = $(".donate_type_group input:checked").val();
				if(dt == "directly"){
					$(".woocommerce-checkout-nav .shipping_address").removeClass("disabled");
					$(".col-1 .continue-checkout").attr("data-name","col-2");
				}else{
					$(".col-1 .continue-checkout").attr("data-name","order_review");
					$(".woocommerce-checkout-nav .shipping_address").addClass("disabled");
				}
			}
		}
	');
}
add_action( 'woocommerce_before_checkout_form', 'customize_show_coupon_js' );
function customize_gift_js() {
	wc_enqueue_js( '
		jQuery("input[name=is_gift]").click(function () {
		    jQuery("#show-me").css("display", (jQuery(this).val() === "yes") ? "block":"none");
		    jQuery("#hide-me").css("display", (jQuery(this).val() === "yes") ? "none":"block");
		});
		
	');
}
add_action( 'woocommerce_checkout_order_review', 'custom_checkout_review_message', 1 );
function custom_checkout_review_message(){
?>
<style>
#order_review{
	position: relative;
	padding-right:340px;
}
.checkout_panel{
	display:block;
	position: absolute;
	right:0;
	top:0;
	width:300px;
	font-size:12px;
	padding-left:2rem;
	border-left:2px solid whiteSmoke;
}
@media only screen and (max-width: 860px){
	#order_review{
		padding-right:0;
	}
	.checkout_panel{
		position: relative;
		width:auto;
		padding:0 0 1rem;
		margin:0 auto 2rem;
		border:0;
		border-bottom:2px solid whiteSmoke;
	}
}


.checkout_panel .alert{
	font-size:12px;
	background:#f5f1d0;
	box-shadow:0 3px 4px -2px rgba(0,0,0,0.16);
}
.checkout_panel .box{
	padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
	font-size:12px;
	border:1px solid whiteSmoke;
	box-shadow:0 3px 4px -2px rgba(0,0,0,0.16);
}

.change-info{
	display: block;
	margin:0 !important;
	text-align: center;
	font-size:10px;
	font-weight:bold;
}
.change-info span{
	color:#060175;
}
.change-info span:hover{
	text-decoration: underline;
	cursor: pointer;
}
</style>
<div class='checkout_panel'>

	<div class='alert'>
		<p>Please check your order carefully as we can't make any changes once you have made your order.</p>
	</div>

	<div class='alert'>
		<p>If you are choosing a box to go to a charity but also buying merch, please be aware the merch will be delivered to your shipping address but the box will go to our charity partners.</p>
	</div>




	<div id="is_direct_order">

		<?php if(cart_has_goodbox()): ?>
			<div class="box">
				<p>I would like my Good Box/s delivered to my house/work and I will personally give the box to someone in need.</p>
				<p class="change-info"><small><span class="gotostep-distribution">Change distribution method</span></small></p>
			</div>
		<?php endif; ?>

		<div class="box">
			<strong>Shipping Information</strong>
			<p id="shipping_info_data">None supplied</p>
			<p class="change-info"><small>Not correct? <span class="gotostep-shipping">Change Shipping Information</span></small></p>
		</div>

		<?php if(cart_has_goodbox()): ?>
			<div class='alert'>
				<p>Good Boxes take 3-4 weeks to arrive, and may take a little longer due to COVID-19</p>
			</div>
		<?php endif; ?>
	</div>

	<?php if(cart_has_goodbox()): ?>
	<div class="box" id="is_not_direct_order">
			<p>I would like my Good Box/s delivered to a charity by The Good Box.</p>
			<p class="change-info"><small><span class="gotostep-distribution">Change distribution method</span></small></p>
		</div>
	<?php endif; ?>

</div>
<script>
	function getBillingAddress(){
		var txt = '';
		txt += jQuery("#billing_first_name").val() + ' ';
		txt += jQuery("#billing_last_name").val() + '<br/>';
		txt += jQuery("#billing_address_1").val() + '<br/>';
		txt += jQuery("#billing_address_2").val() + '<br/>';
		txt += jQuery("#billing_city").val() + ' ';
		txt += jQuery("#billing_state").val() + ' ';
		txt += jQuery("#billing_postcode").val() + ' ';
		txt += jQuery("#billing_country").val() + '<br/>';
		txt += jQuery("#billing_phone").val() + '<br/>';
		txt += jQuery("#billing_email").val() + '<br/>';
		txt += jQuery("#billing_company").val();

		return txt;
	}
	function getShippingAddress(){
		var txt = '';
		txt += jQuery("#shipping_first_name").val() + ' ';
		txt += jQuery("#shipping_last_name").val() + '<br/>';
		txt += jQuery("#shipping_address_1").val() + '<br/>';
		txt += jQuery("#shipping_address_2").val() + '<br/>';
		txt += jQuery("#shipping_city").val() + ' ';
		txt += jQuery("#shipping_state").val() + ' ';
		txt += jQuery("#shipping_postcode").val() + ' ';
		txt += jQuery("#shipping_country").val();

		return txt;
	}
	function updateShippingText(){
		var dt = jQuery(".donate_type_group input:checked").val();

		jQuery("#is_direct_order").hide();
		jQuery("#is_not_direct_order").hide();
		if(dt == "directly") jQuery("#is_direct_order").show();
		if(dt != "directly") jQuery("#is_not_direct_order").show();

		var shipToDifferentAddress = jQuery('#ship-to-different-address-checkbox').prop('checked');
		var txt = 'None supplied';
		if( shipToDifferentAddress ){
			txt = getShippingAddress();
		}else{
			txt = "<b>Same as Billing</b><br/>"+getBillingAddress();
		}
		jQuery('#shipping_info_data').html(txt);
	}
	jQuery(function($){
		// just cos
		jQuery('*').change(function(){
			updateShippingText();
		});

		// hack job
		jQuery(".gotostep-shipping").click(function(){
			jQuery(".woocommerce-side-nav .shipping_address a").click();
		});
		jQuery(".gotostep-distribution").click(function(){
			jQuery(".woocommerce-side-nav .distribution_method a").click();
		});
	});
</script>
<?php
}

add_action( 'wp_footer', 'misha_checkout_js' );
function misha_checkout_js(){
 
	// we need it only on our checkout page
	if( !is_checkout() ) return;
 
	?>
	<script>
	setTimeout(function(){ donateTypeAddress(); }, 3000);
	function donateTypeAddress(){
		var d_type = jQuery('[name=donate_type]:checked').val();
		//console.log(d_type + "Hello");
		if(d_type == 'charity_house'){
			//console.log( "ener");
			/*jQuery('#billing_address_1_field').hide();
			jQuery('#billing_address_2_field').hide();
			jQuery('#billing_city_field').hide();
			jQuery('#billing_postcode_field').hide();*/
			//console.log(jQuery('#billing_address_1_field').text());
		}
	}
	jQuery(function($){
		/*jQuery('.continue-checkout').click(function(){
			if(jQuery('input[name="is_gift"]').is(":visible")){
				//console.log('hello');
				if (jQuery('input[name="is_gift"]:checked').length == 0) {
					//console.log('false');
		          	return false;
		        }
			}
			if(jQuery('#gift_email').is(":visible")){
				var email = jQuery('#gift_email').val();
				if(email== ''){
					//console.log('false1');
		          	return false;
		        }
		        if(IsEmail(email)==false){
		        	//console.log('false2');
		          	return false;
		        }
			}

		});*/
		
		jQuery('[name=donate_type]').click(function(){
			/*var d_type = jQuery(this).val();
			if(d_type == 'charity_house'){
				jQuery('.woocommerce-billing-fields.billing-title > h3').html('Your details');
				jQuery('#billing_address_1_field, #billing_address_2_field, #billing_city_field, #billing_postcode_field, #billing_company_field').hide();
			}else{
				jQuery('.woocommerce-billing-fields.billing-title > h3').html('Billing details');
				jQuery('#billing_address_1_field, #billing_address_2_field, #billing_city_field, #billing_postcode_field, #billing_company_field').show();
			}*/
		});
	});
	function IsEmail(email) {
	  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  if(!regex.test(email)) {
	    return false;
	  }else{
	    return true;
	  }
	}
	</script>
	<?php
}
add_action( 'woocommerce_before_checkout_form', 'customize_gift_js' );
add_filter('woocommerce_enable_order_notes_field', 'enable_order_notes_field',10,1);
function enable_order_notes_field($status){
	return 'yes';
}

add_filter( 'woocommerce_checkout_fields', 'misha_no_phone_validation' );
 
function misha_no_phone_validation( $woo_checkout_fields_array ) {
	$woo_checkout_fields_array['billing']['billing_company'] = array(
		'type' 			=> 'text',
        'class'         => array('company-field-class form-row-wide'),
        'label'         => __('Company'),
        'placeholder'   => __('Company')
    );
	$woo_checkout_fields_array['billing']['billing_phone']['required'] = true;
	return $woo_checkout_fields_array;
}

add_filter( 'woocommerce_checkout_fields' , 'theme_override_checkout_notes_fields' );
function theme_override_checkout_notes_fields( $fields ) {
	$fields['order']['order_comments']['label'] = '';
	$fields['order']['order_comments']['placeholder'] = ' ';
	/* remove order notes */
	//unset($fields['order']['order_comments']);
	return $fields;
}
function order_note_title($title){
	$title = __('Please write a personal message for the person receiving your Good Box.<br/>We will handwrite it for you!');
	return $title;
}
add_action('wp_footer','custom_functions_woo');
function custom_functions_woo(){
	?>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
<style type="text/css">
.fusion-button-wrapper{
	margin-top:1rem;
}
.fusion-logo{
	max-width:150px;
}
@media only screen and (max-width: 640px){
	.fusion-logo{
		max-width:70px;
	}
}
body .fusion-layout-column .fusion-column-content-centered .fusion-column-content{
	display: grid;
	grid-template-columns: repeat(2, 1fr);
	grid-template-rows: repeat(2, 1fr);
	grid-column-gap: 0px;
	grid-row-gap: 0px;
}
@media only screen and (max-width: 640px){
	body .fusion-layout-column .fusion-column-content-centered .fusion-column-content{
		display: block;
	}
	body .fusion-layout-column{ margin-bottom:4rem !important; }
}
body .fusion-layout-column .fusion-column-content-centered .fusion-column-content
>div:nth-child(1){ grid-area: 1 / 1 / 2 / 2; }
body .fusion-layout-column .fusion-column-content-centered .fusion-column-content
>div:nth-child(2){ grid-area: 2 / 1 / 3 / 2; }
body .fusion-layout-column .fusion-column-content-centered .fusion-column-content
>div:nth-child(3),
body .fusion-layout-column .fusion-column-content-centered .fusion-column-content
>span:nth-child(3){ grid-area: 1 / 2 / 3 / 3; }
body .fusion-layout-column .fusion-column-content-centered .fusion-column-content
>div:nth-child(4){ grid-area: 3 / 1 / 4 / 3; }
body .fusion-layout-column .fusion-column-content-centered .fusion-column-content
>div:nth-child(5){ grid-area: 4 / 1 / 5 / 3; }
body .fusion-layout-column .fusion-column-content-centered .fusion-column-content
>div:nth-child(7){ grid-area: 5 / 1 / 6 / 3; }

		body .woocommerce-products-header .fusion-column-wrapper.fusion-column-has-shadow{
			background:#ffffff !important;
			border:1px solid whiteSmoke !important;
			border-radius:3px !important;
			box-shadow:0 1rem 1rem -0.25rem rgba(0,0,0,0.1) !important;
			overflow: hidden;
			padding: 0 !important;
		}

		.fusion-image-carousel{ margin:0; }
		.fusion-carousel .fusion-carousel-wrapper{ padding:0; }
		.fusion-carousel .fusion-carousel-item .fusion-carousel-item-wrapper,
		.fusion-carousel .fusion-carousel-item img{ display: block; }
		.fusion-body .fusion-carousel .fusion-carousel-nav .fusion-nav-next, .fusion-body .fusion-carousel .fusion-carousel-nav .fusion-nav-prev{
			height:40px;
			margin-top:calc((40px)/ -2);
			border-radius:100px;
		}
		.fusion-body .fusion-carousel .fusion-carousel-nav .fusion-nav-next:before, .fusion-body .fusion-carousel .fusion-carousel-nav .fusion-nav-prev:before{ line-height: 40px; }
		.fusion-text{ padding: 1rem 1rem 0; }
		body .fusion-accordian .fusion-panel.fusion-toggle-no-divider.fusion-toggle-boxed-mode{
			margin:0 auto;
			border:0 !important;
		}
		body .woocommerce-products-header .fusion-column-wrapper.fusion-column-has-shadow .panel-default.fusion-toggle-boxed-mode{
			color:#ffffff !important;
			background:#a37eb7 !important;
		}
		body .fusion-accordian .panel-title a:hover,
		body .fusion-toggle-boxed-mode:hover .panel-title a{
			color:inherit !important;
		}
		body .fusion-accordian .panel-title .active i.fa-fusion-box,
		body .fusion-accordian .panel-title a:hover i.fa-fusion-box,
		body .fusion-accordian .panel-title a:hover i.fa-fusion-box[style],
		body .woocommerce-products-header .fusion-column-wrapper.fusion-column-has-shadow .panel-default.fusion-toggle-boxed-mode .fa-fusion-box{
			background-color: #ffffff !important;
			color:#333333 !important;
		}
		body .woocommerce-products-header .fusion-column-wrapper.fusion-column-has-shadow .panel-default.fusion-toggle-boxed-mode *{
			color:#ffffff !important;
		}
		body .woocommerce-products-header .fusion-column-wrapper.fusion-column-has-shadow .panel-default.fusion-toggle-boxed-mode:first-child{
			background:#080a73 !important;
		}
		.addtocartbtn{
			display: block;
			width:auto;
			margin:0 1rem;
			color:#ffffff;
			background-color: #a37eb7;
		}
		.tt-box{
			display: inline-block;
			position: relative;
			margin-left: 4px;
			color:#060175;
		}
		.tt-box:hover .content{
			display: block;
		}
		.tt-box .content{
			z-index: 99;
			display: none;
			position: absolute;
			top:30px;
			left: 0;
			padding:12px 20px;
			border-radius:6px;
			font-size:10px;
			line-height:1.6;
			color:white;
			background:rgba(0,0,0,0.8);
			width: 340px;
 			transform: translate(-50%, 0);
		}
		.tt-box .content:before{
			content: '';
			position: absolute;
			bottom:100%;
			left:50%;
			width: 0;
			height: 0;
			border-style: solid;
			border-width: 0 5px 5px 5px;
			border-color: transparent transparent rgba(0,0,0,0.8) transparent;
		}
		.fusion-menu-cart .fusion-menu-cart-items {font-size: 14px; }
		#order_review .woocommerce-additional-fields h3{
			margin-bottom: 0;
		}
		#order_review .optional,
		.wc-proceed-to-checkout .fusion-update-cart{
			display: none;
		}
		.checkboxFive {margin: 20px 0; position: relative; line-height: 25px; vertical-align: middle; padding: 0 20px; } 
		.checkboxFive label:before {cursor: pointer; content: ''; position: absolute; width: 25px; height: 25px; top: 0; left: 0; background: #eee; border:1px solid #ddd; }
		.checkboxFive label:after {opacity: 0; content: ''; position: absolute; width: 13px; height: 5px; background: transparent; top: 8px; left: 6px; border: 3px solid #060175; border-top: none; border-right: none; transform: rotate(-45deg); }
		/*.checkboxFive label:hover::after {opacity: 0.5; }*/
		.checkboxFive input[type=checkbox],
		.checkboxFive input[type=radio]{opacity: 0; }
		.checkboxFive input[type=checkbox]:checked + label:after,
		.checkboxFive input[type=radio]:checked + label:after {opacity: 1; }
		#processing_fee_wrap label {
			font-size: 15px;
			line-height: 18px;
			font-weight: 600;
			color: red;
			margin-left: 21px;
			display: inline-block;
			width: 80%;
		}
		.avada-myaccount-user{
			display: none !important;
		}
		.woocommerce-checkout-nav{
			display: block;
			text-align: center;
			float:none;
			width:auto;
		}
		.woocommerce-checkout-nav li{
			display: inline-block;
			vertical-align: top;
			margin:0;
			width:16%;
		}
		.woocommerce-checkout-nav li.disabled{
			pointer-events: none;
			opacity: 0.2;
		}
		.woocommerce-checkout-nav li.disabled:before{
		}
		.woocommerce-checkout-nav li a{
			display: block;
			padding:0.5rem;
			margin:0;
			border-bottom:0;
			font-size:10px;
			font-weight: 500;
		}
		.woocommerce-checkout-nav li.is-active a{
		}
		.woocommerce-checkout-nav li.is-active a:before{
			color:white;
			background:#060175;
		}
		.woocommerce-checkout-nav li a:before{
			display: flex;
			margin:0 auto 1rem;
			justify-content: center;
			align-items: center;
			font-size:2rem;
			font-weight:bold;
			color:#060175;
			background-color:#ebebfb;
			border-radius:100%;
			width:2em;
			height:2em;
		}
		.woocommerce-checkout-nav li a:after{
			display: none;
			position: relative !important;
		}
		.woocommerce-checkout-nav li:nth-child(1) a:before{ content:'1'; }
		.woocommerce-checkout-nav li:nth-child(2) a:before{ content:'2'; }
		.woocommerce-checkout-nav li:nth-child(3) a:before{ content:'3'; }
		.woocommerce-checkout-nav li:nth-child(4) a:before{ content:'4'; }
		.woocommerce-checkout-nav li:nth-child(5) a:before{ content:'5'; }
		.woocommerce-checkout-nav li:nth-child(6) a:before{ content:'6'; }
		.woocommerce-content-box.avada-checkout{
			width:auto;
			margin:1rem auto 0;
		}
		@media only screen and (max-width: 640px){
			.woocommerce-checkout-nav li{
				display: block;
				width:100%;
				text-align: left;
			}
			.woocommerce-checkout-nav li a:before{
				display: inline-flex;
				margin:0 1rem 0 0;
				font-size:1rem;
			}
		}
	</style>
	<?php
	
	if (is_woocommerce() && (is_archive() || is_single()) || is_page(2584)) {
		add_thickbox();
		$cart_url = wc_get_cart_url();

		?>
		<style type="text/css">
			#order_review .optional,
			#processing_fee_wrap .optional{display: none;}
			.single_add_to_cart_button.loading{pointer-events: none; position: relative; }
			.single_add_to_cart_button.loading:after{width: 40px; height: 40px; content: ''; position: absolute; left: 100%; top: 0; background: url('<?php echo get_stylesheet_directory_uri();?>/assets/images/ajax-loader.gif') center no-repeat; display: inline-block; }
			.ua-mobile .modal-open{width: 100%;}
			#TB_title{display: none;}
			#TB_overlay{opacity: 0.2 !important;}
			#TB_window {width: 800px !important; top: 60% !important; margin-left: auto !important; left: 0 !important; margin-right: auto !important; right: 0; background: rgba(0,0,0,0.7) !important; text-align: center !important; }
			#TB_ajaxContent{text-align: center !important; color: #ffffff !important; height: auto !important; padding: 50px 20px 30px !important; width: 100% !important; }
			#TB_ajaxContent .button-group a.button-white{margin:0 15px 10px; color: #060175; font-weight: bold; background: #ffffff; }
			@media only screen and (max-width: 1169px){
				#TB_window {width: 88% !important; }
			}
			@media only screen and (max-width: 800px){
				#TB_window h4{font-size: 12px !important; }
				#TB_ajaxContent .button-group a.button-white{font-size: 12px !important; }
			}
		</style>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
			    $('body').on('added_to_cart',function(e,data) {
			        //alert('Added ' + data['div.widget_shopping_cart_content']);
			        if ($('#hidden_cart').length == 0) {
			        	$(this).append('<a href="#TB_inline?inlineId=hidden_cart" id="show_hidden_cart" title="<h2>Cart</h2>" class="thickbox" style="display:none"></a>');
			        	var popup_content = '<div id="hidden_cart" style="display:none">'+
			        	'<h4 data-fontsize="15">YOUR ITEM HAS BEEN ADDED TO CART! <br> DO YOU WANT TO PROCEED TO CHECKOUT OR CONTINUE SHOPPING?</h4>'+'<div class="button-group"><a class="fusion-button button-white button-default fusion-button-default-size button" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">Continue Shopping</a><a class="fusion-button button-white button-default fusion-button-default-size button" href="<?php echo $cart_url; ?>">Checkout Now</a></div></div>';
			            $(this).append(popup_content);
			        }
			        $('#show_hidden_cart').click();
			    });
				$( document ).on( 'click', '.single_add_to_cart_button', function(e) {
					e.preventDefault();
					var $thisbutton = $(this),
		                $form = $thisbutton.closest('form.cart'),
		                id = $thisbutton.val(),
		                product_qty = $form.find('input[name=quantity]').val() || 1,
		                product_id = $form.find('input[name=product_id]').val() || id,
		                variation_id = $form.find('input[name=variation_id]').val() || 0;
			 
			        var data = {
			            action: 'woocommerce_ajax_add_to_cart',
			            product_id: product_id,
			            product_sku: '',
			            quantity: product_qty,
			            variation_id: variation_id,
			        };
			        $(document.body).trigger('adding_to_cart', [$thisbutton, data]);
			 
			        $.ajax({
			            type: 'post',
			            url: wc_add_to_cart_params.ajax_url,
			            data: data,
			            beforeSend: function (response) {
			                $thisbutton.removeClass('added').addClass('loading');
			            },
			            complete: function (response) {
			                $thisbutton.addClass('added').removeClass('loading');
			            },
			            success: function (response) {
			 
			                if (response.error & response.product_url) {
			                    window.location = response.product_url;
			                    return;
			                } else {
			                    $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisbutton]);
			                }
			            },
			        });
			 		$('#show_hidden_cart').click();
			        return false;
				});
			});
		</script>
		<?php    
	}
}

add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');       
function woocommerce_ajax_add_to_cart() {

    $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
    $variation_id = absint($_POST['variation_id']);
    $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $product_status = get_post_status($product_id);

    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

        do_action('woocommerce_ajax_added_to_cart', $product_id);

        if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
            wc_add_to_cart_message(array($product_id => $quantity), true);
        }

        WC_AJAX :: get_refreshed_fragments();
    } else {

        $data = array(
            'error' => true,
            'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));

        echo wp_send_json($data);
    }

    wp_die();
}

// Part 1 
// Display Radio Buttons
// Uses woocommerce_form_field()
 
add_action( 'woocommerce_before_cart_totals', 'bbloomer_checkout_processing_fee' );
function bbloomer_checkout_processing_fee() {
    $chosen = WC()->session->get('chk_processing_fee');
    
    $chosen = empty( $chosen ) ? WC()->checkout->get_value('processing_fee') : $chosen;
    $chosen = empty( $chosen ) ? '0' : $chosen;
    ?>
    <div class="checkboxFive" id="processing_fee_wrap">
		<input id="processing_fee" type="checkbox" name="processing_fee" value="1" <?php echo (WC()->session->get('chk_processing_fee'))?'checked':0; ?> />
        <label for="processing_fee"> Credit card processing fee is automatically added but if you do not wish to help with this fee please remove it.</label> 
    </div>

    <?php 
}
 
// Part 2 
// Add Fee and Calculate Total
// Based on session's "chk_processing_fee"
 
#2 Calculate New Total
add_action( 'woocommerce_cart_calculate_fees', 'bbloomer_checkout_processing_fee_fee', 20, 1 );
function bbloomer_checkout_processing_fee_fee( $cart ) {
	if ( is_admin() && ! defined( 'DOING_AJAX' ) ) return;
	$radio = WC()->session->get( 'chk_processing_fee' );
	if ( "1" == $radio ) {
		 // The percetage
		$percent = 2.99; // 15%
		// The cart total
		$cart_total = $cart->cart_contents_total; 

		// The conditional Calculation
		$fee = $cart_total * $percent / 100;
		$cart->add_fee( __('Processing Fee', 'woocommerce'), $fee );
	}else{
		WC()->session->__unset( 'chk_processing_fee' );
	}
}
 
// Part 3 
// Refresh Checkout if Radio Changes
// Uses jQuery
add_action( 'wp_footer', 'bbloomer_checkout_processing_fee_refresh' );
function bbloomer_checkout_processing_fee_refresh() {
	if ( ! is_cart() ) return;
    ?>
    <script type="text/javascript">
    jQuery( function($){
        $('body').on('change', 'input[name=processing_fee]', function(e){
            e.preventDefault();
            set_processing_session();
           
        });
    });
    function set_processing_session(){
    	var p = 0;
        if(jQuery('input[name=processing_fee]').is(":checked")){
        	p = jQuery('input[name=processing_fee]').val();
        }
		jQuery.ajax({
            type: 'POST',
            url: '<?php echo admin_url("admin-ajax.php");?>',
            data: {
                'action': 'woo_get_ajax_data',
                'radio': p,
            },
            success: function (result) {
            	jQuery("[name='update_cart']").attr('disabled',false).trigger("click").attr('disabled',true); 
            }
        });
    }
    </script>
    <?php
}
 
// Part 4 
// Add Radio Choice to Session
// Uses Ajax
add_action( 'wp_ajax_woo_get_ajax_data', 'bbloomer_checkout_processing_fee_set_session' );
add_action( 'wp_ajax_nopriv_woo_get_ajax_data', 'bbloomer_checkout_processing_fee_set_session' );
function bbloomer_checkout_processing_fee_set_session() {
    if ( isset($_POST['radio']) ){
        $radio = sanitize_key( $_POST['radio'] );
        if($radio == '1'){
        	WC()->session->set('chk_processing_fee', $radio );
        }else{
        	WC()->session->__unset( 'chk_processing_fee' );
        }
        echo json_encode( $radio );
    }
    die();
}

add_action( 'wp_footer', 'cart_update_qty_script' );
function cart_update_qty_script() {
    if (is_cart()) :
        ?>
        <script type="text/javascript">
        	<?php if(!WC()->session->__isset('chk_processing_fee')){  ?>
        		jQuery("#processing_fee_wrap > input").prop('checked', true);
        		set_processing_session();
        		<?php //WC()->session->set('chk_processing_fee',1); ?>
        	<?php } ?>
        	jQuery('div.woocommerce').on( 'change', '.qty', function(){
                jQuery("[name='update_cart']").trigger('click');
            });
            jQuery("body").on("click", "div.woocommerce .quantity .plus,div.woocommerce .quantity .minus", function(e) {
                jQuery("[name='update_cart']").trigger("click"); 
            });
        </script>
        <?php
    endif;
}
add_action('woocommerce_checkout_update_order_meta', 'before_checkout_create_order', 20, 2);
function before_checkout_create_order( $order_id ) {
	if (!empty($_POST['donate_type'])) {
		update_post_meta($order_id, 'donate_type',sanitize_text_field($_POST['donate_type']));
	}
	if (!empty($_POST['is_gift'])) {
		update_post_meta($order_id, 'is_gift',sanitize_text_field($_POST['is_gift']));
	}
	if (!empty($_POST['gift_email'])) {
		update_post_meta($order_id, 'gift_email',sanitize_text_field($_POST['gift_email']));
	}
	if (!empty($_POST['gift_fullname'])) {
		update_post_meta($order_id, 'gift_fullname',sanitize_text_field($_POST['gift_fullname']));
	}
	if (!empty($_POST['gift_certificate'])) {
		update_post_meta($order_id, 'gift_certificate',sanitize_text_field($_POST['gift_certificate']));
	}
	if (!empty($_POST['gift_general_note'])) {
		update_post_meta($order_id, 'gift_general_note',sanitize_text_field($_POST['gift_general_note']));
	}
}
/**
 * Display field value on the order edit page
 */
/*
add_action( 'woocommerce_thankyou', 'mycustom_view_order_and_thankyou_page', 20 );
add_action( 'woocommerce_view_order', 'mycustom_view_order_and_thankyou_page', 20 );
 
function mycustom_view_order_and_thankyou_page( $order_id ){  ?>
    <table class="woocommerce-table shop_table gift_info">
        <tbody>
            <tr>
                <th><strong>Donation Type</strong></th>
                <td><?php echo get_post_meta( $order_id, 'donate_type', true ); ?></td>
            </tr>
            
        </tbody>
    </table>
<?php }*/

add_action( 'woocommerce_admin_order_data_after_order_details', 'misha_editable_order_meta_general' );
 
function misha_editable_order_meta_general( $order ){  ?>
	<br class="clear" />
	<?php   
		$donate_type = get_post_meta( $order->id, 'donate_type', true );
	?>
		<br class="clear" />
	    <h3>Donation Type</h3>
        <p class="">
            <label for="dt_directly">
				<input id="dt_directly" type="radio" name="donate_type" value="directly" <?php echo $donate_type == 'directly' ? 'checked': '' ; ?> />
				Deliver box to my house or work and give it directly
            </label>
            <br>
            <label for="dt_charity_house">
				<input id="dt_charity_house" type="radio" name="donate_type" value="charity_house" <?php echo $donate_type == 'charity_house' ? 'checked': '' ; ?> />
                Please donate my box to a Good Box charity partner to distribute
            </label>
        </p>
	<?php
		if($donate_type):
		endif;
	?>
	<br class="clear" />
    <h3>Gift Details</h3>
	<?php 
		$is_gift = get_post_meta( $order->id, 'is_gift', true );
		$gift_email = get_post_meta( $order->id, 'gift_email', true );
		$gift_fullname = get_post_meta( $order->id, 'gift_fullname', true );
		$gift_certificate = get_post_meta( $order->id, 'gift_certificate', true );
		$gift_general_note = get_post_meta( $order->id, 'gift_general_note', true );

	/*<label for="dt_is_gift">
		<input id="dt_is_gift" type="checkbox" name="is_gift" value="yes" <?php echo $is_gift == 'yes' ? 'checked': '' ; ?> />
        This is a gift
    </label>*/

		if($is_gift != 'yes'):
			echo '<p>This is not a gift</p>';
		else:
			echo '<p><strong>This is a gift</strong></p>';
	?>

		<?php if(isset($gift_email)) { ?>
			<p><strong style="color: #ff0000;">Receipient Email: <?php echo $gift_email; ?></strong> </p>
		<?php } ?>

		<?php if(isset($gift_fullname)) { ?>
			<p><strong style="color: #ff0000;">Receipient Full Name: <?php echo $gift_fullname; ?></strong> </p>
		<?php } ?>

		<?php if(isset($gift_certificate)) { ?>
			<p><strong style="color: #ff0000;">Notes for the Gift/Gift Certificate: <?php echo $gift_certificate; ?></strong> </p>
		<?php } ?>

		<?php if(isset($gift_general_note)) { ?>
			<p><strong style="color: #ff0000;">General Notes for the Gift: <?php echo $gift_general_note; ?></strong> </p>
		<?php } ?>
		
	<?php
	endif;
}

add_filter('woocommerce_update_order', 'custom_woocommerce_order_update');
function custom_woocommerce_order_update( $id ){
	$order = wc_get_order( $id );
	if(! $order) return;

	$donate_type = isset( $_POST['donate_type'] ) ? sanitize_text_field( $_POST['donate_type'] ) : false;
	if(! $donate_type) return;

//	$order->get_meta( 'donate_type', true );
	update_post_meta( $id, 'donate_type', $donate_type  );
//	die();
}

add_filter( 'woocommerce_email_order_meta_fields', 'custom_woocommerce_email_order_meta_fields', 10, 3 );
function custom_woocommerce_email_order_meta_fields( $fields, $sent_to_admin, $order ) {
	$donate_type = $order->get_meta( 'donate_type', true );
	if($donate_type){
		if($donate_type == 'charity_house'){
			$donate_type = 'I will Donate the box through a Charity House.';
		}
		else if ($donate_type == 'directly') {
			$donate_type = 'I will Donate the box myself.';
		}
	}
    $fields['donate_type'] = array(
        'label' => __( 'Donate Type' ),
        'value' => $donate_type,
    );

    $is_gift = $order->get_meta( 'is_gift', true );
    $gift_email = $order->get_meta( 'gift_email', true );
    $gift_fullname = $order->get_meta( 'gift_fullname', true );
    $gift_certificate = $order->get_meta( 'gift_certificate', true );
    $gift_general_note = $order->get_meta( 'gift_general_note', true );
    $fields['is_gift'] = array(
        'label' => __( 'Is this a gift?' ),
        'value' => $is_gift,
    );
    if(isset($gift_email) && $is_gift == 'yes'){
    	$fields['gift_email'] = array(
	        'label' => __( 'Receipient Email' ),
	        'value' => $gift_email,
	    );
    }
    if(isset($gift_fullname) && $is_gift == 'yes'){
    	$fields['gift_fullname'] = array(
	        'label' => __( 'Receipient Full Name' ),
	        'value' => $gift_fullname,
	    );
    }
    if(isset($gift_certificate) && $is_gift == 'yes'){
    	$fields['gift_certificate'] = array(
	        'label' => __( 'Notes for the Gift/Gift Certificate' ),
	        'value' => $gift_certificate,
	    );
    }
    if(isset($gift_general_note) && $is_gift == 'yes'){
    	$fields['gift_general_note'] = array(
	        'label' => __( 'General Notes for the Gift' ),
	        'value' => $gift_general_note,
	    );
    }

    return $fields;
}

// Disable required 
add_filter( 'woocommerce_default_address_fields' , 'custom_override_default_address_fields' );
function custom_override_default_address_fields( $address_fields ) {
	$address_fields['city']['required'] = false;
	$address_fields['postcode']['required'] = false;
     $address_fields['address_1']['required'] = false;
     return $address_fields;
}

