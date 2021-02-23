<html>
<head>
	<title>Add Customer</title>
</head>
<body>
	<div>
		<form action="addcustomer" method="post">
		 {{ csrf_field() }}
		 <div class="demo-table">
		 	<div class="form-head">Add Customer</div>
			
			<div class="form-column">
				<div>
					<label for="firstname">First Name</label><span id="user_info" class="error-info"></span>
				</div>
				<div>
					<input name="firstname" id="firstname" type="text" class="demo-input-box">
				
				</div>
			</div>
			
			<div class="form-column">
				<div>
					<label for="lastname">Last Name</label><span id="user_info" class="error-info"></span>
				</div>
				<div>
					<input name="lastname" id="lastname" type="text" class="demo-input-box">
				
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