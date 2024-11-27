


<div class="row my-3">

	<div class="col-12">

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
						
						<td>
							<a href="php/ingreso/guardar.php?accion=editar&id=<?php echo $fila['id']; ?>">
								<?php echo $fila['cc_invitado']. "<br><hr>" . $fila['invitado']  ;    ?></td>						
							</a>
						<td>
							<a href="php/ingreso/guardar.php?accion=editar1&id=<?php echo $fila['id']; ?>">
								<?php echo $fila['cc_invitado1']. "<br><hr>" . $fila['invitado1'] ;     ?>
								
							</a>
							<?php echo "<br><hr>" . $fila['est_inv1']  ;    ?>
						</td>
						<td>
							<a href="php/ingreso/guardar.php?accion=editar2&id=<?php echo $fila['id']; ?>">
								<?php echo $fila['cc_invitado2']. "<br><hr>" . $fila['invitado2'] ;    ?>
								
							</a>
							<?php echo "<br><hr>" . $fila['est_inv2']  ;    ?>
						</td>
						<td><?php echo $fila['estado'];     ?></td>

						
					</tr>

				<?php

				endforeach;

				desconectarBD($conexion);
				?>


			</tbody>




		</table>
	</div>
</div>
