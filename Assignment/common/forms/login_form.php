<div>
	<form method="POST">
		<table id="login-form">
			<tr>
				<td style="text-align:right;">
					<a onclick="hideLogin()" style="cursor:pointer;">X</a>
				</td>
			</tr>
			<tr>
				<td align="center">
					<h1>LOGIN</h1>
				</td>
			</tr>
			<tr>
				<td>
					<input style="font-size:20px;" type="text" name="login-email" placeholder="Email" required/>
				</td>
			</tr>
			<tr>
				<td>
					<input id="password" style="font-size:20px;" type="password" name="login-password" placeholder="Password" minlength="8" maxlength="15" required/>
				</td>
			</tr>
			<tr>
				<td>
					<input onclick="hideAndShowPassowrd()" type="checkbox"/><a style="font-family: 'Montserrat', sans-serif;">Show password</a>
				</td>
			</tr>
			<tr>
				<td>
					<a onclick="showForgotPassword();hideLogin()" style="font-size:15px;color:grey;font-family: 'Montserrat', sans-serif;cursor: pointer;">Forgot password?</a>
				</td>
			</tr>
			<tr>
				<td align="center" style="padding:5px;">
					<input class="login-button" name="loginsubmit" type="submit" value="Login"/>
				</td>
			</tr>
			<tr>
				<td>
					<a onclick="showRegister();hideLogin()" style="font-size:15px;color:grey;font-family: 'Montserrat', sans-serif;cursor: pointer;">Not a member? Register now!</a>
				</td>
			</tr>
		</table>
	</form>
</div>