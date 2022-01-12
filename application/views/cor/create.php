<!DOCTYPE html>
<html>
<head>
    <title>Nova Cor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
	<div class="container">
	<form method="post" action="<?php echo base_url('cor/create')?>">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<label class="col-md-3">Cor</label>
					<div class="col-md-9">
						<input type="text" name="nome_cor" class="form-control">
						<?= form_error('nome_cor') ?>
					</div>
				</div>
			</div>
			
			<div class="col-md-8 col-md-offset-2 pull-right">
				<input type="submit" name="Save" class="btn">
			</div>
		</div>
		
	</form>
</div>
</body>
</html>
