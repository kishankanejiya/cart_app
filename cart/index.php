<?php include('connect.php'); ?>
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
    <form action="" method="post">
    <table>
        <tr>
            <td>
            <label for="">USER NAME</label>
            </td>
            <td>
            <input type="text" name="uname" id="" class="form-control">
            </td>
        </tr>
        <tr>
            <td>
            <label for="">Password</label>
            </td>
            <td>
            <input type="password" name="password" id="" class="form-control">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
            <input type="submit" value="login" name="submit" class="btn btn-success">
            </td>
        </tr>
    </table>
    </form>
    <?php 
    
    if(isset($_POST['submit']))
    {
        $uname=$_POST['uname'];
        $password=$_POST['password'];
        $sql="SELECT * FROM `tbl_user` WHERE `uname`='$uname' AND `password`='$password'";
        $run=mysqli_query($conn,$sql);
        if(!$run)
        {
            ?>
            <script>
            alert('error');
            </script>
            <?php
        }
        else
        {
            $row=mysqli_num_rows($run);
            if($row>=1)
            {
                header('location:order.php');
                session_start();
                $_SESSION['uname']=$uname;
                $_SESSION['password']=$password;
            }
            else
            {
                ?>
                <script>
                alert('error');
                </script>
                <?php
                header('location:index.php');
            }
        }
    }
    
    
    ?>
</body>
</html>