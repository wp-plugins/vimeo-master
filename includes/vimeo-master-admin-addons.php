<?php
if( is_multisite() ) {
	function menu_multi_vimeo_admin_addons(){
	// Create menu
	add_submenu_page( 'vimeo-master', 'Add-ons', 'Add-ons', 'manage_options', 'vimeo-master-admin-addons', 'vimeo_master_admin_addons' );
	}
}
else {
	// Create menu
	function menu_single_vimeo_admin_addons(){
		if ( is_admin() )
		add_submenu_page( 'vimeo-master', 'Add-ons', 'Add-ons', 'manage_options', 'vimeo-master-admin-addons', 'vimeo_master_admin_addons' );
	}
}

function vimeo_master_admin_addons(){
?>
<div class="wrap">
<div style="width:40px; vertical-align:middle; float:left;"><img src="<?php echo plugins_url('../images/techgasp-minilogo.png', __FILE__); ?>" alt="' . esc_attr__( 'TechGasp Plugins') . '" /><br /></div>
<h2><b>&nbsp;Vimeo Master Add-ons</b></h2>
<?php
if(!class_exists('vimeo_master_admin_addons_table')){
	require_once( dirname( __FILE__ ) . '/vimeo-master-admin-addons-table.php');
}
//Prepare Table of elements
$wp_list_table = new vimeo_master_admin_addons_table();
//Table of elements
$wp_list_table->display();

?>
</br>

<h2>IMPORTANT: Makes no use of Javascript or Ajax to keep your website fast and conflicts free</h2>

<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>

<br>

<p>
<a class="button-secondary" href="http://wordpress.techgasp.com" target="_blank" title="Visit Website">More TechGasp Plugins</a>
<a class="button-secondary" href="http://wordpress.techgasp.com/support/" target="_blank" title="Facebook Page">TechGasp Support</a>
<a class="button-primary" href="http://wordpress.techgasp.com/vimeo-master/" target="_blank" title="Visit Website">Vimeo Master Info</a>
<a class="button-primary" href="http://wordpress.techgasp.com/vimeo-master-documentation/" target="_blank" title="Visit Website">Vimeo Master Documentation</a>
<a class="button-primary" href="http://wordpress.techgasp.com/vimeo-master" target="_blank" title="Get Add-ons!">Get Add-ons!</a>
</p>
<?php
}
if( is_multisite() ) {
add_action( 'network_admin_menu', 'menu_multi_vimeo_admin_addons' );
}
else {
add_action( 'admin_menu', 'menu_single_vimeo_admin_addons' );
}