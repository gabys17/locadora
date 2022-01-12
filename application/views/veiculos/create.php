<!DOCTYPE html>
<html>
<head>
    <title>Novo Veiculo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
	<div class="container">
	<form method="post" action="<?php echo base_url('veiculos/create')?>">
			<div class="col-md-8 col-md-offset-2">
				<select class="form-control" name="id_marca" style="width: 150px;">
					<option value="">Selecione a Marca</option>  
					<?php  foreach ($marca as $m) : ?>
						<option value="<?php echo $m->id_marca ?>"><?php echo $m->nome_marca ?></option> 
					<?php endforeach; ?> 
				</select>	
			</div>
			<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<label class="col-md-3">Chassi</label>
					<div class="col-md-9">
						<input type="text" name="chassi" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<label class="col-md-3">Placa</label>
					<div class="col-md-9">
						<input type="text" name="placa" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<label class="col-md-3">Numero de Portas</label>
					<div class="col-md-9">
						<input type="text" name="numero_portas" class="form-control">
					</div>
				</div>
			</div>

			<div class="col-md-8 col-md-offset-2">
				<select class="form-control" name="id_cor" style="width: 150px;">
					<option value="">Selecione a Cor</option>  
					<?php  foreach ($cor as $c) : ?>
						<option value="<?php echo $c->id_cor ?>"><?php echo $c->nome_cor ?></option> 
					<?php endforeach; ?> 
				</select>	
			</div>
			<div class="col-md-8 col-md-offset-2 pull-right">
				<input type="submit" value="Save" class="btn">
			</div>
		</div>
	</form>
</div>
</body>
</html>
