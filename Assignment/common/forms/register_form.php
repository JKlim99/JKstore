<div>
	<form method="POST">
		<table id="register-form">
			<tr>
				<td style="text-align:right;">
					<a onclick="hideRegister()" style="cursor:pointer">X</a>
				</td>
			</tr>
			<tr>
				<td align="center">
					<h1>Register</h1>
				</td>
			</tr>
			<tr>
				<td>
					<input style="font-size:20px;" type="email" name="register-email" placeholder="Email" maxlength="345" required/>
				</td>
			</tr>
			<tr>
				<td>
					<input style="font-size:20px;" type="text" name="register-username" placeholder="Full Name" maxlength="50" required/>
				</td>
			</tr>
			<tr>
				<td>
					<input style="font-size:20px;" type="password" name="register-password" placeholder="Password(min 8 characters)" minlength="8" maxlength="15" required/>
				</td>
			</tr>
			<tr>
				<td>
					<input style="font-size:20px;" type="password" name="register-retypepassword" placeholder="Retype password" minlength="8" maxlength="15" required/>
				</td>
			</tr>
			<tr>
				<td>
					<input style="font-size:20px;" type="text" name="register-street" placeholder="Street" maxlength="50" required/>
				</td>
			</tr>
			<tr>
				<td>
					<input style="font-size:20px;" type="text" name="register-city" placeholder="City" maxlength="50" required/>
				</td>
			</tr>
			<tr>
				<td>
					<input style="font-size:20px;" type="number" name="register-postal" placeholder="Postal Code"  min="0" minlength="5" maxlength="5" required/>
				</td>
			</tr>
			<tr>
				<td>
					<input style="font-size:20px;" type="text" name="register-state" placeholder="State" maxlength="50" required/>
				</td>
			</tr>
			<tr>
				<td>
					<input style="font-size:20px;" type="text" name="register-country" placeholder="Country" maxlength="50" required/>
				</td>
			</tr>
			<tr>
				<td>
					<input style="font-size:20px;" type="text" name="register-phone" placeholder="Phone Number" minlength="11" maxlength="12" required/>
				</td>
			</tr>
			<tr align="center">
				<td>
					<select name="usertype" style="width:100%;font-size:20px;" required>
						<option value="">-Please select-</option>
						<option value="1">Buyer</option>
						<option value="2">Seller</option>
					</select>
				</td>
			</tr>
			<tr>
				<td align="center" style="padding:10px;">
					<input class="login-button" name="registersubmit" type="submit" value="Register"/>
				</td>
			</tr>
		</table>
	</form>
</div>
