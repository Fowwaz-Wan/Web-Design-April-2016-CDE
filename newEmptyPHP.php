<?php
session_start();
if(isset($_SESSION['login_user'])!="")
{
	header("Location: index.php");
}
include_once 'mysqli_connect.php';
if(isset($_POST['submit']))
{
	$uname = $MySQLi_CON->real_escape_string(trim($_POST['username']));
	$email = $MySQLi_CON->real_escape_string(trim($_POST['email']));
	$upass = $MySQLi_CON->real_escape_string(trim($_POST['pwd1']));
	
	
	$check_username = $MySQLi_CON->query("SELECT username FROM user WHERE username='$uname'");
                  $check_email = $MySQLi_CON->query("SELECT email FROM user WHERE email='$email'");
	$count=$check_username->num_rows;
                 $count1=$check_email->num_rows;
	
	if($count==0 && $count1==0){
		
		
		$query = "INSERT INTO user(username,email,password) VALUES('$uname','$email','$upass')";
		
		if($MySQLi_CON->query($query))
		{
			$msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
					</div>";
		}
		else
		{
			$msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
					</div>";
		}
	}
	else{
		
		
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry username or email already taken !
				</div>";
			
	}
	
	$MySQLi_CON->close();
}
?>

<?php 
                                if(isset($_SESSION['userSession'])){
                                    echo '<!-- Dropdown Menu -->
                                        <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Profile<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                        <li><a href="user_page.php">View Profile</a></li>
                                        <li><a href="update_profile.php">Update Profile</a></li>
                                        <li><a href="change_password.php">Change Password</a></li>
                                        </ul>
                                        </li><!-- End of Dropdown Menu -->'
                                    .'<li><a href="log_out.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign Out</a></li>';
                                }
                                else{
                                    echo'<li><a href="sign_up.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</a></li>'
                                    . '<li><a href="log_in.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In</a></li>';
                                }
                                ?>