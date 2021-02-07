<?php

if(!class_exists('WCFMmp')) return;

add_action( 'wcfmmp_before_store', 'woocommerce_breadcrumb' );


if(! function_exists( 'urna_tbay_wcfm_addclass_sidebar_right' ) ) {
    function urna_tbay_wcfm_addclass_sidebar_right() {
        global $WCFMmp;

    	$store_sidebar_pos = isset( $WCFMmp->wcfmmp_marketplace_options['store_sidebar_pos'] ) ? $WCFMmp->wcfmmp_marketplace_options['store_sidebar_pos'] : 'left';

		if( $WCFMmp->wcfmmp_vendor->is_store_sidebar() && ($store_sidebar_pos != 'left' ) ) {
			return 'wcfm-right';
		}
    }
    add_filter( 'wcfm_store_wrapper_class', 'urna_tbay_wcfm_addclass_sidebar_right', 10, 2 );
    add_filter( 'wcfm_store_lists_wrapper_class', 'urna_tbay_wcfm_addclass_sidebar_right', 10, 2 );
}


if( ! function_exists( 'urna_tbay_wfcm_change_become_vendor_register_form' ) ) {
    function urna_tbay_wfcm_change_become_vendor_register_form() {
        global $WCFMmp;

    	if( !class_exists('WCFMmp_Frontend') ) return;

    	remove_action( 'woocommerce_register_form_end', array( $WCFMmp->frontend, 'wcfmmp_become_vendor_link' ) );
    	add_action( 'woocommerce_after_button_resgiter', array( $WCFMmp->frontend, 'wcfmmp_become_vendor_link' ) );
    }

    add_action('woocommerce_before_customer_login_form', 'urna_tbay_wfcm_change_become_vendor_register_form', 10);
}

if(!function_exists('urna_tbay_wcfm_group_info_vendor_single_product_open')){
    function  urna_tbay_wcfm_group_info_vendor_single_product_open() {
        global $WCFMmp, $WCFM;

        $wcfm_enquiry_button_position  = isset( $WCFM->wcfm_options['wcfm_enquiry_button_position'] ) ? $WCFM->wcfm_options['wcfm_enquiry_button_position'] : 'bellow_atc';
        $vendor_sold_by_position = isset( $WCFMmp->wcfmmp_marketplace_options['vendor_sold_by_position'] ) ? $WCFMmp->wcfmmp_marketplace_options['vendor_sold_by_position'] : 'below_atc';


        ?> 

        <?php if( $wcfm_enquiry_button_position === $vendor_sold_by_position ) : ?>
            <div id="urna-wcfm-info-vendor-wrapper" class="has-wcfm-enquiry">
        <?php else: ?> 
            <div id="urna-wcfm-info-vendor-wrapper">
        <?php endif; ?>

        <?php
    }
}

if(!function_exists('urna_tbay_wcfm_group_info_vendor_single_product_close')){
    function  urna_tbay_wcfm_group_info_vendor_single_product_close() {
        ?>
            </div>
        <?php
    }
}

if( ! function_exists( 'urna_tbay_wfcm_add_sold_by_single_product_centered' ) ) {
    function urna_tbay_wfcm_add_sold_by_single_product_centered() {
        global $WCFMmp, $WCFM;

        $product_single_layout  =   ( isset($_GET['product_single_layout']) )   ?   $_GET['product_single_layout'] :  urna_get_single_select_layout();

        if( !class_exists('WCFMmp_Frontend') || $product_single_layout !== 'full-width-centered'  ) return;

      $wcfm_enquiry_button_position  = isset( $WCFM->wcfm_options['wcfm_enquiry_button_position'] ) ? $WCFM->wcfm_options['wcfm_enquiry_button_position'] : 'bellow_atc';
      $vendor_sold_by_position = isset( $WCFMmp->wcfmmp_marketplace_options['vendor_sold_by_position'] ) ? $WCFMmp->wcfmmp_marketplace_options['vendor_sold_by_position'] : 'bellow_atc';
        
        // Show Product enquiry button
        if( $wcfm_enquiry_button_position == 'bellow_price' ) {
            add_action( 'urna_woocommerce_single_product_summary_left',   array( $WCFM->wcfm_enquiry, 'wcfm_enquiry_button' ), 16 );
        } elseif ( $wcfm_enquiry_button_position == 'bellow_sc' ) {
            add_action( 'urna_woocommerce_single_product_summary_left',   array( $WCFM->wcfm_enquiry, 'wcfm_enquiry_button' ), 26 );
        } else {
            add_action( 'urna_woocommerce_single_product_summary_right',   array( $WCFM->wcfm_enquiry, 'wcfm_enquiry_button' ), 7 );
        }

        // Show Product Sold By Label
        if( $vendor_sold_by_position == 'bellow_title' ) {
            add_action( 'urna_woocommerce_single_product_summary_left',   array( $WCFMmp->frontend, 'wcfmmp_sold_by_single_product' ), 7 );
            add_action('urna_woocommerce_single_product_summary_left','urna_tbay_wcfm_group_info_vendor_single_product_open', 6);
            add_action('urna_woocommerce_single_product_summary_left','urna_tbay_wcfm_group_info_vendor_single_product_close', 9);
        } elseif( $vendor_sold_by_position == 'bellow_price' ) {
            add_action( 'urna_woocommerce_single_product_summary_left',   array( $WCFMmp->frontend, 'wcfmmp_sold_by_single_product' ), 15 );
            add_action('urna_woocommerce_single_product_summary_left','urna_tbay_wcfm_group_info_vendor_single_product_open', 12);
            add_action('urna_woocommerce_single_product_summary_left','urna_tbay_wcfm_group_info_vendor_single_product_close', 18);
        } elseif ( $vendor_sold_by_position == 'bellow_sc' ) {
            add_action( 'urna_woocommerce_single_product_summary_left',   array( $WCFMmp->frontend, 'wcfmmp_sold_by_single_product' ), 25 );
            add_action('urna_woocommerce_single_product_summary_left','urna_tbay_wcfm_group_info_vendor_single_product_open', 22);
            add_action('urna_woocommerce_single_product_summary_left','urna_tbay_wcfm_group_info_vendor_single_product_close', 27);
        } else {
            add_action( 'woocommerce_product_meta_start',   array( $WCFMmp->frontend, 'wcfmmp_sold_by_single_product' ), 50 );
        }  

        if( ($wcfm_enquiry_button_position == 'bellow_atc') && ($vendor_sold_by_position == 'bellow_atc') ) {

            remove_action( 'urna_woocommerce_single_product_summary_right',   array( $WCFM->wcfm_enquiry, 'wcfm_enquiry_button' ), 7 );

        }      

    }

    add_action('urna_woocommerce_before_single_product_centered', 'urna_tbay_wfcm_add_sold_by_single_product_centered', 10);
}

if(!function_exists('urna_tbay_wcfm_vendor_sold_by_position')){
    add_action('woocommerce_before_single_product','urna_tbay_wcfm_vendor_sold_by_position', 40);
    function  urna_tbay_wcfm_vendor_sold_by_position() {
        global $WCFMmp, $WCFM;

        $wcfm_enquiry_button_position  = isset( $WCFM->wcfm_options['wcfm_enquiry_button_position'] ) ? $WCFM->wcfm_options['wcfm_enquiry_button_position'] : 'bellow_atc';
        $vendor_sold_by_position = isset( $WCFMmp->wcfmmp_marketplace_options['vendor_sold_by_position'] ) ? $WCFMmp->wcfmmp_marketplace_options['vendor_sold_by_position'] : 'bellow_atc';



        switch ($vendor_sold_by_position) {
            case 'bellow_title':
                add_action('woocommerce_single_product_summary','urna_tbay_wcfm_group_info_vendor_single_product_open', 5);
                add_action('woocommerce_single_product_summary','urna_tbay_wcfm_group_info_vendor_single_product_close', 9);
            break;         

            case 'bellow_price':
                add_action('woocommerce_single_product_summary','urna_tbay_wcfm_group_info_vendor_single_product_open', 12);
                add_action('woocommerce_single_product_summary','urna_tbay_wcfm_group_info_vendor_single_product_close', 18);
            break;        

            case 'bellow_sc':
                add_action('woocommerce_single_product_summary','urna_tbay_wcfm_group_info_vendor_single_product_open', 22);
                add_action('woocommerce_single_product_summary','urna_tbay_wcfm_group_info_vendor_single_product_close', 27);
            break;
             
            default:
                add_action('woocommerce_product_meta_start','urna_tbay_wcfm_group_info_vendor_single_product_open', 10);
                add_action('woocommerce_product_meta_start','urna_tbay_wcfm_group_info_vendor_single_product_close', 99);
            break;
        }


        if( $wcfm_enquiry_button_position === $vendor_sold_by_position ) {


            switch ($wcfm_enquiry_button_position) {
                case 'bellow_price':
                    remove_action( 'woocommerce_single_product_summary',   array( $WCFM->wcfm_enquiry, 'wcfm_enquiry_button' ), 15 );
                    add_action('woocommerce_single_product_summary', array( $WCFM->wcfm_enquiry, 'wcfm_enquiry_button' ), 16 );
                break;        
                case 'bellow_sc':
                    remove_action( 'woocommerce_single_product_summary',   array( $WCFM->wcfm_enquiry, 'wcfm_enquiry_button' ), 25 );
                    add_action('woocommerce_single_product_summary', array( $WCFM->wcfm_enquiry, 'wcfm_enquiry_button' ), 26 );
                break;
                 default:
                    remove_action( 'woocommerce_single_product_summary',   array( $WCFM->wcfm_enquiry, 'wcfm_enquiry_button' ), 35 );
                    add_action('woocommerce_product_meta_start', array( $WCFM->wcfm_enquiry, 'wcfm_enquiry_button' ), 60 );
                break;
            }
        }
    }
}



