<?php
session_start();
define('Title', 'Comments');
require('header.php');
include_once 'mysqli_connect.php';

if(isset($_SESSION['userSession'])=="")
    {
            header("Location: commentfail.php");
    }
    
    if(isset($_POST['submit'])){ 
        if((!empty($_POST['Comment']))&&(!empty($_POST['Title']))&&(!empty($_POST['Review']))){
            $title= $MySQLi_CON->real_escape_string(trim($_POST['Title']));
            $review= $MySQLi_CON->real_escape_string(trim($_POST['Review']));
            $comment= $MySQLi_CON->real_escape_string(trim($_POST['Comment']));

            if ($title == "Bleach"){
                $c_id = "1";
            }
            if ($title == "Naruto"){
                $c_id = "2";
            }
            if ($title == "One Piece"){
                $c_id = "3";
            }
            if ($title == "Dragon Ball Z"){
                $c_id = "4";
            }
            if ($title == "One Punch Man"){
                $c_id = "5";
            }
            $username1 = $_SESSION['userSession'];
            
            $query = "INSERT INTO manga(Title,Review,Comment,username,c_id) VALUES ('$title','$review','$comment','$username1','$c_id')";
          
            if($MySQLi_CON->query($query)){
			$msg = "<div class='alert alert-success' align='center'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Your Comment Has been Succesfully Enetered !
					</div>";
                        echo $msg;
		}
		else
		{
			$msg = "<div class='alert alert-danger' align='center'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while commenting !
					</div>";
                        echo $msg;
		}
                
        }else{
            echo '<p align="center"><b>Please enter all the details</b></p>';
        }
        $MySQLi_CON->close();    
    }
    
?>

<form action="comment.php" method="post">
            <table align="center" name="t">
                <tr>
                    <td>Manga: </td>
                    <td><select name="Title">
                        <option value="">Manga</option>
                        <option value="Bleach">Bleach</option>
                        <option value="Naruto">Naruto</option>
                        <option value="One Piece">One Piece</option>
                        <option value="Dragon Ball Z">Dragon Ball Z</option>
                        <option value="One Punch Man">One Punch Man</option>
                </select></td>
                </tr>
                <tr>
                    <td>Your Rating: </td>
                    <td><select name="Review">
                      <option value="" >Your Rating</option>
                        <option value="The worst I've Read">The worst I've Read</option>
                        <option value="Bad">Bad</option>
                        <option value="It was ok">It was ok</option>
                        <option value="Amazingly Good">Amazingly good</option>
                        <option value="One of the Best, you should not miss out">One of the Best, you should not miss out</option>
                </select></td>
                </tr>
                <tr><br><br>
                    <td><br>Comment: </td>
                    <td><br><textarea name="Comment"  style="width: 100%;height: 150%;"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><br><br><input type="submit" align="center" name='submit' value="Send"/></td>
                </tr>
            </table>
                
</form>
