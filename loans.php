<?php include 'db_connect.php' ?>

<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<large class="card-title">
					<b>Loan List</b>
					<button class="btn btn-primary btn-sm btn-block col-md-2 float-right" type="button" id="new_application"><i class="fa fa-plus"></i> Create New Application</button>
				</large>
			<div class="card-body">
				<table class="table table-bordered" id=" loan-list">
					<colgroup>
						<col width="10%">
						<col width="25%">
						<col width="25%">
						<col width="20%">
						<col width="10%">
						<col width="10%">
					</colgroup>
					<thead>
						<tr>
							<th class="text-center">Loan ID</th>
							<th class="text-center">Client Name</th>
							<th class="text-center">Loan Application Date</th>
							<th class="text-center">Loan Purpose</th>
							<th class="text-center">Loan Amount</th>
							<th class="text-center">Monthly Repayment Amount</th>
							<th class="text-center">Status</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
						include('./db_connect.php');
						
						$query="SELECT l.*, p.monthly_repayment_amount AS pamount, p.payee AS payee FROM loans l,loan_repayment p where l.loanID = p.loanID ";
						$connect=mysqli_query($conn,$query);
						
								while($row= mysqli_fetch_array($connect))
						
							{
								?>	
							
					<tr>
						
						<td> <?php echo $row['loanID'];?> </td>
						<td> <?php echo $row['payee'];?> </td>
						<td> <?php echo $row['application_date'];?> </td>
        				<td> <?php echo $row['purpose'];?> </td>
        				<td> <?php echo $row['loan_amount'];?> </td>
        				<td> <?php echo $row['pamount'];?> </td>
        				<td class="text-center">
						<?php if($row['loan_status'] == 0): ?>
			    			<span class="badge badge-warning">For Approval</span>
						<?php elseif($row['loan_status'] == 1): ?>
							<span class="badge badge-info">Approved</span>
						<?php elseif($row['loan_status'] == 2): ?>
							<span class="badge badge-primary">Released</span>
						<?php elseif($row['loan_status'] == 3): ?>
							<span class="badge badge-success">Completed</span>
						<?php elseif($row['loan_status'] == 4): ?>
							<span class="badge badge-danger">Denied</span>
						<?php endif; ?>
						</td>
						<td class="text-center"> 
							<button class="btn btn-outline-primary btn-sm edit_loan" type="button" data-id="<?php echo $row['loanID'] ?>"><i class="fa fa-edit"></i></button>
						 	<button class="btn btn-outline-danger btn-sm delete_loan" type="button" data-id="<?php echo $row['loanID'] ?>"><i class="fa fa-trash"></i></button>
						 </td>

						 </tr>
						 <?php
							}

						?>

						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<style>
	td p {
		margin:unset;
	}
	td img {
	    width: 8vw;
	    height: 12vh;
	}
	td{
		vertical-align: middle !important;
	}
	</style>
	
<script>
	$('#loan-list').dataTable()
	$('#new_application').click(function(){
		uni_modal("New Loan Application","manage_loan.php",'mid-large')
	})
	$('.edit_loan').click(function(){
		uni_modal("Edit Loan","manage_loan.php?id="+$(this).attr('data-id'),'mid-large')
	})
	$('.delete_loan').click(function(){
		_conf("Are you sure to delete this data?","delete_loan",[$(this).attr('data-id')])
	})
function delete_loan($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_loan',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Loan successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>