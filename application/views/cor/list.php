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
			<h2>Lista de Cores           
				<div class="pull-right">
				<a class="btn btn-primary" href="<?php echo base_url('cor/create') ?>"> Criar uma nova cor</a>
				</div>
			</h2>
		</div>
	</div>
	<div class="table-responsive">
	<table class="table table-bordered">
	<thead>
		<tr>
			<th>Nome</th>
		<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($data as $d) { ?>      
		<tr>
			<td><?php echo $d->nome_cor; ?></td>
		<td>
			<a class="btn btn-info btn-xs" href="<?php echo base_url('cor/edit/'.$d->id_cor) ?>"><i class="glyphicon glyphicon-pencil"></i></a>
			<button type="button" class="btn btn-danger btn-xs" onclick="deletar(<?php echo $d->id_cor ?>)"><i class="glyphicon glyphicon-remove"></i></button>
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
	function deletar(id_cor){
		if(window.confirm("Deseja deletar esta Cor?")){
			$.ajax({
				method:'post',
				url:'<?php echo base_url('cor/delete') ?>',
				data:{id_cor},
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
