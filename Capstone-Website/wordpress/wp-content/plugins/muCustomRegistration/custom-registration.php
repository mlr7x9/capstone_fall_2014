<?php
/*
  Plugin Name: MU Custom Registration Form
  Plugin URI: None
  Description: Custom reigstration form for the purposes of CROP capstone project
  Version: 1.0
  Author: Philip Cressler
  Author URI: None
 */

  function registration_form( $username, $password, $email, $company, $first_name, $last_name) {
    echo '
    <style>
    .registration {
        margin-bottom:2px;
    }
     
    input{
        margin-bottom:4px;
    }

    </style>
    ';
 
    echo '
    <form class="pure-form pure-form-aligned registration-form-css" action="' . $_SERVER['REQUEST_URI'] . '" method="post">
    <div class="pure-control-group">
    <label for="username">Username (required)</label>
    <input type="text" name="username" value="' . ( isset( $_POST['username'] ) ? $username : null ) . '">
    </div>
    <div class="pure-control-group">
    <label for="password">Password (required)</label>
    <input type="password" name="password" id="password" value="' . ( isset( $_POST['password'] ) ? $password : null ) . '">
    </div>
     
    <div class="pure-control-group">
    <label for="email">Email (required)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="email" value="' . ( isset( $_POST['email']) ? $email : null ) . '">
    </div>
    <div class="pure-control-group">
    <label for="company">Company&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="company" value="' . ( isset( $_POST['company']) ? $company : null ) . '">
    </div>
    <div class="pure-control-group">
    <label for="firstname">First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="fname" value="' . ( isset( $_POST['fname']) ? $first_name : null ) . '">
    </div>
    <div class="pure-control-group">
    <label for="lastname">Last Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="lname" value="' . ( isset( $_POST['lname']) ? $last_name : null ) . '">
    </div>
    <div class="custom-submit-div">
    <input type="submit" class="register-btn" name="submit" value="Register"/>
    </div>
    </form>
    ';
}

function registration_validation( $username, $password, $email, $company, $first_name, $last_name )  {

	global $reg_errors;
	$reg_errors = new WP_Error;
	if ( empty( $username ) || empty( $password ) || empty( $email ) || empty( $company ) )
	{
    	$reg_errors->add('field', 'Required form field is missing');
 	}
 	if ( 4 > strlen( $username ) ) {
    $reg_errors->add( 'username_length', 'Username too short. At least 4 characters is required' );
	}
	if ( username_exists( $username ) )
    $reg_errors->add('user_name', 'Sorry, that username already exists!');
	if ( ! validate_username( $username ) ) {
    $reg_errors->add( 'username_invalid', 'Sorry, the username you entered is not valid' );
	}
	if ( 5 > strlen( $password ) ) {
        $reg_errors->add( 'password', 'Password length must be greater than 5' );
    }
    if ( !is_email( $email ) ) {
    $reg_errors->add( 'email_invalid', 'Email is not valid' );
	}
	if ( email_exists( $email ) ) {
    $reg_errors->add( 'email', 'Email Already in use' );
	}
	if ( is_wp_error( $reg_errors ) ) {
 
    foreach ( $reg_errors->get_error_messages() as $error ) {
     
        echo "<div id='registration-error'>";
        echo $error . '<br/>';
        echo '</div>';
         
    }
}
}

function complete_registration() {
    global $reg_errors, $username, $password, $email, $company, $first_name, $last_name;
    if ( 1 > count( $reg_errors->get_error_messages() ) ) {
        $userdata = array(
        'user_login'    =>   $username,
        'user_email'    =>   $email,
        'user_pass'     =>   $password,
        'user_company'  =>   $website,
        'first_name'    =>   $first_name,
        'last_name'     =>   $last_name
        );
        $user = wp_insert_user( $userdata );
        echo "<div id='success is_valid'/> Registration complete. Please wait for a confirmation email. This may take a while. </div>";   
    }
}
function custom_registration_function() {
    if ( isset($_POST['submit'] ) ) {
        registration_validation(
        $_POST['username'],
        $_POST['password'],
        $_POST['email'],
        $_POST['company'],
        $_POST['fname'],
        $_POST['lname']
        );
         
        // sanitize user form input
        global $username, $password, $email, $company, $first_name, $last_name;
        $username   =   sanitize_user( $_POST['username'] );
        $password   =   esc_attr( $_POST['password'] );
        $email      =   sanitize_email( $_POST['email'] );
        $website    =   sanitize_text_field( $_POST['company'] );
        $first_name =   sanitize_text_field( $_POST['fname'] );
        $last_name  =   sanitize_text_field( $_POST['lname'] );
 
        // call @function complete_registration to create the user
        // only when no WP_error is found
        complete_registration(
        $username,
        $password,
        $email,
        $company,
        $first_name,
        $last_name
        );
    }
 
    registration_form(
        $username,
        $password,
        $email,
        $company,
        $first_name,
        $last_name
        );
}

// Register a new shortcode: [mu_custom_registration]
add_shortcode( 'mu_custom_registration', 'custom_registration_shortcode' );
 
// The callback function that will replace [book]
function custom_registration_shortcode() {
    ob_start();
    custom_registration_function();
    return ob_get_clean();
}
?>