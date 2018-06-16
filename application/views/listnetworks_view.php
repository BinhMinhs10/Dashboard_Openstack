<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Network</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="alert alert-info">
			list networks
		</div>
		<table class="table table-striped table-hover table-dark">
			<thead>
				<tr>
					<th>Name</th>
					<th>Network type</th>
					<th>Shared</th>
					<th>External</th>
					<th>Status</th>
					<th>Admin State</th>
					<th>Availability Zones</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($json['networks'] as $key => $value): ?>
					<tr>
						<td><?php echo $value['name']; ?></td>
						<td><?php echo $value['provider:network_type']; ?></td>
						<td><?php
							if ($value['shared']) {
							 	echo 'Yes';
							}else{
								echo 'No';
							} 
						?></td>
						<td><?php 
							if ($value['router:external']) {
							 	echo 'Yes';
							}else{
								echo 'No';
							}
						?></td>
						<td><?php echo $value['status']; ?></td>
						<td><?php 
							if ($value['admin_state_up']) {
							 	echo 'UP';
							}else{
								echo 'No';
							}
						?></td>
						<td><?php echo $value['availability_zones']['0']; ?></td>
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Edit Network</button>
								<div class="dropdown-menu">
									<a href="#" class="dropdown-item">Create Subnet</a>
									<a href="#" class="dropdown-item">Delete Network</a>
									
							</div>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>	
		
	</div>
	<div class="container">
		
		<a href="<?php echo base_url(); ?>index.php/openstack/home" class="btn btn-primary">Quay về trang chủ</a>
	</div>
</body>
</html>