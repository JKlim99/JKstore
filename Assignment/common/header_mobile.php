<div class="topbar" style="background-color:black;width:auto;top:0;left:0;right:0;z-index:1001;position:fixed;">	
	<div style="border-top: 1px white solid;border-bottom:  1px white solid; overflow:hidden;position:relative;"><!--TOP CATEGORIES BAR-->					
		<table class="categorybar-mobile-button">
			<tr>
				<td>
					<a href="index.php"><img src="images/logo/jkstore.png" style="max-width:70px;height:auto;"alt="logo"/></a>
				</td>
				<td width="90%"></td>
				<td>
					<button onclick="hideAndShowMenu()" style="background-image:url('images/logo/menu.png'); background-size:cover; height:40px; width:40px;"></button>
				</td>
			</tr>
		</table>
	</div>
	<div>
		<table id="categorybar-mobile-menu" align="center" style="position:fixed; height:90%;width:100%;border:0px;background-color: black;" cellspacing="20px">
			<tr>
				<td style="border:0px">
					<form method="get" action="result.php">
						<input class="search-bar" style="border:0px;padding:10px" type="text" name="search-key" placeholder="Search"/>
						<button class="search-btn" style="background-color: white;padding:11px 11px 11px 11px;" type="submit"><i class="fa fa-search"></i></button>
						<input type="hidden" name="target"/>
					</form>
				</td>
			</tr>
			<tr><td><a href="index.php" class="categorybar-mobile-menu-text">Home</a></td></tr>
			<?php if($login == 0){ ?>
			<tr><td><a onclick="showLogin();hideAndShowMenu()" class="categorybar-mobile-menu-text" style="cursor:pointer;">Login</a></td></tr>
			<?php } else{ ?>
			<tr><td><a class="categorybar-mobile-menu-text" href="edit_profile.php">Profile</a></td></tr>
			<?php } ?>
			<tr><td><a class="categorybar-mobile-menu-text" href="result.php?target=sale&search-key=">Sale</a></td></tr>
			<tr><td><a class="categorybar-mobile-menu-text" href="result.php?target=product&search-key=">Products</a></td></tr>
			<tr><td><a class="categorybar-mobile-menu-text" href="result.php?target=seller&search-key=">Sellers</a></td></tr>
			<tr><td><a class="categorybar-mobile-menu-text" href="aboutus.php">About Us</a></td></tr>
			<tr><td><a class="categorybar-mobile-menu-text" href="help_and_contact.php">Help & Contact</a></td></tr>
			<?php if($login==1){ ?>
			<tr><td><a class="categorybar-mobile-menu-text" href="common/algorithms/logoutAlgorithm.php">Log Out</a></td></tr>
			<?php } ?>
		</table>
	</div>
</div>