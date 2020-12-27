<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container justify-content-center">
<a href="logout.php" class="btn btn-danger">Logout, <?php echo $_SESSION['uname']; ?></a>
</div>
<div class="container mt-4">
<?php 

require_once('connect.php');
session_start();
?>
<table class="table table-hover table-stripped">
<?php

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    unset($_SESSION['productcart'][$id]);
    unset($_SESSION['qtycart'][$id]);
}

$subtotaltemp=array();
$grandtotal=array();
$i=0;
if(isset($_SESSION['productcart']) && !empty($_SESSION['productcart']))
{
    echo "<a href='order.php' class='btn btn-success'>Buy Products</a>";
    foreach($_SESSION['productcart'] as $key => $value)
    {
        $i++;
        $product="SELECT `pname`, `prate` FROM `tbl_product` WHERE `pid`='{$value}'";
        $run=mysqli_query($conn,$product);
        $productdetail=mysqli_fetch_array($run);
        $qty1=$_SESSION['qtycart'][$key];
        $subtotaltemp=$productdetail['prate'] * $qty1;
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $productdetail['pname']; ?></td>
            <td><?php echo $productdetail['prate']; ?></td>
            <td><?php echo $qty1; ?></td>
            <td><?php echo $subtotaltemp; ?></td>
            <td><a href="?id=<?php echo $key; ?>">Remove</a></td>
        </tr>
        <?php
        $grandtotal[]=$subtotaltemp;
         
    }

    $finalsum=array_sum($grandtotal);
    ?>
    <tr>
        <td></td>
        <td></td>
        <td><?php echo $finalsum; ?></td>
    </tr>
    <?php
}
else
{
    echo "cart is empty";
    echo "<a href='order.php' class='btn btn-success'>Buy Products</a>";
}
?>
</table>
<?php



?>
