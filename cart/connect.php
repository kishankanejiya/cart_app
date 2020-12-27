<?php 

$server="localhost";
$user="root";
$password="root";
$db="cart";
$conn=mysqli_connect($server,$user,$password,$db);
if(!$conn)
{
    ?>
    <script>
    alert('Error');
    </script>
    <?php
}
?>