


<div class="row my-3">

	<div class="col-12">

		<!-- Botón para abrir modal de crear estudiante -->
		<div class="mb-3">
			<button class="btn btn-primary" data-toggle="modal" data-target="#modalCrear">Agregar estudiante + invitados</button>
		</div>

		<!-- Modal de creación -->
		<div class="modal fade" id="modalCrear" tabindex="-1" role="dialog" aria-labelledby="modalCrearLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modalCrearLabel">Nuevo estudiante e invitados</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form method="post" action="php/ingreso/guardar.php">
		      <div class="modal-body">
		        <div class="form-group">
		          <label for="invitado">Nombre estudiante</label>
		          <input type="text" class="form-control" name="invitado" id="invitado" required>
		        </div>
		        <div class="form-group">
		          <label for="cc_invitado">Cédula estudiante</label>
		          <input type="text" class="form-control" name="cc_invitado" id="cc_invitado" required>
		        </div>
		        <hr>
		        <div class="form-group">
		          <label for="invitado1">Invitado 1 - nombre</label>
		          <input type="text" class="form-control" name="invitado1" id="invitado1">
		        </div>
		        <div class="form-group">
		          <label for="cc_invitado1">Invitado 1 - cédula</label>
		          <input type="text" class="form-control" name="cc_invitado1" id="cc_invitado1">
		        </div>
		        <hr>
		        <div class="form-group">
		          <label for="invitado2">Invitado 2 - nombre</label>
		          <input type="text" class="form-control" name="invitado2" id="invitado2">
		        </div>
		        <div class="form-group">
		          <label for="cc_invitado2">Invitado 2 - cédula</label>
		          <input type="text" class="form-control" name="cc_invitado2" id="cc_invitado2">
		        </div>
		        <div class="form-group">
		          <label for="novedad">Novedad</label>
		          <textarea class="form-control" name="novedad" id="novedad" rows="2"></textarea>
		        </div>
		        <input type="hidden" name="accion" value="crear">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		        <button type="submit" class="btn btn-primary">Guardar</button>
		      </div>
		      </form>
		    </div>
		  </div>
		</div>


		<table id="miTabla" class="table table-striped table-bordered table-hover">
			<thead>

				<tr>
					<th>id</th>
					<th>Graduado</th>
					<th>Invitado 1</th>
					<th>invitado 2</th>
					<th>Esado</th>
					
					<!-- th como titulos deben aver en td espacios -->

				</tr>
			</thead>

			<tbody>
				<?php

					include_once("clases/cls_conectarBD.php");

					$conexion = conectarBD();

					$sSQL = "SELECT * FROM registro";

					$datos = $conexion->query($sSQL);

					foreach ($datos as $fila) :

				?>

					<tr>
						<td><?php echo $fila['id'];         ?></td>
						
						<td style="background-color: <?php echo ($fila['estado'] == 'Presente') ? '#ed969e' : ''; ?>;">
							<a href="php/ingreso/guardar.php?accion=editar&id=<?php echo $fila['id']; ?>">
								<?php echo $fila['cc_invitado']. "<br><hr>" . $fila['invitado']; ?>
							</a>
						</td>
						<td style="background-color: <?php echo ($fila['est_inv1'] == 'Presente') ? '#ed969e' : ''; ?>;">
							<a href="php/ingreso/guardar.php?accion=editar1&id=<?php echo $fila['id']; ?>">
								<?php echo $fila['cc_invitado1']. "<br><hr>" . $fila['invitado1'] ;     ?>
								
							</a>
							<?php echo "<br><hr>" . $fila['est_inv1']  ;    ?>
						</td>
						<td style="background-color: <?php echo ($fila['est_inv2'] == 'Presente') ? '#ed969e' : ''; ?>;">
							<a href="php/ingreso/guardar.php?accion=editar2&id=<?php echo $fila['id']; ?>">
								<?php echo $fila['cc_invitado2']. "<br><hr>" . $fila['invitado2'] ;    ?>
								
							</a>
							<?php echo "<br><hr>" . $fila['est_inv2']  ;    ?>
						</td>
						<td style="background-color: <?php echo ($fila['estado'] == 'Presente') ? '#ed969e' : ''; ?>;"><?php echo $fila['estado'];     ?></td>

						
					</tr>

				<?php

				endforeach;

				desconectarBD($conexion);
				?>


			</tbody>




		</table>
	</div>
</div>

<!-- Script: enviar form del modal por AJAX y recargar al completar -->
<script>
document.addEventListener('DOMContentLoaded', function () {
	const form = document.querySelector('#modalCrear form');
	if (!form) return;

	form.addEventListener('submit', function (e) {
		e.preventDefault();
		const url = form.action;
		const data = new FormData(form);

		// Enviar petición con fetch y cabecera para indicar AJAX
		fetch(url, {
			method: 'POST',
			headers: {
				'X-Requested-With': 'XMLHttpRequest'
			},
			body: data
		})
		.then(response => response.json())
		.then(json => {
			if (json && json.ok) {
				// cerrar modal
				const modalEl = document.getElementById('modalCrear');
				if (modalEl) {
					$(modalEl).modal('hide'); // usar Bootstrap via jQuery si está disponible
				}
				// recargar la página para ver el nuevo registro
				window.location.href = window.location.pathname + '?creado=1';
			} else {
				window.location.href = window.location.pathname + '?creado=0';
			}
		})
		.catch(err => {
			console.error('Error al crear registro:', err);
			window.location.href = window.location.pathname + '?creado=0';
		});
	});
});
</script>
