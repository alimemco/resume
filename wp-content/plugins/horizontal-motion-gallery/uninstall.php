<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

delete_option('my_hmg_dir1');
delete_option('my_hmg_dir2');
delete_option('my_hmg_dir3');
delete_option('my_hmg_dir4');
delete_option('my_hmg_dir5');
 
// for site options in Multisite
delete_site_option('my_hmg_dir1');
delete_site_option('my_hmg_dir2');
delete_site_option('my_hmg_dir3');
delete_site_option('my_hmg_dir4');
delete_site_option('my_hmg_dir5');