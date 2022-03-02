<?php
/* Connection */
include("common/connection.php");
/* check login status and usertype */
include("admin_page/check_loginAlgorithm.php");
?>
<!-- Get information for site feedbacks -->
<?php 
$getfeedback_sql="select * from site_feedback";
$getfeedback_result = mysqli_query($conn,$getfeedback_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/seller_page.css"/><!--CSS link-->
	<link rel="icon" href="images/logo/jkstore_logo.png"/><!-- Logo on tab -->
	<link href="https://fonts.googleapis.com/css?family=Anton|Roboto&display=swap" rel="stylesheet"/><!--Fonts-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"><!--Fonts-->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--Search button font-->

	<title>JKstore - Site feedbacks (ADMIN)</title>
</head>
<body>
	<a href="seller_page_index.php"><img class="home-logo" src="images/logo/jkstore_logo.png"/></a>
	<div style="background: white;">
		<h1 class="header">Welcome back! <?php echo $login_username;?></h1>
	</div>
	<div style="background:url('images/bg/sellerpage-bg-1.jpg') fixed;background-size: cover;padding:20px">
		<a href="admin_page_index.php" class="profile-button">BACK</a>
		<table align="center" cellspacing="20px" style="width:40vw" class="table">
			<tr>
				<td colspan="3">
					<h1>Site feedbacks</h1>
				</td>
			</tr>
			<?php while($getfeedback_rows = mysqli_fetch_array($getfeedback_result)){ ?>
			<tr>
				<td>
					From:
				</td>
				<td style="font-family: 'Montserrat', sans-serif;">
					<?php echo $getfeedback_rows['name'];?>
				</td>
				<?php if($getfeedback_rows['replied'] == 0){ ?>
				<td rowspan="3" align="right" style="vertical-align: top;">
					<a class="profile-button" href="admin_page/reply_sitefeedback.php?id=<?php echo $getfeedback_rows['id'];?>">Reply</a>
				</td>
				<?php }else{ ?>
				<td rowspan="3" align="right" style="vertical-align: top;">
					<a class="profile-button">Replied</a>
				</td>
				<?php } ?>
			</tr>
			<tr>
				<td style="vertical-align: middle;">
					Title:
				</td>
				<td style="font-family: 'Montserrat', sans-serif;">
					<?php echo $getfeedback_rows['title'];?>
				</td>
			</tr>
			<tr style="border-bottom:black solid 2px">
				<td style="vertical-align: middle;">
					Message:
				</td>
				<td style="font-family: 'Montserrat', sans-serif;font-size:2vh">
					<?php echo $getfeedback_rows['message'];?>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<hr/>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
<!-- After redirect from reply_sitefeedback open email -->
<?php
if(isset($_GET['id'])){
	$feedback_sql="select * from site_feedback where id=".$_GET['id'];
	$feedback_result = mysqli_query($conn,$feedback_sql);
	$feedback_rows = mysqli_fetch_array($feedback_result);
	echo "<script>window.location.href='mailto:".$feedback_rows['email']."?Subject=JKstore | RE: ".$feedback_rows['title']."&Body=Dear ".$feedback_rows['name'].",%0D%0A%0D%0A".$login_username."%0D%0AAdministrator, JKstore';</script>";
}
?>
</body>
</html>