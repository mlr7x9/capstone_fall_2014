<?php
/*
 Template Name: Custom Login
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

	<div class="login-wrapper">
		<div class="pawprint-login d-1of2">
    <div class="login-title"><p>Login</p></div>
    <p>Students, alumni & faculty please login with your <b>pawprint</b> and respective password. </p>
    <p>Recruiters and employees must register before being able to sign in.</p>
    <?php if(isset($_GET['login']) && $_GET['login'] == 'failed')
{
  ?>
    <div id="login-error">
      <p>Login failed, try again.</p>
    </div>
  <?php
} ?>
    <?php if(isset($_GET['login']) && $_GET['login'] == 'empty')
{
  ?>
    <div id="login-error">
      <p>!! Login failed, try again. !!</p>
    </div>
  <?php
} ?>
      <?php  
      $args = array(  
    'redirect' => home_url(), 
    'label_username' => __( 'Pawprint' ),
    'id_username' => 'user',  
    'id_password' => 'pass', 
    'remember' => false 
   ); ?>  
   <?php wp_login_form( $args ); ?>  
    </div>
    <div class="registration-login d-2of2">
      <div class="login-title"><p>Registration</p></div>
      <p>Recruiters and employees please create an account below.</p>
      <?php custom_registration_function(); ?>
    </div>
  </div>


<?php get_footer(); ?>
