<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Flavor</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="alert alert-info">
			list flavors
		</div>
		<table class="table table-striped table-hover table-dark">
			<thead>
				<tr>
					<th>STT</th>
					<th>Flavor Name</th>
					<th>VCPUs</th>
					<th>RAM</th>
					<th>Root Disk</th>
					<th>Ephemeral Disk</th>
					<th>Swap Disk</th>
					<th>RX/TX factor</th>
					<th>ID</th>
					<th>Public</th>
					<th>Metadata</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($json['flavors'] as $key => $value): ?>
					<tr>
						<td><?php echo $key ?></td>
						<td><?php echo $value['name'] ?></td>
						<td><?php echo $value['vcpus'] ?></td>
						<td><?php echo $value['ram'] . 'MiB'; ?></td>
						<td><?php echo $value['disk'] .'GiB'; ?></td>
						<td><?php echo $value['OS-FLV-EXT-DATA:ephemeral'].'GiB'; ?></td>
						<td><?php echo $value['swap'] ?></td>
						<td><?php echo $value['rxtx_factor'] ?></td>
						<td><?php echo $value['id'] ?></td>
						<td><?php 
							if($value['os-flavor-access:is_public']){
								echo 'Yes';
							}else{
								echo 'No';
							}
						?></td>
						<td><?php 
							if($value['OS-FLV-DISABLED:disabled']){
								echo 'Yes';
							}else{
								echo 'No';
							}
						?></td>
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Update Metadata</button>
								<div class="dropdown-menu">
									<a href="#" class="dropdown-item">Delete Flavor</a>
									
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