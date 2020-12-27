
<div class="container mt-4">
<?php 

session_start();
$pid=$_POST['pid'];
$qty=$_POST['qty'];

if(isset($_SESSION['productcart']))
{   
    $current=$_SESSION['counter']+1;
    $_SESSION['productcart'][$current]=$pid;
    $_SESSION['qtycart'][$current]=$qty;
    $_SESSION['counter']=$current;

}
else
{
    $productcart=array();
    $qtycart=array();

    $_SESSION['productcart'][0]=$pid;
    $_SESSION['qtycart'][0]=$qty;
    $_SESSION['counter']=0;
}

header('location:viewcart.php');

?>
</div>
</body>
</html>
