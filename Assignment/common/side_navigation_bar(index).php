<div>
	<table style="position:fixed;top:6vw;z-index:1000;right:-120px;"cellspacing="55vw">
		<tr >
			<td>
				<a id="backtotop" class="quickNavigationBar" onclick="topFunction();" style="text-decoration:none;cursor:pointer"><!--SIDEBAR BACK TO TOP-->
					<img style="background-color:teal;animation:anim 2s  backwards;" src="images/logo/backtotop.png"  alt="backtotop"/>
					<span class="category-text" style="border-color:teal;text-shadow:teal 2px 2px 0px,teal 1px -1px 0,teal -1px 1px 0;animation:category-text-anim 3s ;">Back to top</span>
				</a>	
			</td>
			
		</tr>
		<?php if($login == 1){ ?>
		<tr >
			<td>
				<a  class="quickNavigationBar" onclick="showCart()"style="text-decoration:none;cursor:pointer;"><!--SIDEBAR CART-->
					<img style="background-color:maroon;animation:anim 2s;"src="images/logo/cart.png"  alt="cart"/>
					<span class="category-text" style="border-color:maroon;text-shadow:red 2px 2px 0px,red 1px -1px 0,red -1px 1px 0;animation:category-text-anim 3s;">Cart</span>
				</a>
			</td>
			
		</tr>
		<?php } ?>
		<tr >
			<td>
				<a class="quickNavigationBar" href="#categorybox" style="text-decoration:none;"><!--SIDEBAR CATEGORIES-->
					<img style="background-color:orange;animation:anim 2s 0.3s backwards;" src="images/logo/category.png"  alt="category"/>
					<span class="category-text" style="border-color:orange;text-shadow:orange 2px 2px 0px,orange 1px -1px 0,orange -1px 1px 0;animation:category-text-anim 3s 0.3s;">Categories</span>
				</a>
			</td>

			
		</tr>
		<tr >
			<td>
				<a class="quickNavigationBar" href="#sale" style="text-decoration:none;"><!--SIDEBAR SALE-->
					<img style="background-color:orange;animation:anim 2s 0.6s backwards;" src="images/logo/sale.png"  alt="sale"/>
					<span class="category-text" style="border-color:orange;text-shadow:orange 2px 2px 0px,orange 1px -1px 0,orange -1px 1px 0;animation:category-text-anim 3s 0.6s;">Sale</span>
				</a>
			</td>

			
		</tr>
		<tr >
			<td>
				<a class="quickNavigationBar" href="#seller" style="text-decoration:none;"><!--SIDEBAR SELLERS-->
					<img style="background-color:orange;animation:anim 2s 0.9s backwards;" src="images/logo/seller.png"  alt="seller"/>
					<span class="category-text" style="border-color:orange;text-shadow:orange 2px 2px 0px,orange 1px -1px 0,orange -1px 1px 0;animation:category-text-anim 3s 0.9s;">Sellers</span>
				</a>
			</td>

			
		</tr>
		<tr >
			<td>
				<a class="quickNavigationBar" href="#aboutus"style="text-decoration:none;"><!--SIDEBAR ABOUT US-->
					<img style="background-color:navy;animation:anim 2s 1.2s backwards;" src="images/logo/about us.png"  alt="aboutus"/>
					<span class="category-text" style="border-color:navy;text-shadow:navy 2px 2px 0px,navy 1px -1px 0,navy -1px 1px 0;animation:category-text-anim 3s 1.2s;">About Us</span>
				</a>
			</td>
			
		</tr>
		<tr >
			<td>
				<a class="quickNavigationBar" href="#helpandcontact"style="text-decoration:none;"><!--SIDEBAR HELP & CONTACT-->
					<img style="background-color:green;animation:anim 2s 1.5s backwards;" src="images/logo/contact.png"  alt="contact"/>
					<span class="category-text" style="border-color:green;text-shadow:green 2px 2px 0px,green 1px -1px 0,green -1px 1px 0;animation:category-text-anim 3s 1.5s;">Help & Contact</span>
				</a>
			</td>
			
		</tr>
		<tr >
			<td>
				<a class="quickNavigationBar" href="#sitemap"style="text-decoration:none;"><!--SIDEBAR SITEMAP-->
					<img style="background-color:purple;animation:anim 2s 1.8s backwards;" src="images/logo/sitemap.png"  alt="sitemap"/>
					<span class="category-text" style="border-color:purple;text-shadow:purple 2px 2px 0px,purple 1px -1px 0,purple -1px 1px 0;animation:category-text-anim 3s 1.8s;">Sitemap</span>
				</a>	
			</td>
			
		</tr>
		
	</table>
</div>