<?php

include 'vars.php';

/*checks to see if user is logged in already and redirects*/
/*include this file at the top of any page you would like to
  require authentication for and it will automatically redirect
  to the login page :) */

        if(!isset($_COOKIE['user'])){
                header("Location: ".$login_url);
        }
?>
