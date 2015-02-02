<?php

/*******************************************
* bbp profile information Settings Page
*******************************************/


function rpi_settings_page()
{
	global $rpi_options;
		
	?>
	<div class="wrap">
		<div id="upb-wrap" class="upb-help">
			<h2><?php _e('profile information Settings', 'bbp-profile-information'); ?></h2>
			<?php
			if ( ! isset( $_REQUEST['updated'] ) )
				$_REQUEST['updated'] = false;
			?>
			<?php if ( false !== $_REQUEST['updated'] ) : ?>
			<div class="updated fade"><p><strong><?php _e( 'Options saved', 'bbp-profile-information'); ?> ); ?></strong></p></div>
			<?php endif; ?>
			
			<table class="form-table">
			<tr>
		
		<td>
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="S6PZGWPG3HLEA">
<input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>
</td><td>
<?php _e("If you find this plugin useful, please consider donating just a couple of pounds to help me develop and maintain it. You support will be appreciated", 'bbp-last-post'); ?>
		
	</td>
	</tr>
	</table>			
			
			<form method="post" action="options.php">

				<?php settings_fields( 'rpi_settings_group' ); ?>
								
				<table class="form-table">
					
					<tr valign="top">
						<th colspan="2"><font size="2" color="grey" >This plugin allows you to set up to 4 user profile fields and add these to the profile display.
						<br> Users can populate these fields using their profile edit. 
						<br>Additionally you can set these fields to display under the authors name and avatar in topics and replies.
						<br> So for Instance you can set a label with a name of City.  Users can then add their city in their profile, and other users will then see their location on accessing their profile.  
						<br>If show item is set, then this also displays under the authors name on topics and replies eg 'Atlanta'
						<br> If show label is also set them both the label and content will display under the authors name on topics and replies eg 'City ; Atlanta' </th>
						
					</tr>
					
					<tr valign="top">
						<th colspan="2">Name : Name the field
						<br> Activate : check this to add the item to profile, un-check to hide (user data is not lost)  
						<br>Show label : check to display the label under the authors name and avatar in topics and replies.
						<br>Show Item : check to display the user set data under the authors name and avatar in topics and replies.</font>
						</th>
						
					</tr>

					
					<!-------------------------------Label1 ---------------------------------------->
					<tr valign="top">
						<th colspan="2"><h4><?php _e('Label 1', 'bbp-profile-information'); ?></h4></th>
					</tr>
					<tr valign="top">
					<th><?php _e('Name', 'bbp-profile-information'); ?></th>
					<td>
						<input id="rpi_settings[item1_label]" class="large-text" name="rpi_settings[item1_label]" type="text" value="<?php echo isset( $rpi_options['item1_label'] ) ? esc_html( $rpi_options['item1_label'] ) : '';?>" /><br/>
						<label class="description" for="rpi_settings[item1_label]"><?php _e( 'Enter Item 1 label eg Town, City, State, Twitter Account, Website etc.', 'profile-information' ); ?></label><br/>
					</td>
					</tr>
					
					<!-- checkbox to activate -->
					<tr valign="top">  
					<th><?php _e('Activate', 'bbp-profile-information'); ?></th>
					<td>
					<?php activate_item1_checkbox() ;?>
					</td>
					</tr>
					
					
					<!-- checkbox to display label in topics/replies -->
					<tr valign="top">  
					<th><?php _e('Show label', 'bbp-profile-information'); ?></th>
					<td>
					<?php labelshow_item1_checkbox() ;?>
					</td>
					</tr>
					
					<!-- checkbox to display label in topics/replies -->
					<tr valign="top">  
					<th><?php _e('Show Item', 'bbp-profile-information'); ?></th>
					<td>
					<?php itemshow_item1_checkbox() ;?>
					</td>
					</tr>
					
					
					<!------------------------------- Label2 ------------------------------------------>
					<tr valign="top">
						<th colspan="2"><h4><?php _e('Label 2', 'bbp-profile-information'); ?></h4></th>
					</tr>
					<tr valign="top">
						<th><?php _e('Name', 'profile-information'); ?></th>
						<td>
							<input id="rpi_settings[item2_label]" class="large-text" name="rpi_settings[item2_label]" type="text" value="<?php echo isset( $rpi_options['item2_label'] ) ? esc_html( $rpi_options['item2_label'] ) : '';?>" /><br/>
							<label class="description" for="rpi_settings[item2_label]"><?php _e( 'Enter Item 2 label eg Town, City, State, Twitter Account, Website etc.', 'bp-profile-information' ); ?></label><br/>
						</td>
					</tr>
					
					<!-- checkbox to activate -->
					<tr valign="top">  
					<th><?php _e('Activate', 'bbp-profile-information'); ?></th>
					<td>
					<?php activate_item2_checkbox() ;?>
					</td>
					</tr>
					
					
					
					<!-- checkbox to display label in topics/replies -->
					<tr valign="top">  
					<th><?php _e('Show label', 'bbp-profile-information'); ?></th>
					<td>
					<?php labelshow_item2_checkbox() ;?>
					</td>
					</tr>
					
					<!-- checkbox to display label in topics/replies -->
					<tr valign="top">  
					<th><?php _e('Show Item', 'bbp-profile-information'); ?></th>
					<td>
					<?php itemshow_item2_checkbox() ;?>
					</td>
					</tr>
					
					<!------------------------------- Label3 ------------------------------------------>
					<tr valign="top">
						<th colspan="2"><h4><?php _e('Label 3', 'bbp-profile-information'); ?></h4></th>
					</tr>
					<tr valign="top">
						<th><?php _e('Name', 'profile-information'); ?></th>
						<td>
							<input id="rpi_settings[item3_label]" class="large-text" name="rpi_settings[item3_label]" type="text" value="<?php echo isset( $rpi_options['item3_label'] ) ? esc_html( $rpi_options['item3_label'] ) : '';?>" /><br/>
							<label class="description" for="rpi_settings[item3_label]"><?php _e( 'Enter Item 3 label eg Town, City, State, Twitter Account, Website etc.', 'bp-profile-information' ); ?></label><br/>
						</td>
					</tr>
					
					<!-- checkbox to activate -->
					<tr valign="top">  
					<th><?php _e('Activate', 'bbp-profile-information'); ?></th>
					<td>
					<?php activate_item3_checkbox() ;?>
					</td>
					</tr>
					
					<!-- checkbox to display label in topics/replies -->
					<tr valign="top">  
					<th><?php _e('Show label', 'bbp-profile-information'); ?></th>
					<td>
					<?php labelshow_item3_checkbox() ;?>
					</td>
					</tr>
					
					<!-- checkbox to display label in topics/replies -->
					<tr valign="top">  
					<th><?php _e('Show Item', 'bbp-profile-information'); ?></th>
					<td>
					<?php itemshow_item3_checkbox() ;?>
					</td>
					</tr>
				
				<!------------------------------- Label 4 ------------------------------------------>
					<tr valign="top">
						<th colspan="2"><h4><?php _e('Label 4', 'bbp-profile-information'); ?></h4></th>
					</tr>
					<tr valign="top">
						<th><?php _e('Name', 'profile-information'); ?></th>
						<td>
							<input id="rpi_settings[item4_label]" class="large-text" name="rpi_settings[item4_label]" type="text" value="<?php echo isset( $rpi_options['item4_label'] ) ? esc_html( $rpi_options['item4_label'] ) : '';?>" /><br/>
							<label class="description" for="rpi_settings[item4_label]"><?php _e( 'Enter Item 4 label eg Town, City, State, Twitter Account, Website etc.', 'bp-profile-information' ); ?></label><br/>
						</td>
					</tr>
					
					<!-- checkbox to activate -->
					<tr valign="top">  
					<th><?php _e('Activate', 'bbp-profile-information'); ?></th>
					<td>
					<?php activate_item4_checkbox() ;?>
					</td>
					</tr>
					
					<!-- checkbox to display label in topics/replies -->
					<tr valign="top">  
					<th><?php _e('Show label', 'bbp-profile-information'); ?></th>
					<td>
					<?php labelshow_item4_checkbox() ;?>
					</td>
					</tr>
					
					<!-- checkbox to display label in topics/replies -->
					<tr valign="top">  
					<th><?php _e('Show Item', 'bbp-profile-information'); ?></th>
					<td>
					<?php itemshow_item4_checkbox() ;?>
					</td>
					</tr>
				
				</table>
				
				<!-- save the options -->
				<p class="submit">
					<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'bbp-profile-information' ); ?>" />
				</p>
								
				
			</form>
		</div><!--end sf-wrap-->
	</div><!--end wrap-->
		
	<?php
}

// register the plugin settings
function rpi_register_settings() {

	// create whitelist of options
	register_setting( 'rpi_settings_group', 'rpi_settings' );
	//register_setting( 'rpi_settings_group', 'Activate_item1' );
	//register_setting( 'rpi_settings_group', 'Activate_item2' );
}
//call register settings function
add_action( 'admin_init', 'rpi_register_settings' );


function rpi_settings_menu() {

	// add settings page
	add_submenu_page('options-general.php', __('bbp profile information', 'bbp-profile-information'), __('bbp profile Information', 'bbp-profile-information'), 'manage_options', 'bbp-profile-information-settings', 'rpi_settings_page');
}
add_action('admin_menu', 'rpi_settings_menu');

/*****************************   Checkbox functions **************************/

function activate_item1_checkbox() {
 	global $rpi_options ;
	$item1 =  $rpi_options['Activate_item1'] ;
	echo '<input name="rpi_settings[Activate_item1]" id="rpi_settings[Activate_item1]" type="checkbox" value="1" class="code" ' . checked( 1,$item1, false ) . ' /> Add this item to the profile';
  }
  
function activate_item2_checkbox() {
	global $rpi_options ;
	$item2 =  $rpi_options['Activate_item2'] ;
	echo '<input name="rpi_settings[Activate_item2]" id="rpi_settings[Activate_item2]" type="checkbox" value="1" class="code" ' . checked( 1,$item2, false ) . ' /> Add this item to the profile';
  }

function activate_item3_checkbox() {
	global $rpi_options ;
	$item3 =  $rpi_options['Activate_item3'] ;
	echo '<input name="rpi_settings[Activate_item3]" id="rpi_settings[Activate_item3]" type="checkbox" value="1" class="code" ' . checked( 1,$item3, false ) . ' />Add this item to the profile';
  }
  
function activate_item4_checkbox() {
	global $rpi_options ;
	$item4 =  $rpi_options['Activate_item4'] ;
	echo '<input name="rpi_settings[Activate_item4]" id="rpi_settings[Activate_item4]" type="checkbox" value="1" class="code" ' . checked( 1,$item4, false ) . ' /> Add this item to the profile';
  }
function labelshow_item1_checkbox() {
	global $rpi_options ;
	$labelshowitem1 =  $rpi_options['labelshow_item1'] ;
	echo '<input name="rpi_settings[labelshow_item1]" id="rpi_settings[labelshow_item1]" type="checkbox" value="1" class="code" ' . checked( 1,$labelshowitem1, false ) . ' /> Show the label for this item on topics/replies';
  }

function labelshow_item2_checkbox() {
	global $rpi_options ;
	$labelshowitem2 =  $rpi_options['labelshow_item2'] ;
	echo '<input name="rpi_settings[labelshow_item2]" id="rpi_settings[labelshow_item2]" type="checkbox" value="1" class="code" ' . checked( 1,$labelshowitem2, false ) . ' /> Show the label for this item on topics/replies';
  }

  
function labelshow_item3_checkbox() {
	global $rpi_options ;
	$labelshowitem3 =  $rpi_options['labelshow_item3'] ;
	echo '<input name="rpi_settings[labelshow_item3]" id="rpi_settings[labelshow_item3]" type="checkbox" value="1" class="code" ' . checked( 1,$labelshowitem3, false ) . ' /> Show the label for this item on topics/replies';
  }  
  
function labelshow_item4_checkbox() {
	global $rpi_options ;
	$labelshowitem4 =  $rpi_options['labelshow_item4'] ;
	echo '<input name="rpi_settings[labelshow_item4]" id="rpi_settings[labelshow_item4]" type="checkbox" value="1" class="code" ' . checked( 1,$labelshowitem4, false ) . ' /> Show the label for this item on topics/replies';
  }  
  
function itemshow_item1_checkbox() {
	global $rpi_options ;
	$itemshowitem1 =  $rpi_options['itemshow_item1'] ;
	echo '<input name="rpi_settings[itemshow_item1]" id="rpi_settings[item_item1]" type="checkbox" value="1" class="code" ' . checked( 1,$itemshowitem1, false ) . ' /> Show this item on topics/replies';
  }  
function itemshow_item2_checkbox() {
	global $rpi_options ;
	$itemshowitem2 =  $rpi_options['itemshow_item2'] ;
	echo '<input name="rpi_settings[itemshow_item2]" id="rpi_settings[itemshow_item2]" type="checkbox" value="1" class="code" ' . checked( 1,$itemshowitem2, false ) . ' /> Show this item on topics/replies';
  }  
function itemshow_item3_checkbox() {
	global $rpi_options ;
	$itemshowitem3 =  $rpi_options['itemshow_item3'] ;
	echo '<input name="rpi_settings[itemshow_item3]" id="rpi_settings[itemshow_item3]" type="checkbox" value="1" class="code" ' . checked( 1,$itemshowitem3, false ) . ' /> Show this item on topics/replies';
  }  
  
function itemshow_item4_checkbox() {
	global $rpi_options ;
	$itemshowitem4 =  $rpi_options['itemshow_item4'] ;
	echo '<input name="rpi_settings[itemshow_item4]" id="rpi_settings[itemshow_item4]" type="checkbox" value="1" class="code" ' . checked( 1,$itemshowitem4, false ) . ' /> Show this item on topics/replies';
  }  