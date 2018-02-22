<?php 
/* 
Plugin Name: Setting panel	
Version: 1.0.1
Description: Add extra options into theme
Author: Appnova
Author URI: http://www.wordpress.org
$layout = get_option('theme_layout');
*/

/* Add menu page callback funtion */
function theme_settings_page(){

    ?>
	    <div class="wrap">
	    <h1>Theme Panel</h1>
	    <form method="post" action="options.php" enctype="multipart/form-data">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");      
	            submit_button(); 
	        ?>          
	    </form>
		</div>
	<?php
}

/* Display Youtube Field*/
function display_footer_contact_title()
{
	?>
    	<input type="text" name="footer_contact_title" id="footer_contact_title" value="<?php echo get_option('footer_contact_title'); ?>" size="50"/>
    <?php
}


/* Display Youtube Field*/
function display_youtube_element()
{
	?>
    	<input type="text" name="youtube_url" id="youtube_url" value="<?php echo get_option('youtube_url'); ?>" size="50"/>
    <?php
}

/* Display Youtube Field*/
function display_vimeo_element()
{
	?>
    	<input type="text" name="vimeo_url" id="vimeo_url" value="<?php echo get_option('vimeo_url'); ?>" size="50"/>
    <?php
}

/* Display Tumblr Field*/
function display_tumblr_element()
{
	?>
    	<input type="text" name="tumblr_url" id="tumblr_url" value="<?php echo get_option('tumblr_url'); ?>" size="50"/>
    <?php
}

/* Display Twitter Field */
function display_twitter_element()
{
	?>
    	<input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" size="50"/>
    <?php
}

/* Display Facebook Field */
function display_facebook_element()
{
	?>
    	<input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" size="50" />
    <?php
}

/* Display Facebook Sharing App ID */
function display_facebook_app_id_element()
{
	?>
    	<input type="text" name="facebook_app_id" id="facebook_app_id" value="<?php echo get_option('facebook_app_id'); ?>" size="50" />
    <?php
}

/* Display Linkedin Field */
function display_linkedin_element()
{
	?>
    	<input type="text" name="linkedin_url" id="linkedin_url" value="<?php echo get_option('linkedin_url'); ?>" size="50"/>
    <?php
}

/* Display Linkedin Field */
function display_instagram_element()
{
	?>
    	<input type="text" name="instagram_url" id="instagram_url" value="<?php echo get_option('instagram_url'); ?>" size="50" />
    <?php
}

/* Display Pinterest Field */
function display_pinterest_element()
{
	?>
    	<input type="text" name="pinterest_url" id="pinterest_url" value="<?php echo get_option('pinterest_url'); ?>" size="50"/>
    <?php
}

/* Display Google+ Field */
function display_googleplus_element()
{
	?>
    	<input type="text" name="googleplus_url" id="googleplus_url" value="<?php echo get_option('googleplus_url'); ?>" size="50"/>
    <?php
}

/* Display Google Analytics Code Field */
function display_google_element()
{
	?>
		<textarea name="google_analytics" id="google_analytics" rows=5 cols=48><?php echo get_option('google_analytics'); ?></textarea>
    	
    <?php
}

/* Display Google Analytics Code Field */
function display_blog_element()
{
	?>
		<input type="text" name="blog_link" id="blog_link" value="<?php echo get_option('blog_link'); ?>" size="50"/>
    	
    <?php
}

/* Display Footer script Code Field */
function display_footer_script()
{
	?>
		<textarea name="footer_script" id="footer_script" rows=5 cols=48><?php echo get_option('footer_script'); ?></textarea>
    	
    <?php
}

/* Display Copyright Field */
function display_copyright_element()
{
	?>
		<input type="text" name="copy_right" id="copy_right" value="<?php echo get_option('copy_right'); ?>" size="50"/>
    	
    <?php
}

/* Display Address Field */
function display_footer_contact_desc()
{
	?>
		<textarea name="footer_contact_desc" id="footer_contact_desc" rows=5 cols=48><?php echo get_option('footer_contact_desc'); ?> </textarea>
    	
    <?php
}

/* Display Logo Field for Header */
function logo_display()
{
	?>
         <input type="file" name="logo" />
		<?php if(get_option('logo')): ?>
			<div><img src="<?php echo get_option('logo'); ?>" /></div>
			
		<?php endif;?>
	<?php
}

/* Upload Media files */
function handle_logo_upload()
{	
	if(!empty($_FILES["logo"]["tmp_name"]))
	{	
		echo $_FILES["logo"]["name"]; 
		$urls = wp_handle_upload($_FILES["logo"], array('test_form' => FALSE));
	    $temp = $urls["url"];
		return $temp;  
		
	}
	 else{
		$temp = get_option('logo');
		return $temp;
	}	 
	return $option;
}

/* Save all field on the page */
function display_theme_panel_fields()
{	
	add_settings_section("section", "All Settings", null, "theme-options");	
	add_settings_field("twitter_url", "Twitter Profile Url", "display_twitter_element", "theme-options", "section");
    add_settings_field("facebook_url", "Facebook Profile Url", "display_facebook_element", "theme-options", "section");
	add_settings_field("facebook_app_id", "Facebook Sharing App ID", "display_facebook_app_id_element", "theme-options", "section");
	add_settings_field("linkedin_url", "Linkedin Profile Url", "display_linkedin_element", "theme-options", "section");
	//add_settings_field("youtube_url", "Youtube Profile Url", "display_youtube_element", "theme-options", "section");
	add_settings_field("vimeo_url", "Vimeo Profile Url", "display_vimeo_element", "theme-options", "section");
	//add_settings_field("tumblr_url", "Tumblr Profile Url", "display_tumblr_element", "theme-options", "section");
	add_settings_field("instagram_url", "Instagram Profile Url", "display_instagram_element", "theme-options", "section");
	add_settings_field("pinterest_url", "Pinterest Profile Url", "display_pinterest_element", "theme-options", "section");
	add_settings_field("blog_link", "Blog Page Link", "display_blog_element", "theme-options", "section");
	//add_settings_field("googleplus_url", "Google+ Profile Url", "display_googleplus_element", "theme-options", "section"); 
	add_settings_field("google_analytics", "Google Analytics Code", "display_google_element", "theme-options", "section");
	add_settings_field("footer_script", "Footer Script", "display_footer_script", "theme-options", "section");
	add_settings_field("copy_right", "Copyright", "display_copyright_element", "theme-options", "section");
	add_settings_field("logo", "Footer Logo", "logo_display", "theme-options", "section");
	//add_settings_field("footer_contact_title", "Footer Contact Title", "display_footer_contact_title", "theme-options", "section");
	//add_settings_field("footer_contact_desc", "Footer Contact Description", "display_footer_contact_desc", "theme-options", "section");	 
	
    register_setting("section", "twitter_url");
    register_setting("section", "facebook_url");
	register_setting("section", "facebook_app_id");
	register_setting("section", "linkedin_url");
	//register_setting("section", "youtube_url");
	register_setting("section", "vimeo_url");
	//register_setting("section", "tumblr_url");
	register_setting("section", "instagram_url");
	register_setting("section", "pinterest_url");
	register_setting("section", "blog_link");
	//register_setting("section", "googleplus_url");
	register_setting("section", "google_analytics");
	register_setting("section", "footer_script");
	register_setting("section", "copy_right");
	//register_setting("section", "footer_contact_desc"); 
	register_setting("section", "logo", "handle_logo_upload");
	//register_setting("section", "footer_contact_title"); 
}

add_action("admin_init", "display_theme_panel_fields");

/* Add menu page on left panel*/
function add_theme_menu_item()
{
	add_menu_page("Theme Panel", "Theme Panel", "manage_options", "theme-panel", "theme_settings_page", null, 80);
}

add_action("admin_menu", "add_theme_menu_item");

// Add settings link on plugin page
function settings_link($links) { 
  $settings_link = '<a href="admin.php?page=theme-panel">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'settings_link' );
