<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Server</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="alert alert-info">
			list servers
		</div>
		<table class="table table-striped table-hover table-dark">
			<thead>
				<tr>
					<th>Instance Name</th>
					<th>IP Address</th>
					<th>Flavor</th>
					<th>Key Pair</th>
					<th>Status</th>
					<th>Availablity Zone</th>
					<th>Task</th>
					<th>Power State</th>
					<th>Time since created</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($json['servers'] as $key => $value): ?>
					<tr>
						<td><?php echo $value['name']; ?></td>					
						<td><?php  
							if(isset($value['addresses']['internal']['0']))
								echo $value['addresses']['internal']['0']['addr'] .'<br/>';
							if(isset($value['addresses']['internal']['1']))
								echo $value['addresses']['internal']['1']['addr'] .'<br/>';
							if(isset($value['addresses']['external']['0']))
								echo $value['addresses']['external']['0']['addr'] .'<br/>';
							if(isset($value['addresses']['external']['1']))
								echo $value['addresses']['external']['1']['addr'] .'<br/>';
						?></td>					
						<td><?php 
							if (isset($value['flavor'])) {
								echo $value['flavor']['id'];
							}else{
								echo '-';
							}
						?></td>					
						<td><?php echo $value['key_name']; ?></td>					
						<td><?php echo $value['status']; ?></td>					
						<td><?php echo $value['OS-EXT-AZ:availability_zone']; ?>	</td>					
						<td><?php 
							if (isset($value['OS-EXT-STS:task_state'])){
								echo $value['OS-EXT-STS:task_state'];
							}else{
								echo "None";
							}

						?></td>					
						<td><?php echo $value['OS-EXT-STS:power_state']; ?></td>					
						<td><?php echo $value['created']; ?></td>					
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Create Snapshot</button>
								<div class="dropdown-menu">
									<a href="#" class="dropdown-item">Disassociate Floating IP</a>
									<a href="#" class="dropdown-item">Attach Interface</a>
									<a href="#" class="dropdown-item">Detach Interface</a>
									<a href="#" class="dropdown-item">Edit Instance</a>
									<a href="#" class="dropdown-item">Attach Volume</a>
									<a href="#" class="dropdown-item">Update Metadata</a>
									<a href="#" class="dropdown-item">Edit Security Groups</a>
									<a href="#" class="dropdown-item">Console</a>
									<a href="#" class="dropdown-item">View Log</a>
									<a href="#" class="dropdown-item">Pause Instance</a>
									<a href="#" class="dropdown-item">Suspend Instance</a>
									<a href="#" class="dropdown-item">Shelve Instance</a>
									<a href="#" class="dropdown-item">Resize Instance</a>
									<a href="#" class="dropdown-item">Lock Instance</a>
									<a href="#" class="dropdown-item">Soft Reboot Instance</a>
									<a href="#" class="dropdown-item">Hard Reboot Instance</a>
									<a href="#" class="dropdown-item">Shut Off Instance</a>
									<a href="#" class="dropdown-item">Rebuld Instance</a>
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