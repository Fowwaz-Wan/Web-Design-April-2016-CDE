<?php
session_start();
define('Title', 'Profile');
require('header.php');
include_once 'mysqli_connect.php';
$connection = mysqli_connect('localhost', 'root', '');
mysqli_select_db( $connection,'thedb');
        $username = $_SESSION['userSession'];
        $query = "SELECT password,email FROM account WHERE username = '$username'";
        $result = mysqli_query($connection, $query);
        $rows = mysqli_fetch_array($result, MYSQLI_BOTH);
        
        $pass=$rows['password'];
        $email=$rows['email'];
       
    if(isset($_POST['submit'])){ 
        header("Location: editprofile.php");
    }    

?>

<form action="profile.php" method="post">
    <table align="center">
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="password" disabled="disabled" value="<?php echo $username; ?>"></td>
                </tr>   
                <tr>
                    <td>Password: </td>
                    <td><input type="text" name="password" disabled="disabled" value="<?php echo $pass; ?>"></td>
                </tr>   
                <tr>
                    <td>Email: </td>
                    <td><input type="text" name="email" disabled="disabled" value="<?php echo $email; ?>"></td>
                </tr>
               
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" align="center" value="Change"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>