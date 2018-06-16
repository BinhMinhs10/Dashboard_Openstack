<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Images</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="alert alert-info">
			list images
		</div>
		<table class="table table-striped table-hover table-dark">
			<thead>
				<tr>
					<th>STT</th>
					<th>ID</th>
					<th>Name</th>
					<th>Status</th>
					<th>Size</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($json['images'] as $key => $value): ?>
					<tr>
						<td><?php echo $key; ?></td>
						<td><?php echo $value['id'] ?></td>
						<td><?php echo $value['name'] ?></td>
						<td><?php echo $value['status'] ?></td>
						<td><?php echo $value['OS-EXT-IMG-SIZE:size']; ?></td>
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Launch</button>
								<div class="dropdown-menu">
									<a href="#" class="dropdown-item">Upldate Image</a>
									<a href="#" class="dropdown-item">Delete Image</a>
									
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