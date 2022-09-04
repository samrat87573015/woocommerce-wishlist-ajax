
<?php

//wishlist ajax
if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_ajax_update_count' ) ) {
	function yith_wcwl_ajax_update_count() {
		wp_send_json(
			array(
				'count' => yith_wcwl_count_all_products(),
			)
		);
	}
	add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
	add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
}

if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_enqueue_custom_script' ) ) {
	function yith_wcwl_enqueue_custom_script() {
		wp_add_inline_script(
			'jquery-yith-wcwl',
			"
        jQuery( function( $ ) {
          let refreshCounter =  () => {
            $.get( yith_wcwl_l10n.ajax_url, {
              action: 'yith_wcwl_update_wishlist_count'
            }, function( data ) {
              $('.header-wishlist-icon').find('.wishlist-count').html( data.count );
            } );
          };
          
          $( document ).on( 'added_to_wishlist removed_from_wishlist', refreshCounter );
          
          refreshCounter();
        } );
      "
		);
	}
	add_action( 'wp_enqueue_scripts', 'yith_wcwl_enqueue_custom_script', 20 );
}

