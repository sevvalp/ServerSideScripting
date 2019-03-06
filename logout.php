<?php 
include('server.php');
                if(isset($_SESSION['name']))
                {
                unset($_SESSION['name']);
                }
                echo '<h1>You have been successfully logged out</h1>';
?>