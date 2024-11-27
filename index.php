<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/datatable/css/bootstrap.css">
    <link rel="stylesheet" href="lib/datatable/css/dataTables.bootstrap4.min.css">
    <script src="lib/fontawesome/js/all.js"></script>


      <title>Grados</title>

      </head>
      <body>
        <div class="container my-4">
          <?php include_once("inc/encabezado.inc"); ?>   
      

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <?php include_once("php/ingreso/ingreso.php"); ?>
            </div>
          </div>
        </div>
      
    
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="lib/bootstrap/js/jquery-3.3.1.slim.min.js"></script>
    <script src="lib/bootstrap/js/popper.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/datatable/js/jquery.dataTables.min.js"></script>
    <script src="lib/datatable/js/dataTables.bootstrap4.min.js"></script>
    <script src="lib/fontawesome/js/all.js"></script>
    </body>
</html>

<script>
  $('#miTabla').DataTable({
    language: {
      processing: "Procesando...",
      search: "Buscar:",
      lengthMenu: "Mostrar _MENU_ elementos",
      info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      infoEmpty: "Ningún dato disponible en esta tabla",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      infoPostFix: "",
      loadingRecords: "Cargando...",
      zeroRecords: "No se encontraron resultados",
      emptyTable: "Ningún dato disponible en esta tabla",
      paginate: {
        first: "Primero",
        previous: "Anterior",
        next: "Siguiente",
        last: "Ultimo"
      },
      aria: {
        sortAscending: ": Activar para ordenar la columna de manera ascendente",
        sortDescending: ": Activar para ordenar la columna de manera descendente"
      }
    }
  });
</script>