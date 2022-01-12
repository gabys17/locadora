<!DOCTYPE html>
<html>
<head>
    <title>Nova Marca</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
<div class="container">
	<form method="post" action="<?php echo base_url('marca/create')?>">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<label class="col-md-3">Marca</label>
					<div class="col-md-9">
						<input type="text" name="nome_marca" class="form-control">
						<?= form_error('nome_marca') ?>
					</div>
				</div>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<label class="col-md-3">CNPJ</label>
					<div class="col-md-9">
						<input type="text" name="cnpj" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<label class="col-md-3">Rua</label>
					<div class="col-md-9">
						<input type="text" name="rua" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<label class="col-md-3">Bairro</label>
					<div class="col-md-9">
						<input type="text" name="bairro" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<label class="col-md-3">Número</label>
					<div class="col-md-9">
						<input type="text" name="numero" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<label class="col-md-3">Telefone</label>
					<div class="col-md-9">
						<input type="text" name="telefone" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<label class="col-md-3">Email</label>
					<div class="col-md-9">
						<input type="text" name="email" class="form-control">
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
