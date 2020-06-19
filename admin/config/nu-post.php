<?php 
	session_start();
	 include("conn.php");
	//$db = mysqli_connect('localhost', 'pltcmthz_igualagob', 'Iguala!123.', 'pltcmthz_igualagob');

	// initialize variables
	$titulo = "";
	$slug = "";
	$texto = "";
	$fechaPublicacion = "";
	$fechaActualizacion = "";
	$idUsuario = "1";
	$isPublished = "1";
    $categoria = "";
	$etiquetas = "";
	$img_file = "";
	
	$name = "";
	$address = "";
	$id = 0;
	$update = false;

	if (isset($_POST['publicar'])) {
		$titulo = $_POST['titulo'];
		$slug = $_POST['slug'];
		$texto = $_POST['editor'];
		$fechaPublicacion = $_POST["fechaP"];
		$fechaActualizacion = "curdate()";
		$idUsuario = "1";
		$isPublished = "1";
		$categoria = $_POST['categoria'];
		$etiquetas = "";
		$feat_img = $_POST['feat_img'];
		
		
		$query = "INSERT INTO publicacion (titulo, slug, texto, fechaPublicacion, fechaActualizacion, idUsuario, isPublished, featuredimg, categoria)
		VALUES ('$titulo', '$slug', '$texto', '$fechaPublicacion', $fechaActualizacion, $idUsuario, $isPublished, '$feat_img', '$categoria')";
		mysqli_query($connect, $query);
		//echo $query;
		$_SESSION['message'] = "Publicación realizada con éxito";
		     

		header('location:../nuevo_post.php');
		
		
	}


	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$address = $_POST['address'];

		mysqli_query($connect, "UPDATE info SET name='$name', address='$address' WHERE id=$id");
		$_SESSION['message'] = "Address updated!"; 
		header('location: index.php');
	}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($connect, "DELETE FROM info WHERE id=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: index.php');
}


	$results = mysqli_query($connect, "SELECT * FROM info");


?>