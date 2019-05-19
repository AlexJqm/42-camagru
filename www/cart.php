<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");
include("database/db.php");
?>
<html>
	<head>


	<link rel="stylesheet" href="styles/style.css" media="all" />
	</head>

<body>

	<!--Main Container starts here-->
	<div class="main_wrapper">

		<!--Header starts here-->
		<div class="header_wrapper">

			<a href="index.php"><img id="logo" src="images/logo.png" /> </a>
		</div>
		<!--Header ends here-->

		<!--Navigation Bar starts-->
		<div class="menubar">

			<ul id="menu">
				<li><a href="index.php">Home</a></li>

				<li><a href="customer/my_account.php">My Account</a></li>

				<li><a href="cart.php">Shopping Cart</a></li>


			</ul>


		</div>
		<!--Navigation Bar ends-->

		<!--Content wrapper starts-->
		<div class="content_wrapper">

			<div id="sidebar">

				<div id="sidebar_titre">Categories</div>

				<ul id="cats">

				<?php getCats(); ?>

				<ul>
             </div>

			<div id="content_area">

			<?php panier(); ?>

			<div id="shopping_panier">

					<span style="float:right; font-size:17px; padding:5px; line-height:40px;">

					<?php
					if(isset($_SESSION['customer_email'])){
					echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "<b style='color:red;'>Your</b>" ;
					}
					else {
					echo "<b>Welcome Guest:</b>";
					}
					?>

					<b style="color:red">Shopping Cart -</b> Total Items: <?php total_items();?> Total Price: <?php total_prix(); ?> <a href="index.php" style="color:red">Back to Shop</a>

					<?php
					if (!isset($_SESSION['customer_email'])) {
					  echo "<a href='customer_login.php' style='color:orange;'>Login</a>";
					}
					else {
					echo "<a href='logout.php' style='color:orange;'>Logout</a>";
					}
					?>

					</span>
			</div>

				<div id="produits_box">

			<form action="" method="post" enctype="multipart/form-data">

				<table align="center" width="700" bgcolor="skyblue">

					<tr align="center">
						<th>Remove</th>
						<th>Product(S)</th>
						<th>Quantity</th>
						<th>Total Price</th>
					</tr>

          <?php
          $total = 0;
          global $con;
          $ip = getIp();
          $sel_prix = "select * from panier where ip_add='$ip'";
          $run_prix = mysqli_query($con, $sel_prix);
          while ($p_prix=mysqli_fetch_array($run_prix)) {
            $pro_id = $p_prix['p_id'];
            $pro_prix = "select * from produits where produit_id='$pro_id'";
            $run_pro_prix = mysqli_query($con,$pro_prix);
            $pp_prix = mysqli_fetch_array($run_pro_prix);
            $produit_prix = array($pp_prix['produit_prix']);
            $produit_titre = $pp_prix['produit_titre'];
            $produit_image = $pp_prix['produit_image'];
            $single_prix = $pp_prix['produit_prix'];
            $values = array_sum($produit_prix);
            $total += $values;
                ?>

                <tr align="center">
                  <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
                  <td><?php echo $produit_titre; ?></td>
                  <td><?php echo $p_prix['qty'];?></td>
                  <td><?php echo "$" . $single_prix; ?></td>
                </tr>


              <?php  } ?>

				<tr>
						<td colspan="4" align="right"><b>Sub Total:</b></td>
						<td><?php echo "$" . $total;?></td>
					</tr>

					<tr align="center">
						<td colspan="2"><input type="submit" name="update_panier" value="Update Cart"/></td>
						<td><input type="submit" name="continue" value="Continue Shopping" /></td>
						<td><button><a href="paypal_success.php" style="text-decoration:none; color:black;">Checkout</a></button></td>
					</tr>

				</table>

			</form>

	<?php
	function updatepanier(){
		global $con;
		$ip = getIp();
		if(isset($_POST['update_panier'])){
			foreach($_POST['remove'] as $remove_id){
			$delete_produit = "delete from panier where p_id='$remove_id' AND ip_add='$ip'";
			$run_delete = mysqli_query($con, $delete_produit);
			if($run_delete){
			echo "<script>window.open('cart.php','_self')</script>";
			}
			}
		}
		if(isset($_POST['continue'])){
		echo "<script>window.open('index.php','_self')</script>";
		}
	}
	echo @$up_panier = updatepanier();
	?>


				</div>

			</div>
		</div>
		<!--Content wrapper ends-->



		<div id="footer">

		<h2 style="text-align:center; padding-top:30px;">&copy; Name Name</h2>

		</div>






	</div>
<!--Main Container ends here-->


</body>
</html>
