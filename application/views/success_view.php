<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Success</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="jumbotron container">
		Test some function Openstack 
	</div>
	<div class="container">
		<div class="alert alert-info fade show text-lg-center">
			<button type="button"  class="close" data-dismiss="alert">&times;</button>
			Login<strong> success </strong>
		</div>
		<div class="text-lg-center">
			<div class="row">
				<div class="col-md-4">
					<a href="<?php echo base_url() ?>index.php/Openstack/listServer" class="btn btn-info">List Server</a>
				</div>
				<div class="col-md-4">
					<a href="<?php echo base_url() ?>index.php/Openstack/listVolumes" class="btn btn-secondary">List volumes</a>
				</div>
				<div class="col-md-4">
					<a href="<?php echo base_url() ?>index.php/Openstack/listNetworks" class="btn btn-info">List Networks</a>
				</div>
			</div><br/>
			<div class="row">
				<div class="col-md-4">
					<a href="<?php echo base_url() ?>index.php/Openstack/listFlavors" class="btn btn-secondary">List Flavors</a>
				</div>
				<div class="col-md-4">
					<a href="<?php echo base_url() ?>index.php/Openstack/listImages" class="btn btn-info">List Images</a>
				</div>
			</div>
			
		</div>
	</div>
	
		
	
	<div class="container">
		

		<p>
			<strong>Name Roles:</strong> <?php echo $json['token']['roles']['0']['name']; ?><br/>
			<strong>Token Expires:</strong> <?php echo $json['token']['expires_at']; ?><br/>
			<strong>Domain name project:</strong> <?php echo $json['token']['project']['domain']['name']; ?>
		</p>
		<div class="alert alert-info">
			list information catalog
		</div>
		<table class="table table-striped table-hover table-dark">
			<thead>
				<tr>
					<th>Name</th>
					<th>Type</th>
					<th>ID</th>
					<th>Region Name</th>
					<th>Interface</th>
					<th>URL</th>
					
				</tr>
			</thead>
			<tbody>
				<?php foreach ($json['token']['catalog'] as $value): ?>
					<tr>		
						<td><?php echo $value['name']; ?></td>		
						<td><?php echo $value['type']; ?></td>		
						<td><?php echo $value['id']; ?></td>		
						<td><?php echo $value['endpoints']['0']['region']; ?></td>
						<td><?php echo $value['endpoints']['0']['interface'] ?></td>
						<td><?php echo $value['endpoints']['0']['url']; ?></td>	
							
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>	
	</div>
	
	
</body>
</html>