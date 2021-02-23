<html>
<head>
	<title>User Login</title>
</head>
<body>
	<div>
		<form action="doLogin" method="post">
		 {{ csrf_field() }}
		 <div class="demo-table">
		 	<div class="form-head">Login</div>
			
			<div class="form-column">
				<div>
					<label for="username">Username</label><span id="user_info" class="error-info"></span>
				</div>
				<div>
					<input name="username" id="username" type="text" class="demo-input-box">
				<?php echo $errors->first('username')?>
				</div>
			</div>
			
			<div class="form-column">
				<div>
					<label for="password">Password</label><span id="user_info" class="error-info"></span>
				</div>
				<div>
					<input name="password" id="password" type="text" class="demo-input-box">
				<?php echo $errors->first('password')?>
				</div>
			</div>		
			<div>
				<input type="submit" class="btnLogin">
			</div> 
		 </div>
		</form>
	</div>

</body>
</html>