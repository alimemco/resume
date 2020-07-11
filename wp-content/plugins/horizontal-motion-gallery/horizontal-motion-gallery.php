<?php
/*
Plugin Name: Horizontal motion gallery
Plugin URI: http://www.gopiplus.com/work/2010/07/18/horizontal-motion-gallery/
Description: Horizontal motion gallery is a flexible gallery script,The user can direct both the image scrolling direction and speed just by placing the mouse on either side of the image gallery.  
Author: Gopi Ramasamy
Version: 8.8
Author URI: http://www.gopiplus.com/work/2010/07/18/horizontal-motion-gallery/
Donate link: http://www.gopiplus.com/work/2010/07/18/horizontal-motion-gallery/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: horizontal-motion-gallery
Domain Path: /languages
*/

function my_hmg_show( $dir = "dir1" ) 
{
	$arr = array();
	$arr["dir"] = $dir;
	echo my_hmg_shortcode($arr);
}

function my_hmg_install() 
{
	add_option('my_hmg_dir1', "wp-content/plugins/horizontal-motion-gallery/gallery1/");
	add_option('my_hmg_dir2', "wp-content/plugins/horizontal-motion-gallery/gallery1/");
	add_option('my_hmg_dir3', "wp-content/plugins/horizontal-motion-gallery/gallery1/");
	add_option('my_hmg_dir4', "wp-content/plugins/horizontal-motion-gallery/gallery1/");
	add_option('my_hmg_dir5', "wp-content/plugins/horizontal-motion-gallery/gallery1/");
}

function my_hmg_widget($args) 
{
	$arr = array();
	$arr["dir"] = get_option('my_hmg_dir1');
	echo my_hmg_shortcode($arr);
}

function my_hmg_admin_option() 
{
	?>
	<div class="wrap">
		<div class="form-wrap">
			<div id="icon-edit" class="icon32 icon32-posts-post"><br></div>
				<h2><?php _e('Horizontal motion gallery', 'horizontal-motion-gallery'); ?></h2>
				<?php
				$my_hmg_dir1 = get_option('my_hmg_dir1');
				$my_hmg_dir2 = get_option('my_hmg_dir2');
				$my_hmg_dir3 = get_option('my_hmg_dir3');
				$my_hmg_dir4 = get_option('my_hmg_dir4');
				$my_hmg_dir5 = get_option('my_hmg_dir5');
			
				if (isset($_POST['my_hmg_form_submit']) && $_POST['my_hmg_form_submit'] == 'yes')
				{
					//	Just security thingy that wordpress offers us
					check_admin_referer('my_hmg_form_setting');
						
					$my_hmg_dir1 = stripslashes(sanitize_text_field($_POST['my_hmg_dir1']));
					$my_hmg_dir2 = stripslashes(sanitize_text_field($_POST['my_hmg_dir2']));
					$my_hmg_dir3 = stripslashes(sanitize_text_field($_POST['my_hmg_dir3']));
					$my_hmg_dir4 = stripslashes(sanitize_text_field($_POST['my_hmg_dir4']));
					$my_hmg_dir5 = stripslashes(sanitize_text_field($_POST['my_hmg_dir5']));
					
					update_option('my_hmg_dir1', $my_hmg_dir1 );
					update_option('my_hmg_dir2', $my_hmg_dir2 );
					update_option('my_hmg_dir3', $my_hmg_dir3 );
					update_option('my_hmg_dir4', $my_hmg_dir4 );
					update_option('my_hmg_dir5', $my_hmg_dir5 );
					
					?>
					<div class="updated fade">
						<p><strong><?php _e('Details successfully updated.', 'horizontal-motion-gallery'); ?></strong></p>
					</div>
					<?php
				}
				?>
				<h3><?php _e('Plugin setting', 'horizontal-motion-gallery'); ?></h3>
				<form name="my_hmg_form" method="post" action="#">
					
					<label for="tag-title"><?php _e('Directory 1 (Default for widget)', 'horizontal-motion-gallery'); ?></label>
					<input name="my_hmg_dir1" type="text" value="<?php echo $my_hmg_dir1; ?>"  id="my_hmg_dir1" size="90">
					<p><?php _e('Please enter your image directory.', 'horizontal-motion-gallery'); ?> (Example: wp-content/plugins/horizontal-motion-gallery/gallery1/)</p>
					
					<label for="tag-title"><?php _e('Directory 2', 'horizontal-motion-gallery'); ?></label>
					<input name="my_hmg_dir2" type="text" value="<?php echo $my_hmg_dir2; ?>"  id="my_hmg_dir2" size="90">
					<p><?php _e('Please enter your image directory.', 'horizontal-motion-gallery'); ?> (Example: wp-content/plugins/horizontal-motion-gallery/gallery1/)</p>
					
					<label for="tag-title"><?php _e('Directory 3', 'horizontal-motion-gallery'); ?></label>
					<input name="my_hmg_dir3" type="text" value="<?php echo $my_hmg_dir3; ?>"  id="my_hmg_dir3" size="90">
					<p><?php _e('Please enter your image directory.', 'horizontal-motion-gallery'); ?></p>
					
					<label for="tag-title"><?php _e('Directory 4', 'horizontal-motion-gallery'); ?></label>
					<input name="my_hmg_dir4" type="text" value="<?php echo $my_hmg_dir4; ?>"  id="my_hmg_dir4" size="90">
					<p><?php _e('Please enter your image directory.', 'horizontal-motion-gallery'); ?></p>
					
					<label for="tag-title"><?php _e('Directory 5', 'horizontal-motion-gallery'); ?></label>
					<input name="my_hmg_dir5" type="text" value="<?php echo $my_hmg_dir5; ?>"  id="my_hmg_dir5" size="90">
					<p><?php _e('Please enter your image directory.', 'horizontal-motion-gallery'); ?></p>
					
					<div style="height:10px;"></div>
					<input type="hidden" name="my_hmg_form_submit" value="yes"/>
					<input name="my_hmg_submit" id="my_hmg_submit" class="button" value="<?php _e('Submit', 'horizontal-motion-gallery'); ?>" type="submit" />
					<a class="button" target="_blank" href="http://www.gopiplus.com/work/2010/07/18/horizontal-motion-gallery/">
					<?php _e('Help', 'horizontal-motion-gallery'); ?></a>
					<?php wp_nonce_field('my_hmg_form_setting'); ?>
				</form>
			</div>
		<h3><?php _e('Plugin configuration option', 'horizontal-motion-gallery'); ?></h3>
		<ol>
			<li><?php _e('Drag and drop the widget to your sidebar.', 'horizontal-motion-gallery'); ?></li>
			<li><?php _e('Add directly in to the theme using PHP code.', 'horizontal-motion-gallery'); ?></li>
			<li><?php _e('Add the plugin in the posts or pages using short code', 'horizontal-motion-gallery'); ?>.</li>
		</ol>
		<p class="description"><?php _e('Check official website for more information', 'horizontal-motion-gallery'); ?> 
		<a target="_blank" href="http://www.gopiplus.com/work/2010/07/18/horizontal-motion-gallery/"><?php _e('click here', 'horizontal-motion-gallery'); ?></a></p>
		<p class="description"><?php _e('Note: Dont upload your original images into plugin folder. if you upload the images into plugin folder, you may lose the images when you update the plugin to next version. Thus upload your images in "wp-content/uploads/your-folder/" folder and use the folder path as per the example in "Image Directory" text box.', 'horizontal-motion-gallery'); ?></p>
	</div>
	<?php
}

function my_hmg_deactivation() 
{
	// No action required.
}

function my_hmg_add_to_menu() 
{
	add_options_page( __('Motion Gallery', 'horizontal-motion-gallery'), 
			__('Motion Gallery', 'horizontal-motion-gallery'), 'manage_options', 'horizontal-motion-gallery', 'my_hmg_admin_option' );
}

if (is_admin()) 
{
	add_action('admin_menu', 'my_hmg_add_to_menu');
}

function my_hmg_control() 
{
	echo '<p><b>';
	_e('Motion Gallery', 'horizontal-motion-gallery');
	echo '.</b> ';
	_e('Check official website for more information', 'horizontal-motion-gallery');
	?> <a target="_blank" href="http://www.gopiplus.com/work/2010/07/18/horizontal-scroll-image-slideshow/"><?php _e('click here', 'horizontal-motion-gallery'); ?></a></p><?php
}

function my_hmg_init()
{
	if(function_exists('wp_register_sidebar_widget')) 
	{
		wp_register_sidebar_widget( __('Motion Gallery', 'horizontal-motion-gallery'), __('Motion Gallery', 'horizontal-motion-gallery'), 'my_hmg_widget');
	}
	
	if(function_exists('wp_register_widget_control')) 
	{
		wp_register_widget_control( __('Motion Gallery', 'horizontal-motion-gallery'), array( __('Motion Gallery', 'horizontal-motion-gallery'), 'widgets'), 'my_hmg_control');
	} 
}

function my_hmg_textdomain() 
{
	  load_plugin_textdomain( 'horizontal-motion-gallery', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

add_action('plugins_loaded', 'my_hmg_textdomain');
add_action("plugins_loaded", "my_hmg_init");
register_activation_hook(__FILE__, 'my_hmg_install');
register_deactivation_hook(__FILE__, 'my_hmg_deactivation');
add_shortcode( 'motion-gallery', 'my_hmg_shortcode' );

function my_hmg_shortcode( $atts ) 
{
	$my_hmg_package = "";
	$my_hmg_output = "";
	global $my_hmg_scriptinserted;
	
	// [motion-gallery dir="dir1"]
	if ( ! is_array( $atts ) )
	{
		return '';
	}
	$dir =  strtoupper($atts['dir']);
	
	switch ($dir)
	{
		case "DIR1":
			$dir_location = get_option('my_hmg_dir1');
			break;
		case "DIR2":
			$dir_location = get_option('my_hmg_dir2');
			break;
		case "DIR3":
			$dir_location = get_option('my_hmg_dir3');
			break;
		case "DIR4":
			$dir_location = get_option('my_hmg_dir4');
			break;
		case "DIR5":
			$dir_location = get_option('my_hmg_dir5');
			break;
		default:
			$dir_location = "wp-content/plugins/horizontal-motion-gallery/gallery1/";
	}

	$siteurl = get_option('siteurl') . "/";
	$my_hmg_pluginurl = plugins_url() . "/horizontal-motion-gallery/";
	if(is_dir($dir_location))
	{
		$f_dirHandle = opendir($dir_location);
		$path = "";
		$vs_count = 0;
		while ($f_file = readdir($f_dirHandle)) 
		{
			$f_file_nocase = $f_file;
			$f_file = strtoupper($f_file);
			if(!is_dir($f_file) && (strpos($f_file, '.JPG')>0 or strpos($f_file, '.GIF')>0 or strpos($f_file, '.PNG')>0)) 
			{
				$path = $siteurl . $dir_location . $f_file_nocase;
				$my_hmg_package = $my_hmg_package . "<a href='#'><img style='display:inline;' src='$path' border='0' title='' alt=''></a>";
				$vs_count++;
			}
		}
		closedir($f_dirHandle);
		
		if (!isset($ScriptInserted) || $ScriptInserted !== true)
		{
			$ScriptInserted = true;
			$my_hmg_output = $my_hmg_output . '<link rel="stylesheet" type="text/css" href="'.$my_hmg_pluginurl.'motion-gallery-page.css" />';
			$my_hmg_output = $my_hmg_output . '<script type="text/javascript" src="'.$my_hmg_pluginurl.'motion-gallery-page.js"></script>';
		}
		
		$my_hmg_output = $my_hmg_output . '<div id="hmg_motioncontainer_a" style="position:relative;overflow:hidden;">';
			$my_hmg_output = $my_hmg_output . '<div id="hmg_motiongallery" style="position:absolute;left:0;top:0;white-space: nowrap;"> ';
				$my_hmg_output = $my_hmg_output . '<nobr id="hmg_trueContainer">'.$my_hmg_package.'</nobr>';
			$my_hmg_output = $my_hmg_output . '</div>';
		$my_hmg_output = $my_hmg_output . '</div>';
	}
	else
	{
		$my_hmg_output = "Directory not exists (". $dir_location.")";
	}
	
	return $my_hmg_output;
}
?>