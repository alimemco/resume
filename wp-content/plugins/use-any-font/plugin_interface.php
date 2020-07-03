<?php
if (isset($_POST['submit-uaf-font-php'])){	
	$fontUploadResponse = uaf_upload_font_to_server();
    if ($fontUploadResponse['status'] == 'success'){
		$fontUploadResponse = uaf_save_font_files($_POST['font_name'], $fontUploadResponse['body']);	
	}
	$operationStatus			= $fontUploadResponse['status'];
	$operationMsg				= $fontUploadResponse['body'];    
}

if (isset($_POST['submit-uaf-font-js'])){	
	$fontSaveResponse 		= uaf_save_font_files($_POST['font_name'], $_POST['convert_response']);
	$operationStatus		= $fontSaveResponse['status'];
	$operationMsg			= $fontSaveResponse['body'];
}

add_action('admin_menu', 'uaf_create_menu');
add_action("admin_print_styles", 'adminCsslibs');
add_action('wp_enqueue_scripts', 'uaf_client_css');
add_action('plugins_loaded', 'uaf_update_check');
add_action('init', 'uaf_editor_setup');

$uaf_disbale_editor_font_list_value = get_option('uaf_disbale_editor_font_list');
if ($uaf_disbale_editor_font_list_value != 1):
	add_filter('mce_buttons_2', 'wp_editor_fontsize_filter');
	add_filter('tiny_mce_before_init', 'uaf_mce_before_init' );
endif;

function uaf_client_css() {
	$uaf_upload 	= wp_upload_dir();
	$uaf_upload_url = set_url_scheme($uaf_upload['baseurl']);
	$uaf_upload_url = $uaf_upload_url . '/useanyfont/';
	wp_register_style( 'uaf_client_css', $uaf_upload_url.'uaf.css', array(),get_option('uaf_css_updated_timestamp'));
	wp_enqueue_style( 'uaf_client_css' );
}

function adminCsslibs(){
	$uaf_upload 	= wp_upload_dir();
	$uaf_upload_url = set_url_scheme($uaf_upload['baseurl']);
	$uaf_upload_url = $uaf_upload_url . '/useanyfont/';
	wp_register_style('uaf-admin-style', plugins_url('use-any-font/css/uaf_admin.css'));
    wp_enqueue_style('uaf-admin-style');
	wp_register_style('uaf-font-style', $uaf_upload_url.'admin-uaf.css', array(), get_option('uaf_css_updated_timestamp'));
    wp_enqueue_style('uaf-font-style');
	add_editor_style($uaf_upload_url.'admin-uaf.css');
}
		
function uaf_create_menu() {
	add_menu_page( 'Use Any Font', 'Use Any Font', 'manage_options', 'uaf_settings_page', 'uaf_settings_page', 'dashicons-editor-textcolor');
}

function uaf_activate(){
	uaf_create_folder(); // CREATE FOLDER
	uaf_write_css(); //rewrite css when plugin is activated after update or somethingelse......
}

function uaf_settings_page() {
	global $operationStatus;
	global $operationMsg;

	include('includes/uaf_header.php');
	if ($GLOBALS['uaf_use_curl_uploader'] == 1){
		include('includes/uaf_font_upload_php.php');
	} else {
		include('includes/uaf_font_upload_js.php');	
	}
	include('includes/uaf_font_implement.php');
	include('includes/uaf_footer.php');
}


function uaf_editor_setup(){
	include('includes/uaf_editor_setup.php');
}