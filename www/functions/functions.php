<?php
$con = mysqli_connect("192.168.99.100:3306","root","root","db_rush");
if (mysqli_connect_errno())
  {
  echo "The Connection was not established: " . mysqli_connect_error();
  }
 // getting the user IP address
  function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $ip;
}
//creating the shopping panier
function panier(){
if(isset($_GET['add_panier'])){
	global $con;
	$ip = getIp();
	$pro_id = $_GET['add_panier'];
	$check_pro = "select * from panier where ip_add='$ip' AND p_id='$pro_id'";
	$run_check = mysqli_query($con, $check_pro);
	if(mysqli_num_rows($run_check)>0){
	echo "";
	}
	else {
	$insert_pro = "insert into panier (p_id,ip_add) values ('$pro_id','$ip')";
	$run_pro = mysqli_query($con, $insert_pro);
	echo "<script>window.open('index.php','_self')</script>";
	}
}
}
 // getting the total added items
 function total_items(){
	if(isset($_GET['add_panier'])){
		global $con;
		$ip = getIp();
		$get_items = "select * from panier where ip_add='$ip'";
		$run_items = mysqli_query($con, $get_items);
		$count_items = mysqli_num_rows($run_items);
		}
		else {
		global $con;
		$ip = getIp();
		$get_items = "select * from panier where ip_add='$ip'";
		$run_items = mysqli_query($con, $get_items);
		$count_items = mysqli_num_rows($run_items);
		}
	echo $count_items;
	}
// Getting the total prix of the items in the panier
	function total_prix(){
		$total = 0;
		global $con;
		$ip = getIp();
		$sel_prix = "select * from panier where ip_add='$ip'";
		$run_prix = mysqli_query($con, $sel_prix);
		while($p_prix=mysqli_fetch_array($run_prix)){
			$pro_id = $p_prix['p_id'];
			$pro_prix = "select * from produits where produit_id='$pro_id'";
			$run_pro_prix = mysqli_query($con,$pro_prix);
			while ($pp_prix = mysqli_fetch_array($run_pro_prix)){
			$produit_prix = array($pp_prix['produit_prix']);
			$values = array_sum($produit_prix);
			$total +=$values;
			}
		}
		echo "$" . $total;
	}
//getting the categories
function getCats(){
	global $con;
	$get_cats = "select * from categories";
	$run_cats = mysqli_query($con, $get_cats);
	while ($row_cats=mysqli_fetch_array($run_cats)){
		$cat_id = $row_cats['cat_id'];
		$cat_titre = $row_cats['cat_titre'];
	echo "<li><a href='index.php?cat=$cat_id'>$cat_titre</a></li>";
	}
}
function getPro(){
	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){
	global $con;
	$get_pro = "select * from produits order by RAND() LIMIT 0,6";
	$run_pro = mysqli_query($con, $get_pro);
	while($row_pro=mysqli_fetch_array($run_pro)){
		$pro_id = $row_pro['produit_id'];
		$pro_cat = $row_pro['produit_cat'];
		$pro_brand = $row_pro['produit_brand'];
		$pro_titre = $row_pro['produit_titre'];
		$pro_prix = $row_pro['produit_prix'];
		$pro_image = $row_pro['produit_image'];
		echo "
				<div id='single_produit'>
					<h3>$pro_titre</h3>
					<img src='admin_area/produit_images/$pro_image' width='180' height='180' />
					<p><b> Price: $ $pro_prix </b></p>
					<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
					<a href='index.php?add_panier=$pro_id'><button style='float:right'>Add to Cart</button></a>
				</div>
		";
	}
	}
}
}
function getCatPro(){
	if(isset($_GET['cat'])){
		$cat_id = $_GET['cat'];
	global $con;
	$get_cat_pro = "select * from produits where produit_cat='$cat_id'";
	$run_cat_pro = mysqli_query($con, $get_cat_pro);
	$count_cats = mysqli_num_rows($run_cat_pro);
	if($count_cats==0){
	echo "<h2 style='padding:20px;'>No produits where found in this category!</h2>";
	}
	while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
		$pro_id = $row_cat_pro['produit_id'];
		$pro_cat = $row_cat_pro['produit_cat'];
		$pro_brand = $row_cat_pro['produit_brand'];
		$pro_titre = $row_cat_pro['produit_titre'];
		$pro_prix = $row_cat_pro['produit_prix'];
		$pro_image = $row_cat_pro['produit_image'];
		echo "
				<div id='single_produit'>
					<h3>$pro_titre</h3>
					<img src='admin_area/produit_images/$pro_image' width='180' height='180' />
					<p><b> $ $pro_prix </b></p>
					<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
					<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
				</div>
		";
	}
}
}
?>
