    <?php include('config/nu-post.php'); ?>
    <?php include('includes/header.php'); ?>
    <?php include('includes/menu.php'); ?>
    <?php ob_start(); ?>
    
   <script>
   /* Encode string to slug */
function convertToSlug( str ) {
	
  //replace all special characters | symbols with a space
  str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
	
  // trim spaces at start and end of string
  str = str.replace(/^\s+|\s+$/gm,'');
	
  // replace space with dash/hyphen
  str = str.replace(/\s+/g, '-');	
  document.getElementById("slug").value= str;
  //return str;
}

   </script>
    
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4"></h1><p></p>                           
                               <?php 
                               if (isset($_SESSION['message'])): ?>
                                <div class="alert alert-success" role="alert">
                                    <?php 
                                        echo $_SESSION['message']; 
                                        unset($_SESSION['message']);
                                    ?>
                                </div>
                            <?php endif ?>
                            <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-plus-square"></i> AÃ±adir nueva publicaciÃ³n</div>
                            <div class="card-body">
                            <form action="config/nu-post.php" method="POST">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label>Titulo</label>
                                    <input type="text" onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)"  class="form-control" id="titulo" name="titulo" placeholder="Titulo" required>
                                    </div> 

                                    <div class="form-group col-md-6">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="slug">
                                    </div>
                                </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>CategorÃ­a</label>
                                    <select class="form-control" id="categoria" name="categoria">
                                    <option id="categoria" value="Coronavirus">Coronavirus</option>
                                    <option id="categoria" value="CAPAMI">CAPAMI</option>
                                    <option id="categoria" value="Alumbrado">Alumbrado</option>
                                    <option id="categoria" value="Basura">Basura</option>
                                    <option id="categoria" value="Transito">Tr¨¢nsito</option>
                                    <option id="categoria" value="Prevencion Social del Delito">Prevenci¨®n Social del Delito</option>
                                    <option id="categoria" value="Secretaria de Salud">Secretar¨ªa de Salud</option>
                                    <option id="categoria" value="Parques y Jardines">Parques y Jardines</option>
                                    <option id="categoria" value="Secretaria Desarrollo Social">Secretar¨ªa de Desarrollo Social</option>

                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Fecha</label>
                                    <input type="datetime-local" class="form-control" name="fechaP" id="fechaP">
                                </div>
                                </div>
                                <div class="form-group">
                                    <label>Imagen Destacada</label>
                                    <input class="form-control" type="text" name="feat_img" id="feat_img" value="no_img.jpg" />
                                </div>
                      
                                <div class="form-group">
                                    <label>Escribe la publicaciÃ³n</label>
                                    <textarea id= "editor" name="editor"></textarea>
                                
                                    
                                </div>
                                <input style="float:right" value="Publicar" type="submit" name="publicar" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2019</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>

        <!-- ==========  SCRIPTS CUSTOMS =============== -->

        
        <script src="jquery-1.9.0.min.js"></script>
<script>
function validateImage() {
	var img = $("#img_file").val();
 
	var exts = ['jpg','jpeg','png','gif', 'bmp'];
	// split file name at dot
	var get_ext = img.split('.');
	// reverse name to check extension
	get_ext = get_ext.reverse();
 
	if (img.length > 0 ) {
		if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
		  return true;
		} else {
			 alert("Upload only jpg, jpeg, png, gif, bmp images");
			return false;
		}			
	} else {
		alert("please upload an image");
		return false;
	}
	return false;
}
</script>
 
        <!-- ==========   FIN CUSTOM ===================  -->

    </body>
</html>

