<?php
session_start();
define('Title', 'Profile');
require('header.php');
include_once 'mysqli_connect.php';
$connection = mysqli_connect('localhost', 'root', '');
mysqli_select_db($connection,'thedb');
        $username = $_SESSION['userSession'];
        $query = "SELECT password,email FROM account WHERE username = '$username'";
        $result = mysqli_query($connection,$query);
        $rows = mysqli_fetch_array($result,MYSQLI_BOTH);
        $pass=$rows['password'];
        $email=$rows['email'];
        
    if(isset($_POST['submit'])){ 
        $username = $_SESSION['userSession'];
        $password= $MySQLi_CON->real_escape_string(trim($_POST['password']));
        $email= $MySQLi_CON->real_escape_string(trim($_POST['email']));
        $query = "UPDATE account SET password='$password',email='$email' WHERE username='$username'";
        header("Location: profile.php");
        
        if($MySQLi_CON->query($query)){
			$msg = "<div class='alert alert-success' align='center'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Successfully Update !
					</div>";
                        echo 'Sucess';
		}
		else
		{
			$msg = "<div class='alert alert-danger' align='center'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error While Updating !
					</div>";
                        echo $msg;
		}
    }    

?>

<form action="editprofile.php" method="post">
    <table align="center">
                <tr>
                    <td>UserName: </td>
                    <td><?php echo $username; ?></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="text" name="password" value="<?php echo $pass; ?>"></td>
                </tr>   
                <tr>
                    <td>Email: </td>
                    <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
                </tr>
                
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" align="center" value="Submit"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>