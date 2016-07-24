<?php
session_start();
define('Title', 'Forget Password');
require('header.php');
include_once 'mysqli_connect.php';
$connection = mysqli_connect('localhost', 'root', '');
mysqli_select_db($connection,'thedb');   
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        
        $query = "SELECT password,email FROM account WHERE username = '$username'";
        $result = mysqli_query($connection,$query);
        $rows = mysqli_fetch_array($result,MYSQLI_BOTH);
        $email = $rows['email'];
        $pass = $rows['password'];
            if((!empty($_POST['username']))&&(!empty($_POST['email']))){
                if(($_POST['email']== $email)){
                    echo '<p align="center"><b>Your password is '.$pass.'</b></p>';
                
                }else{
               echo 'Invalid Email';
            }
        }else{
            echo '<h1 align="centre">Please Enter Your Username and Email</h1>';
        }
    }else{
        print '<form action="forget.php" method="post">'
        .'<table align="center">'
                .'<tr>'
                    .'<td>'
                        . '<p>Username:'
                    .'</td>'
                    .'<td>'
                        .'<input type="text" name="username" size="20"/></p>'
                    .'</td>'
                .'</tr>'
                .'<tr>'
                    .'<td>'
                        . '<p>Email:'
                    .'</td>'
                    .'<td>'
                        .'<input type="text" name="email" size="50"/></p>'
                    .'</td>'
                .'</tr>'
                .'<tr>'
                    .'<td>'
                    .'</td>'
                    .'<td>'
                        . '<p><input type="submit" name="submit" name="submit" value"login"/></p>'      
                    .'</td>'
                .'</tr>'
            .'</table>'
        . '</form>';
    }
?>

</body>
</html>