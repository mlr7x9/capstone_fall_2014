<?php
    // unregister sidebar to remove left sidebar of Twenty Fourteen
 
function remove_left_sidebar(){
 
    unregister_sidebar( 'sidebar-1' );
 
}
 
add_action( 'widgets_init', 'remove_left_sidebar', 11 );
?>