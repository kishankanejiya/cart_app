<?php  session_start(); include('connect.php'); 

if(!isset($_SESSION['uname']) && isset($_SESSION['password']))
{
    header('location:index.php');
}
?>

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
    <table class="table table-hover table-bordered table-striped">
        <tr>
            <td>Product Name</td>
            <td>Quantity</td>
            <td>Amount</td>
            <td>Select Qty</td>
            <td>Cart</td>
        </tr>
        <?php
        
        $sql="SELECT tbl_stock.`sid`,tbl_product.`pid`,tbl_product.`p_img`,tbl_stock.`qty`, tbl_product.pname, tbl_product.prate FROM `tbl_stock` INNER JOIN tbl_product ON tbl_stock.pid=tbl_product.pid";
        $run=mysqli_query($conn,$sql);
        if(!$run)
        {
            ?>
            <script>
            alert('Error');
            </script>
            <?php
        }
        else
        {
           while($row=mysqli_fetch_assoc($run))
           {
               ?>
               <form action="cart.php" method="post">
               <tr>
                    <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
                    <td><?php echo $row['pname']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td><img src="./uploads/<?php echo $row['p_img'] ?>" class="img-fluid" alt=""></td>
                    <td><?php echo $row['prate']; ?></td>
                    <td><input type="number" name="qty" min="1" max="5"></td>
                    <td><input type="submit" value="Add To Cart" name="addcart" class="btn btn-success"></td>
               </tr>
               </form>
               <?php
           }
        }
        
        
        
        ?>

       

    </table>
</div>
</body>
</html>