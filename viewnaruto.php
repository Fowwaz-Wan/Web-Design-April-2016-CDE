<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        
    </head>
    <body>
        <?php
        session_start();
        define('Title', 'Comments');
        require('header.php');
        include_once 'mysqli_connect.php';
        $connection = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($connection, 'thedb');
        
        $c_id = "2";

if(isset($_SESSION['userSession'])=="")
    {
            header("Location: commentfail.php");
    }


    if(isset($_SESSION['userSession']))
        {
           $query = "SELECT Title,Review,Comment,username FROM manga WHERE c_id = $c_id;";
           $result = $MySQLi_CON->query($query);
           


           
               $row1 ="0";

              
                 print '<form action="viewnaruto.php" method="post" onsubmit="return checkForm(this);">'
                .'<table align="center">'
                .'<tr>'
                    .'<td><img src="Narutocover.png" style="width: 200px;height: 300px"></td>';
                
                     

                    while ($row = $result->fetch_assoc() ) {
                    print
                         
                  ' <tr><td class="book"><b><u>Reviews</u></b><br/><br/>'       
                .'UserName  :'.$row["username"].'<br/><br/>' 
                .'Rating    : '.$row["Review"].'<br/><br/>'
                .'Comments: '.$row["Comment"].'<br/>'  ;
                 
                
                       
                   
                   $row1++;
                      }
                print '</td>'
                
                .'</tr>'
                .'</table>'
                . '</form>';


                            if ($result->num_rows ==0) {
     
     
                     echo '<h1 align="center">Sorry But There Are No Comments Now</h1>';
            }
                        
                    
               
           
           
           
          

                
                
               
                    
                }
            $MySQLi_CON->close();    
    
    
?>
        
        
        
                     
</form>
    </body>
</html>
