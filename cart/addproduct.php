<?php include('connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Product</title>
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
    <form action="" method="post" enctype="multipart/form-data">
    <h1>Add PRoduct</h1>
    <table>
        <tr>
            <td>
            <label for="">Product Name</label>
            </td>
            <td>
            <input type="text" name="pname" id="" class="form-control">
            </td>
        </tr>
        <tr>
            <td>
            <label for="">Product Image</label>
            </td>
            <td>
            <input type="file" name="p_img" id="" class="form-control">
            </td>
        </tr>
        <tr>
            <td>
            <label for="">Product Price</label>
            </td>
            <td>
            <input type="text" name="prate" id="" class="form-control">
            </td>
        </tr>
        <tr>
            <td>
            <label for="">Product Quantity</label>
            </td>
            <td>
            <input type="text" name="qty" id="" class="form-control">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
            <input type="submit" value="Add Product" name="submit" class="btn btn-success">
            </td>
        </tr>
    </table>
    </form>
    <?php 
    
       

    if (isset($_POST['submit'])) { 
  
        $pname=$_POST["pname"];
        $prate=$_POST["prate"];
        $qty=$_POST["qty"];
        $filename = $_FILES["p_img"]["name"]; 
        $tempname = $_FILES["p_img"]["tmp_name"];     
        $folder = "uploads/".$filename; 
              
        $db = mysqli_connect("localhost", "root", "root", "cart"); 
      
            // Get all the submitted data from the form 
            $sql = "INSERT INTO `tbl_product`(`pid`, `pname`, `p_img`,`prate`,`qty`) VALUES (null,'$pname','$filename','$prate','$qty')"; 
      
            // Execute query 
            mysqli_query($db, $sql); 
              
            // Now let's move the uploaded image into the folder: image 
            if (move_uploaded_file($tempname, $folder))  { 
                $msg = "Image uploaded successfully"; 
            }else{ 
                $msg = "Failed to upload image"; 
          } 
      } 
    
    
    ?>
</body>
</html>