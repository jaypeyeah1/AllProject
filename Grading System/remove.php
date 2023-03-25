<?php 
include_once("connection.php");

if(isset($_GET['contactID']))
         {
             $contactID = $_GET['contactID'];
             $sql = " DELETE FROM contact WHERE contactID = '".$contactID."'";
             $result = mysqli_query($conn,$sql);
             if($result)
             {
                echo "<script>alert('Successfully Deleted!')</script>";
                echo "<script>window.open('home.php','_self')</script>";
             }
             else
             {
                 echo ' Please Check Your Query ';
             }
        }
         else
         {
             header("location:home.php");
         }

?>