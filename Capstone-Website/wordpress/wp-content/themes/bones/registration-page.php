<?php
/*
 Template Name: Custom Registration
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

  		<div class="employer-login d-1of2">
   		 <form class="recruiter-login">       
   		   <h2 class="recruiter-login-heading"> Recruiter Login</h2>
    	   <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
    	   <input type="password" class="form-control" name="pass" placeholder="Password" required=""/>      

    	   <button class="login-btn" type="submit">Login</button>
    	   <button class="register-btn" type="button">Register</button>   
   		 </form>
  		</div>
		
<?php get_footer(); ?>
