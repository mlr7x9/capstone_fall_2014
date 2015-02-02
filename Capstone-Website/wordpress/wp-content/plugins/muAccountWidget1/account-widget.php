<?php
/*
Plugin Name: muAccountWidget
Plugin URI: None
Description: This plugin creates an account widget for logged in pawprint users
Version: 1.0
Author: Philip Cressler
Author URI: None
License: GPL2
*/
?>
<?php

class muAccountWidget extends WP_Widget {
	//constructor
	function muAccountWidget()
	{
  		parent::WP_Widget(false, $name = __('muAccountWidget', 'muAccountWidget'));
	}

	//widget update
	function update($new_instance, $old_instance)
	{

	}
	//widget backend

	//widget display
	function widget($args, $instance)
	{
		echo '<div id=custom-widget>';
			echo '<div id = username-widget>';
		if ( is_user_logged_in() ) {
    	global $current_user;
    	  get_currentuserinfo();

     	 echo 'Welcome, <b>' . $current_user->user_login . '</b>';
	 $this_user = wp_get_current_user();
		} else {
   		 echo 'you are not logged on';
		}; 
			echo '</div>';
		echo '<div id=loginout-widget>';
		wp_loginout();

        //if user is logged in provide link to profile page

	if ( is_user_logged_in() ) {
		$user_id = bbp_get_user_profile_url($this_user->ID);
		echo ' <a href="' . $user_id . '">View Profile</a>';
	}
		echo '</div>';
		echo '</div>';
	}

}

add_action('widgets_init', create_function('', 'return register_widget("muAccountWidget");'));

?>