<html>
<head>
	<title>Add Order</title>
</head>
<body>
	<div>
		<form action="addorder" method="post">
		 {{ csrf_field() }}
		 <div class="demo-table">
		 	<div class="form-head">Order Product</div>
			<!-- Begin Product  -->
			<div class="form-column">
				<div>
					<label for="product">Product</label><span id="product_info" class="error-info"></span>
				</div>
				<div>
					<input name="product" id="product" type="text" class="demo-input-box">
				
				</div>
			</div>
			<!-- End Product -->
			<!-- Begin CustomerID -->
			<div class="form-column">
				<div>
					<label for="customer">Customer ID</label><span id="customer_info" class="error-info"></span>
				</div>
				<div>
					<input name="customerID" id="customerID" type="text" value="{{ Session::get('nextID') }}" class="demo-input-box">
				
				</div>
				<div>
					<input name="firstName" id="firstName" type="text" value="{{ Session::get('firstName') }}" class="demo-input-box">
				
				</div>
				<div>
					<input name="lastName" id="lastName" type="text" value="{{ Session::get('lastName') }}" class="demo-input-box">
				
				</div>
			</div>	
			<!-- End CustomerID  -->	
			<div>
				<input type="submit" class="btnLogin">
			</div> 
		 </div>
		</form>
	</div>

</body>
</html>