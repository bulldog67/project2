<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
   wp_enqueue_style( 'child-style',
       get_stylesheet_directory_uri() . '/style.css',
       array('parent-style')
   );
}


//removes the wp meta gen
remove_action('wp_head','wp_generator');


/*
//Add dashdoard widget did not work 
function sugden_dashboard_widgets(){
global $wp_meta_boxes;
wp_add_dashboard_widget('sugden_help_widget','SUGDEN-Lets Make Some WordPress!','sugden_dashboaed_help');
}
function sugden_dashboard_help(){
    echo'<p>Need some help with WordPress Site? - Email me <a
    href="mailto:billsugden@billsugden.com">
    here</a>.And check out my website here:
    <a href="http://www.billsugden.com"target="_blank">SUGDEN</a></p>';
}
add_action('wp_dashboard_setup',sugden_daskboard_widgets');
*/

//Add Custom Dashboard Widgets in WordPress
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
 
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;
 
wp_add_dashboard_widget('custom_help_widget', 'Theme Support', 'custom_dashboard_help');
}
 
function custom_dashboard_help() {
echo '<p>Welcome to your Custom Profile Theme! Need help? Contact the  developer Bill Sugden <a href="mailto:billsugden@billsugden.com">here</a>. For our website visit: <a href="http://www.billsugden.com" target="_blank">billsugden.com</a></p>';
}


//Change the Footer in WordPress Admin Panel

function remove_footer_admin () {
 
echo ' Page designed by <a href="http://www.billsugden.com" target="_blank">billsugden.com</a> | WordPress page designer: <a href="mailto:billsugden@billsugden.com" target="_blank">Bill Sugden</a></p>';
 
}
 
add_filter('admin_footer_text', 'remove_footer_admin');


// custom logo 
/*

function wpb_custom_logo() {
echo '
<style type="text/css">
#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
background-image: url(' . get_bloginfo('stylesheet_directory') . '/images/custom-logo.png) !important;
background-position: 0 0;
color:rgba(0, 0, 0, 0);
}
#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
background-position: 0 0;
}
</style>
';
}
//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');
*/


// remove wellcome dashboard
remove_action('welcome_panel', 'wp_welcome_panel');

