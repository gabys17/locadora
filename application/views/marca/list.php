<!DOCTYPE html>
<html>
<head>
    <title>Crud Veiculos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<script type="text/javascript" src="https://hmg.solution4fleet.com.br/dist/assets/js/jquery.min.js"></script>

</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-lg-12">           
			<h2>Lista de marcas           
				<div class="pull-right">
				<a class="btn btn-primary" href="<?php echo base_url('marca/create') ?>"> Criar nova Marca</a>
				</div>
			</h2>
		</div>
	</div>
	<div class="table-responsive">
	<table class="table table-bordered">
	<thead>
		<tr>
			<th>Nome</th>
			<th>CNPJ</th>
			<th>Rua</th>
			<th>Bairro</th>
			<th>Número</th>
			<th>Telefone</th>
			<th>Email</th>
		<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($marca as $d) { ?>      
		<tr>
			<td><?php echo $d->nome_marca; ?></td>
			<td><?php echo $d->cnpj; ?></td>          
			<td><?php echo $d->rua; ?></td>          
			<td><?php echo $d->bairro; ?></td>          
			<td><?php echo $d->numero; ?></td>          
			<td><?php echo $d->telefone; ?></td>          
			<td><?php echo $d->email; ?></td>          
		<td>
			<a class="btn btn-info btn-xs" href="<?php echo base_url('marca/edit/'.$d->id_marca) ?>"><i class="glyphicon glyphicon-pencil"></i></a>
			<button type="button" class="btn btn-danger btn-xs" onclick="deletar(<?php echo $d->id_marca ?>)"><i class="glyphicon glyphicon-remove"></i></button>
		</td>     
		</tr>
		<?php } ?>
	</tbody>
	</table>
	</div>
</div>
</body>
</html>
<script>
	function deletar(id_marca){
		if(window.confirm("Deseja deletar esta marca?")){
			$.ajax({
				method:'post',
				url:'<?php echo base_url('marca/delete') ?>',
				data:{id_marca},
				dataType:'JSON',
				success: function(response){
					if(response.status) {
						window.location.reload()
					} else {
						alert("Erro ao deletar")
					}
				}
			})
		}
	}		
</script>
