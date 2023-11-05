<?php 
include('../includes/functions.php');

if (!isLoggedIn()) {
 $_SESSION['msg'] = "You must log in first";
 header('location: ../login_page/login.php');

}

?>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Dashboard</title>
		    <link rel="stylesheet" href="styledesign.css?v=<?php echo time();?>"/>
			<link rel="icon" href="../images/mactea.png">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
	</head>
	<body>

		<!--wrapper start-->
		<div class="wrapper">
			<!--header menu start-->
			<div class="header">
				<div class="header-menu">
					<div class="title">  <img src="../images/mactea-home.png" alt="..." height="70"></div>
					<div class="title"> Admin </div>
					<div class="sidebar-btn">
						<i class="fas fa-bars"></i>
					</div>
				</div>
			</div>
			<!--header menu end-->
			<!--sidebar start-->
				<?php include ('sidebar.php') ?>
			<!--sidebar end-->
			<!--main container start-->
				<div class="main-container">
            <!-- User record -->
			 <div style="margin:120px 10px 10px 10px; width: 350px; height: 100px; background-color: #000000; border-radius: 10px 10px 10px 10px; position: absolute;" class="col-md-12 mb-3">
							<p style="margin:50px 10px 10px 80px; font-size: 15px; font-family: 'Bahnschrift SemiBold',SANS-SERIF; color:#4CBB17; text-shadow: 2px 2px #2E8B57;">
						<?php 
						$user_type = 'user';
                       $query = "SELECT COUNT(*) FROM users WHERE user_type like '%$user_type%'";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s) </p>
					  <div style="font-size: 20px; margin:-55px 10px 10px 77px; font-family: 'Bahnschrift SemiBold',SANS-SERIF; color:#4CBB17; text-shadow: 2px 2px #2E8B57;">USER</div>
					  <div style="margin-left: 20px; margin-top: -33px; font-size: 20px; text-shadow: 2px 2px #2E8B57; color: #4CBB17;"class="col-auto">
                        <i class="fas fa-user-circle fa-2x text-gray-300"></i>
                      </div>
                </div>

            <!-- User record -->
			 <div style="margin:120px 10px 10px 377px; width: 350px; height: 100px; background-color: #000000; border-radius: 10px 10px 10px 10px; position: absolute;" class="col-md-12 mb-3">
							<p style="margin:50px 10px 10px 80px; font-size: 15px; font-family: 'Bahnschrift SemiBold',SANS-SERIF; color:#4CBB17; text-shadow: 2px 2px #2E8B57;">
						<?php 
						$user_type = 'staff';
                        $query = "SELECT COUNT(*) FROM users WHERE user_type like '%$user_type%'";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s) </p>
						
						
					  <div style="font-size: 20px; margin:-55px 10px 10px 77px; font-family: 'Bahnschrift SemiBold',SANS-SERIF; color:#4CBB17; text-shadow: 2px 2px #2E8B57;">STAFF</div>
					    <div style="margin-left: 20px; margin-top: -33px; font-size: 20px; text-shadow: 2px 2px #2E8B57; color: #4CBB17;"class="col-auto">
                        <i class="fas fa-user-circle fa-2x text-gray-300"></i>
                      </div>
                </div>
				
						 <div style="margin:120px 10px 10px 745px; width: 350px; height: 100px; background-color: #000000; border-radius: 10px 10px 10px 10px; position: absolute;" class="col-md-12 mb-3">
							<p style="margin:50px 10px 10px 80px; font-size: 15px; font-family: 'Bahnschrift SemiBold',SANS-SERIF; color:#4CBB17; text-shadow: 2px 2px #2E8B57;">
						<?php 
						$user_type = 'admin';
                        $query = "SELECT COUNT(*) FROM users WHERE user_type like '%$user_type%'";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s) </p>
						
						
					  <div style="font-size: 20px; margin:-55px 10px 10px 77px; font-family: 'Bahnschrift SemiBold',SANS-SERIF; color:#4CBB17; text-shadow: 2px 2px #2E8B57;">ADMIN</div>
					    <div style="margin-left: 20px; margin-top: -33px; font-size: 20px; text-shadow: 2px 2px #2E8B57; color: #4CBB17;"class="col-auto">
                        <i class="fas fa-user-circle fa-2x text-gray-300"></i>
                      </div>
                </div>
				
				<div style="margin:240px 10px 10px 10px; width: 350px; height: 100px; background-color: #000000; border-radius: 10px 10px 10px 10px; position: absolute;" class="col-md-12 mb-3">
							<p style="margin:50px 10px 10px 80px; font-size: 15px; font-family: 'Bahnschrift SemiBold',SANS-SERIF; color:#4CBB17; text-shadow: 2px 2px #2E8B57;">
						<?php 
						$status = 'completed';
                        $query = "SELECT COUNT(*) FROM `orders` where order_status = '$status'";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?> Record(s) </p>
					   <div style="font-size: 20px; margin:-55px 10px 10px 77px; font-family: 'Bahnschrift SemiBold',SANS-SERIF; color:#4CBB17; text-shadow: 2px 2px #2E8B57;">COMPLETED ORDERS</div>
					    <div style="margin-left: 20px; margin-top: -33px; margin-bottom: 8px;font-size: 20px; text-shadow: 2px 2px #2E8B57; color: #4CBB17;"class="col-auto">
                        <i class="fas fa-user-circle fa-2x text-gray-300"></i>
                      </div>
					   <a href="Orders.php" style="color: green;  margin:80px; font-family: 'Bahnschrift SemiBold',SANS-SERIF; color:#4CBB17; text-shadow: 2px 2px #2E8B57;" class="btn">VIEW</a>
                </div>
				
			
				 	 <div style="margin:240px 10px 10px 377px; width: 350px; height: 100px; background-color: #000000; border-radius: 10px 10px 10px 10px; position: absolute;" class="col-md-12 mb-3">
							<p style="margin:50px 10px 10px 80px; font-size: 15px; font-family: 'Bahnschrift SemiBold',SANS-SERIF; color:#4CBB17; text-shadow: 2px 2px #2E8B57;">
						<?php
			 date_default_timezone_set("Asia/Manila");
			$todaydate = date ('y-m-d');
			
			$status = 'completed';
			$select_cart = mysqli_query($db,  "SELECT * FROM `orders` where date = '$todaydate' && order_status = '$status'");
			if(mysqli_num_rows($select_cart) > 0){
				while($fetch_cart = mysqli_fetch_assoc($select_cart)){
			$sql = "SELECT  SUM(paid_amount) from `orders` where date = '$todaydate'&& order_status = '$status'";
				$result = $db->query($sql);
			//display data on web page
				while($row = mysqli_fetch_array($result)){
		 $row['SUM(paid_amount)'];
		$grand_total =  $row['SUM(paid_amount)'];
				}
			}
		 } else{
			 $grand_total = 0;
		 }
      ?>
	Daily Sales: ₱<?= $grand_total; ?> 
	   </p>
					  <div style="font-size: 20px; margin:-55px 10px 10px 77px; font-family: 'Bahnschrift SemiBold',SANS-SERIF; color:#4CBB17; text-shadow: 2px 2px #808080;">TOTAL DAILY SALES</div>
					  <div style="margin-left: 20px; margin-top: -33px; font-size: 20px; text-shadow: 2px 2px #2E8B57; color: #4CBB17;"class="col-auto">
                        <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>
                      </div>
                </div>

		</div>
		<!--wrapper end-->

		<script type="text/javascript">
		$(document).ready(function(){
			$(".sidebar-btn").click(function(){
				$(".wrapper").toggleClass("collapse");
			});
		});
		</script>
</body>
</html>	
<?php
if(isset($_POST["ViewO"]))
{
	?>
	<script type="text/javascript">
	window.location = "http://localhost/Finals3rd/contents/admin/OutOfstocks.php";
	</script>
	<?php
}
?>