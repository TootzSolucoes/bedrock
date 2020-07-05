<?php

add_filter( 'show_admin_bar' , 'my_function_admin_bar' );
function my_function_admin_bar() {
  return false;
}
