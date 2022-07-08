<?php include 'db_connect.php' ?>
<?php 

if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM roles where roleID=".$_GET['id']);
	foreach($qry->fetch_array() as $k => $val){
		$$k = $val;
	}
}

?>
<div class="container-fluid">
	<div class="col-lg-12">
		<form action="signup.php" method="POST">
			<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="" class="control-label">Last Name</label>
						<input type="text" name="lastname">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">First Name</label>
						<input type="text" name="firstname">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Username</label>
						<input type="text" name="username">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Password</label>
						<input type="text" name="password">
					</div>
				</div>
			<div class="row form-group">
				<div class="col-md-6">
							<label for="">Address</label>
							<textarea type="text" name="address"></textarea>
				</div>
				<div class="col-md-5">
					<div class="">
						<label for="">Contact #</label>
						<input type="text" name="contact_no">
					</div>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-6">
							<label for="">Email</label>
							<input type="text" name="email">
				</div>
				<div class="col-md-5">
					<div class="">
						<label for="">Tax ID</label>
						<input type="text" name="tax_id">
					</div>
				</div>
			</div>
			<button type="submit" name="submit">Save</button>
		</form>
	</div>
</div>

<script>
	 $('#manage-borrower').submit(function(e){
	 	e.preventDefault()
	 	start_load()
	 	$.ajax({
	 		url:'ajax.php?action=save_borrower',
	 		method:'POST',
	 		data:$(this).serialize(),
	 		success:function(resp){
	 			if(resp == 1){
	 				alert_toast("Borrower data successfully saved.","success");
	 				setTimeout(function(e){
	 					location.reload()
	 				},1500)
	 			}
	 		}
	 	})
	 })
</script>
