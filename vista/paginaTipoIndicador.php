<?php
	include '../controlador/configBd.php';
	include '../controlador/ControlConexion.php';
	include '../controlador/ControlTipoIndicador.php';
	include '../modelo/TipoIndicador.php';  
	$boton = "";
	$id = "";
	$nombre = "";
	$objControlTipoIndicador = new ControlTipoIndicador(null,null);

  $arregloTipoIndicador = $objControlTipoIndicador->listar();

  
	if (isset($_POST['bt'])) $boton = $_POST['bt'];//toma del arreglo post el value del bt	
	if (isset($_POST['txtEmail'])) $id = $_POST['txtEmail'];
	if (isset($_POST['txtContrasena'])) $nombre = $_POST['txtContrasena'];
	switch ($boton) {
		case 'Guardar':
			$objUsuario = new Usuario($id, $nombre);
			$objControlTipoIndicador = new ControlUsuario($objUsuario);
			$objControlRepresenVisual->guardar();
			header('Location: vistaUsuarios.php');
			break;
		case 'Consultar':
			$objUsuario = new Usuario($id, "");
			$objControlRepresenVisual = new ControlUsuario($objUsuario);
			$objUsuario = $objControlRepresenVisual->consultar();
			$nombre = $objUsuario->getContrasena();
			break;
		case 'Modificar':
			$objUsuario = new Usuario($id, $nombre);
			$objControlRepresenVisual = new ControlUsuario($objUsuario);
			$objControlRepresenVisual->modificar();
			header('Location: vistaUsuarios.php');
			break;
		case 'Borrar':
			$objUsuario = new Usuario($id, "");
			$objControlRepresenVisual = new ControlUsuario($objUsuario);
			$objControlRepresenVisual->borrar();
			header('Location: vistaUsuarios.php');
			break;
		
		default:
			# code...
			break;
	}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gestión de tipo de indicador</title>

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="paginaInicio.php">Indicadores 1330</a></h1>


      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Inicio</a></li>
          <li><a class="nav-link scrollto" href="#legal">Módulo Legal</a></li>
          <li><a class="nav-link scrollto" href="#indicadores">Módulo Indicadores</a></li>
          <li><a class="nav-link scrollto " href="#usuarios">Módulo Usuarios</a></li>
          <div class="nav-item dropdown">
				<a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle user-action">Usuario <b class="caret"></b></a>
				<div class="dropdown-menu">
					<a href="#" class="dropdown-item"><i class="fa fa-user-o"></i> Configuración</a>
					<div class="divider dropdown-divider"></div>
					<a href="#" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Cerrar Sesión</a>
				</div>
			</div>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  
<section id="hero" class="mt-5 d-flex align-items-center">
  <div class="container-lg">
      <div class="table-responsive">
          <div class="table-wrapper">
              <div class="table-title">
                  <div class="row">
                      <div class="col-sm-7 mt-4 float-left"><h2>Tipo <b>Indicadores</b></h2></div>
                      <div class="col-sm-5" style="text-align: right;">
                          <a href="#crudModal" class="btn btn-outline-info mt-4" style="width:max-content" data-toggle="modal"><i class="fa fa-cog"></i> Administrar Indicadores</a>
                      </div>
                  </div>
              </div>
              <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th style="background-color:lightgray">ID</th>
                          <th style="width: 50%; background-color:lightgray">Nombre</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php
                    for($i = 0; $i < count($arregloTipoIndicador); $i++){
                  ?>
                      <tr>
                          <td><?php echo $arregloTipoIndicador[$i]->getId();?></td>
                          <td><?php echo $arregloTipoIndicador[$i]->getNombre();?></td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
              </table>
          </div>
      </div>
  </div>     
</section>

    <div class="container d-md-flex py-4">
      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Indicadores</span></strong>. Todos los derechos reservados
        </div>
      </div>
      </div>
    </div>
  </footer><!-- End Footer -->

<div id="crudModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
              <form action="vistaUsuarios.php" method="post">
                <div class="modal-header " style="background-color:lightgray">						
                  <h4 class="modal-title">Tipo indicador</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">					
                  <div class="form-group">
                    <label>ID</label>
                    <input type="text" id="txtId" name="txtId" class="form-control" value="<?php echo $id ?>">
                  </div>
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" id="txtNombre" name="txtNombre" class="form-control" value="<?php echo $nombre ?>">
                  </div>
                  <div class="form-group">
                    <input type="submit" id="btnGuardar" name="bt" class="btn btn-success" value="Guardar">
                    <input type="submit" id="btnConsultar" name="bt" class="btn btn-primary" value="Consultar">
                    <input type="submit" id="btnModificar" name="bt" class="btn btn-warning" value="Modificar">
                    <input type="submit" id="btnBorrar" name="bt" class="btn btn-danger" value="Borrar">
                  </div>				
              </div>
			  </form>
		  </div>
	  </div>
</div>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>

<script>
  $(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	var actions = $("table td:last-child").html();
	// Append table with add row form on add new button click
    $(".add-new").click(function(){
		$(this).attr("disabled", "disabled");
		var index = $("table tbody tr:last-child").index();
        var row = '<tr>' +
            '<td><input type="text" class="form-control" name="name" id="name"></td>' +
            '<td><input type="text" class="form-control" name="department" id="department"></td>' +
			'<td>' + actions + '</td>' +
        '</tr>';
    	$("table").append(row);		
		$("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
    });
	// Add row on add button click
	$(document).on("click", ".add", function(){
		var empty = false;
		var input = $(this).parents("tr").find('input[type="text"]');
        input.each(function(){
			if(!$(this).val()){
				$(this).addClass("error");
				empty = true;
			} else{
                $(this).removeClass("error");
            }
		});
		$(this).parents("tr").find(".error").first().focus();
		if(!empty){
			input.each(function(){
				$(this).parent("td").html($(this).val());
			});			
			$(this).parents("tr").find(".add, .edit").toggle();
			$(".add-new").removeAttr("disabled");
		}		
    });
	// Edit row on edit button click
	$(document).on("click", ".edit", function(){		
        $(this).parents("tr").find("td:not(:last-child)").each(function(){
			$(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
		});		
		$(this).parents("tr").find(".add, .edit").toggle();
		$(".add-new").attr("disabled", "disabled");
    });
	// Delete row on delete button click
	$(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
		$(".add-new").removeAttr("disabled");
    });
});

</script>
</html>