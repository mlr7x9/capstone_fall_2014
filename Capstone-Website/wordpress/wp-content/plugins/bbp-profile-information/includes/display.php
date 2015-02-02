<?php


/*******************************************
* bbp profile Information Display Functions
*******************************************/


 
function bbp_profile_information () 
//This function adds the item and label if required to the author section of topics/replies

{
		global $rpi_options;
		
		echo '<ul>';
		$user_id = bbp_get_reply_author_id( $reply_id );
		
		//show item1 if activated & show on topics
		if ($rpi_options['Activate_item1']== true && $rpi_options['itemshow_item1'] == true) {
			echo '<li>' ; 
			//show label if required
				if($rpi_options['labelshow_item1'] == true) {
					echo $label1 =  $rpi_options['item1_label']." : " ;
				}
			$usermeta = get_userdata( $user_id, 'rpi_label1' );
			echo $usermeta->rpi_label1;
			echo '</li>' ;
		}
		
		//show item2 if activated & show on topics
		if ($rpi_options['Activate_item2']== true && $rpi_options['itemshow_item2'] == true) {
			echo '<li>' ; 
			//show label if required
				if($rpi_options['labelshow_item2'] == true) {
					echo $label2 =  $rpi_options['item2_label']." : " ;
				}
			$usermeta = get_userdata( $user_id, 'rpi_label2' );
			echo $usermeta->rpi_label2;
			echo '</li>' ;
		}
		
		//show item3 if activated & show on topics
		if ($rpi_options['Activate_item3']== true && $rpi_options['itemshow_item3'] == true) {
			echo '<li>' ; 
			//show label if required
				if($rpi_options['labelshow_item3'] == true) {
					echo $label3 =  $rpi_options['item3_label']." : " ;
				}
			$usermeta = get_userdata( $user_id, 'rpi_label3' );
			echo $usermeta->rpi_label3;
			echo '</li>' ;
		}
		
		//show item4 if activated on topics/replies
		if ($rpi_options['Activate_item4']== true && $rpi_options['itemshow_item4'] == true) {
			echo '<li>' ; 
			//show label if required
				if($rpi_options['labelshow_item4'] == true) {
					echo $label4 =  $rpi_options['item4_label']." : " ;
				}
			$usermeta = get_userdata( $user_id, 'rpi_label4' );
			echo $usermeta->rpi_label4;
			echo '</li>' ;
		}
		
}
add_action ('bbp_theme_after_reply_author_details', 'bbp_profile_information') ;


function user_profile_bbp_profile_information()
//this function adds the items to the profile display menu, and if the user can edit other users display first, lastname and email
			{
			global $rpi_options;
			
			//item 1
			if ($rpi_options['Activate_item1']== true) {
			$label1 =  $rpi_options['item1_label'] ;
			echo "<p>" ;
			printf ( __( $label1.' : ', 'bbpress' ));
			echo esc_attr( bbp_get_displayed_user_field( 'rpi_label1' )); 
			echo"</p>" ;
			}
			
			//item 2
			if ($rpi_options['Activate_item2']== true) {
			$label2 =  $rpi_options['item2_label'] ;
			echo "<p>" ;
			printf ( __( $label2.' : ', 'bbpress' ));
			echo esc_attr( bbp_get_displayed_user_field( 'rpi_label2' )); 
			echo"</p>" ;
			}
			
			//item 3
			if ($rpi_options['Activate_item3']== true) {
			$label3 =  $rpi_options['item3_label'] ;
			echo "<p>" ;
			printf ( __( $label3.' : ', 'bbpress' ));
			echo esc_attr( bbp_get_displayed_user_field( 'rpi_label3' )); 
			echo"</p>" ;
			}
			
			//item 4
			if ($rpi_options['Activate_item4']== true) {
			$label4 =  $rpi_options['item4_label'] ;
			echo "<p>" ;
			printf ( __( $label4.' : ', 'bbpress' ));
			echo esc_attr( bbp_get_displayed_user_field( 'rpi_label4' )); 
			echo"</p>" ;
			}
			
			
			if ( current_user_can( 'edit_users' ) ) {
			//echo "<p class="bbp-user-first-name">" ;
			printf ( __( 'First name: %s', 'bbpress' ), bbp_get_displayed_user_field( 'first_name'));
			echo "</p>" ;
			//echo "<p class="bbp-user-last-name">" ;
			printf ( __( 'Last name: %s', 'bbpress' ), bbp_get_displayed_user_field( 'last_name'));
			echo "</p>" ;
			echo "<p>" ;
			printf ( __( 'Email: ', 'bbpress' ));
			echo esc_attr( bbp_get_displayed_user_field( 'user_email' ));
			echo "</p>" ;
			}
			
			}
			
add_action ('bbp_template_after_user_profile', 'user_profile_bbp_profile_information') ;



function edit_bbp_profile_information()
//This function hooks to form-user-edit to add user ability to edit items
			{
			global $rpi_options;
			$user_id = esc_attr( bbp_get_displayed_user_field( 'ID' )) ;
			
			//item 1
			if ($rpi_options['Activate_item1']== true) {
			$label1 =  $rpi_options['item1_label'] ;
			echo "<div>" ;			
			echo "<label for=\"rpi_label1\">".$label1 ;
			echo "</label>" ;
			$rpi_label1 = esc_attr(bbp_get_displayed_user_field( 'rpi_label1'));
			$quote= "<input type=\"text\" name=\"rpi_label1\" id=\"rpi_label1\" value=\"".$rpi_label1."\" />" ;
			echo $quote ;
			}
			
			//item 2
			if ($rpi_options['Activate_item2']== true) {
			$label2 =  $rpi_options['item2_label'] ;
			echo "<div>" ;
			$user_id = esc_attr( bbp_get_displayed_user_field( 'ID' )) ;
			echo "<label for=\"rpi_label2\">".$label2 ;
			echo "</label>" ;
			$rpi_label2 = esc_attr(bbp_get_displayed_user_field( 'rpi_label2'));
			$quote= "<input type=\"text\" name=\"rpi_label2\" id=\"rpi_label2\" value=\"".$rpi_label2."\" />" ;
			echo $quote ;
			}
			
			//item 3
			if ($rpi_options['Activate_item3']== true) {
			$label3 =  $rpi_options['item3_label'] ;
			echo "<div>" ;
			echo "<label for=\"rpi_label3\">".$label3 ;
			echo "</label>" ;
			$rpi_label3 = esc_attr(bbp_get_displayed_user_field( 'rpi_label3'));
			$quote= "<input type=\"text\" name=\"rpi_label3\" id=\"rpi_label3\" value=\"".$rpi_label3."\" />" ;
			echo $quote ;
			}
			
			//item 4
			if ($rpi_options['Activate_item4']== true) {
			$label4 =  $rpi_options['item4_label'] ;
			echo "<div>" ;
			echo "<label for=\"rpi_label4\">".$label4 ;
			echo "</label>" ;
			$rpi_label4 = esc_attr(bbp_get_displayed_user_field( 'rpi_label4'));
			$quote= "<input type=\"text\" name=\"rpi_label4\" id=\"rpi_label4\" value=\"".$rpi_label4."\" />" ;
			echo $quote ;
			}
			
			
			
			
			}
add_action ('bbp_user_edit_after_name', 'edit_bbp_profile_information') ;
			
			
		
//this function adds the updated items info to the usermeta database
function bbp_edit_user_bbp_profile_information( $user_id ) {
	$rpi_label1 = ( $_POST['rpi_label1'] ) ;
	$rpi_label2 = ($_POST['rpi_label2'] ) ;
	$rpi_label3 = ($_POST['rpi_label3'] ) ;
	$rpi_label4 = ($_POST['rpi_label4'] ) ;

	// Update rpi_label1 user meta
	if ( !empty( $rpi_label1 ) )
		update_user_meta( $user_id, 'rpi_label1', $rpi_label1);

	// Delete rpi_label1 user meta
	else
		delete_user_meta( $user_id, 'rpi_label1' );
		
	//Update rpi_label2 user meta
	if ( !empty( $rpi_label2 ) )
		update_user_meta( $user_id, 'rpi_label2', $rpi_label2);

	// Delete rpi_label2 user meta
	else
		delete_user_meta( $user_id, 'rpi_label2' );
		
		//Update rpi_label3 user meta
	if ( !empty( $rpi_label3 ) )
		update_user_meta( $user_id, 'rpi_label3', $rpi_label3);

	// Delete rpi_label2 user meta
	else
		delete_user_meta( $user_id, 'rpi_label3' );
		
		//Update rpi_label4 user meta
	if ( !empty( $rpi_label4 ) )
		update_user_meta( $user_id, 'rpi_label4', $rpi_label4);

	// Delete rpi_label4 user meta
	else
		delete_user_meta( $user_id, 'rpi_label4' );
		
		
}

add_action( 'personal_options_update',         'bbp_edit_user_bbp_profile_information' );
add_action( 'edit_user_profile_update',        'bbp_edit_user_bbp_profile_information' );

?>
