<!DOCTYPE html>
<html>
<head>
    <title>Editar Veiculo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
<div class="container">
	<form method="post" action="<?php echo base_url('veiculos/update/'.$veiculo->id);?>">
		<div class="row">
		<div class="col-md-8 col-md-offset-2">
				<select class="form-control" name="id_marca" style="width: 150px;">
					<option value="">Selecione a Marca</option>  
					<?php foreach ($marca as $m) : ?>
						<option value="<?php echo $m->id_marca ?>" <?php if ($m->id_marca == $veiculo->id_marca) { ?> selected <?php } ?> ><?php echo $m->nome_marca ?></option> 
					<?php endforeach; ?> 
				</select>	
			</div>
			<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<label class="col-md-3">Chassi</label>
					<div class="col-md-9">
						<input type="text" name="chassi" class="form-control" value="<?php echo $veiculo->chassi; ?>">
					</div>
				</div>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<label class="col-md-3">Placa</label>
					<div class="col-md-9">
						<input type="text" name="placa" class="form-control" value="<?php echo $veiculo->placa; ?>">
					</div>
				</div>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<label class="col-md-3">Numero de Portas</label>
					<div class="col-md-9">
						<input type="number" name="numero_portas" class="form-control" value="<?php echo $veiculo->numero_portas; ?>">
					</div>
				</div>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<select class="form-control" name="id_cor" style="width: 150px;">
					<option value="">Selecione a Cor</option>  
					<?php  foreach ($cor as $c) : ?>
						<option value="<?php echo $c->id_cor ?>" <?= $c->id_cor == $veiculo->id_cor ? "selected" : "" ?> ><?php echo $c->nome_cor ?></option> 
					<?php endforeach; ?> 
				</select>	
			</div>
			<div class="col-md-8 col-md-offset-2 pull-right">
				<input type="submit" name="Save" class="btn">
			</div>
		</div>
		
	</form>
</div>
</body>
</html>
