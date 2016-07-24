<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>
            <?php
                if(defined('Title')){
                    print Title;
                }else{
                    print 'MangaRead';
                }
            ?>
        </title>
        <link rel="stylesheet" href="style.css"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="validation.js"></script>
    </head>
    <body>
        
        <h1 align="center" class="title"><a href="index.php">MangaRead</a></h1>
            <table style="width: 40%;height: 10%" align="center">
            <tr>
                <?php
                if(isset($_SESSION['userSession'])){
                   echo' <td class="menu"><a href="index.php">Home</a></td>
                        <td class="menu"><a href="profile.php">Profile</a></td>
                    <td class="menu"><a href="comment.php">Comment</a></td>
                   
                    <td class="menu"><a href="logout.php">Log Out</a></td>';
                }
                else{
                    echo' <td class="menu"><a href="index.php">Home</a></td>
                   <td class="menu"><a href="register.php">Register</a></td>
                    <td class="menu"><a href="comment.php">Comment</a></td>
                    
                    <td class="menu"><a href="login.php">Login</a></td>';
                }
                ?>
            </tr>
        </table>