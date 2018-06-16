<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Volumes</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="alert alert-info">
			list volumes
		</div>
		<table class="table table-striped table-hover table-dark">
			<thead>
				<tr>
					<th> STT</th>
					<th>Name</th>
					<th>Description</th>
					<th>Size</th>
					<th>Status</th>
					<th>Type</th>
					<th>Attached To</th>
					<th>Availablity Zone</th>
					<th>Bootable</th>
					<th>Encrypted</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($json['volumes'] as $key => $value): ?>
					<tr>
						<td><?php echo $key; ?></td>
						<td><?php echo $value['id']; ?></td>
						<td><?php 
							if (isset($value['description'])){
								echo $value['description'];
							}else{
								echo "-";
							}
						?></td>
						<td><?php echo $value['size'].'GiB'; ?></td>
						<td><?php echo $value['status']; ?></td>
						<td><?php 
							if (isset($value['volume_type'])){
								echo $value['volume_type'];
							}else{
								echo "-";
							}
						?></td>
						<td><?php 
							if (isset($value['attachments']['0'])) {
								echo $value['attachments']['0']['device'];
							}else{
								echo "-";
							}

						?></td>
						<td><?php echo $value['availability_zone'] ?></td>
						<td><?php echo $value['bootable']; ?></td>
						<td><?php echo $value['encrypted']; ?></td>
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Edit Volume</button>
								<div class="dropdown-menu">
									<a href="#" class="dropdown-item">Manage Attachments</a>
									<a href="#" class="dropdown-item">Create Snapshot</a>
									<a href="#" class="dropdown-item">Change Volume Type</a>
									<a href="#" class="dropdown-item">Upload to image</a>
									<a href="#" class="dropdown-item">Update Metadata</a>
								</div>
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