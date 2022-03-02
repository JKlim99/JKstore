<div class="categorybar" style="width:100%;box-shadow:black 1px 0 5px;position:fixed;position:sticky;top:0;z-index:999;background-color:black;"><!--TOP CATEGORIES BAR-->					
		<table class="categorybar" align="center">
			<tr>
				<td>
					<a href="index.php"><img src="images/logo/jkstore.png" style="max-width:70px;height:auto;"alt="logo"/></a>
				</td>
				<td>
					<a href="result.php?search-key=fashion&target=product" class="categorybar-mobile-menu-text cate <?php if(isset($_GET['search-key'])&&($_GET['search-key']=='fashion')){ echo 'categorybar-active';}?>">Fashion</a>
				</td>
				<td>
					<a href="result.php?search-key=electronicDevices&target=product" class="categorybar-mobile-menu-text <?php if(isset($_GET['search-key'])&&($_GET['search-key']=='electronicDevices')){ echo 'categorybar-active';}?>">Electronic Devices</a>
				</td>
				<td>
					<a href="result.php?search-key=healthAndBeauty&target=product" class="categorybar-mobile-menu-text <?php if(isset($_GET['search-key'])&&($_GET['search-key']=='healthAndBeauty')){ echo 'categorybar-active';}?>">Health & Beauty</a>
				</td>
				<td>
					<a href="result.php?search-key=homeAppliance&target=product" class="categorybar-mobile-menu-text <?php if(isset($_GET['search-key'])&&($_GET['search-key']=='homeAppliance')){ echo 'categorybar-active';}?>">Home Appliance</a>
				</td>
				<td>
					<a href="result.php?search-key=sports&target=product" class="categorybar-mobile-menu-text <?php if(isset($_GET['search-key'])&&($_GET['search-key']=='sports')){ echo 'categorybar-active';}?>">Sports</a>
				</td>
				<td>
					<a href="result.php?search-key=homeAndLifestyle&target=product" class="categorybar-mobile-menu-text <?php if(isset($_GET['search-key'])&&($_GET['search-key']=='homeAndLifestyle')){ echo 'categorybar-active';}?>">Home & Lifestyle</a>
				</td>
				<td>
					<form method="get" action="result.php" style="background-color: white;padding:5px;">
						<input class="search-bar" style="border:0px;" type="text" name="search-key" placeholder="Search"/>
						<button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
						<input type="hidden" name="target"/>
					</form>
				</td>
				<?php if($login== 0){ ?>
				<td>
					<a class="categorybar-login" onclick="showLogin()">LOGIN</a>
				</td>
				<?php } else{ ?>
				<td>
					<a class="categorybar-login" onclick="hideAndShowProfileMenu()">PROFILE</a>
					<div>
						<table id="profile-menu" cellpadding="20px">
							<tr align="center">
								<td>
									<a href="edit_profile.php" class="profile-menu-link">
										Edit Profile
									</a>
								</td>	
							</tr>
							<tr align="center">
								<td>
									<a href="track_order.php" class="profile-menu-link">
										Track Order
									</a>
								</td>	
							</tr>
							<tr align="center">
								<td>
									<a class="profile-menu-link" href="common/algorithms/logoutAlgorithm.php">
										Log Out
									</a>
								</td>	
							</tr>
						</table>
					</div>
				</td>
				<?php } ?>
			</tr>
		</table>
</div>