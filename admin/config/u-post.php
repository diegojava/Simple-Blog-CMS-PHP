<?php
	session_start();
     include("conn.php");
    //$db = mysqli_connect('localhost', 'pltcmthz_igualagob', 'Iguala!123.', 'pltcmthz_igualagob');

    // initialize variables
    $idPost = "";
    $titulo = "";
    $slug = "";
    $texto = "";
    $fechaPublicacion = "";
    $fechaActualizacion = "";
    $idUsuario = "1";
    $isPublished = "1";
    $categoria = "";
    $etiquetas = "";
    $feat_img = "";
    
    if(isset($_POST['actualizar'])){
		$idPost = $_POST['idPost'];	
        $titulo = $_POST['titulo'];
		$slug = $_POST['slug'];
		$texto = mysqli_real_escape_string($connect, $_POST['editor']);
		$fechaPublicacion = $_POST['fechaP'];
		$fechaActualizacion = "curdate()";
		$idUsuario = "1";
		$isPublished = "1";
		$categoria = "";
		$etiquetas = "";
		$feat_img = $_POST['feat_img'];
				
				$update = mysqli_query($connect, "UPDATE publicacion SET titulo='$titulo', slug='$slug', texto='$texto', fechaPublicacion = '$fechaPublicacion', fechaActualizacion='$fechaActualizacion', featuredimg = '$feat_img' WHERE idPost='$idPost'") or die(mysqli_error());
				if($update){
                    $_SESSION['messageupdate'] = "Publicación actualizada de manera éxitosa"; 
                    header('location: ../posts.php');
				}else{
					echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = '../posts.php'</script>";
				}
			}
  ?>