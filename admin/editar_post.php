<?php
 include("config/conn.php");
 //$connect = mysqli_connect("localhost", "pltcmthz_igualagob", "Iguala!123.", "pltcmthz_igualagob");  
 $query ="SELECT * FROM publicacion, usuario WHERE isPublished=1 and publicacion.idUsuario = usuario.idUsuario ORDER BY idpost DESC";  
 $result = mysqli_query($connect, $query);  
 ?> 
<?php include('config/nu-post.php'); ?>
    <?php include('includes/header.php'); ?>
    <?php include('includes/menu.php'); ?>
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
                            $idPost = intval($_GET['idPost']);
                            $sql = mysqli_query($connect, "SELECT *, DATE_FORMAT(fechaPublicacion, '%Y-%m-%dT%H:%i') AS custom_date  FROM publicacion WHERE idPost='$idPost'");
                            if(mysqli_num_rows($sql) == 0){
                                echo '<meta http-equiv="refresh" content="0;url=posts.php">';
                            }else{
                                $row = mysqli_fetch_assoc($sql);
                            }
                            $date = $row['fechaPublicacion'];
                            //$fechaPost = date('c', strtotime($date));
                            ?>
            
                            <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-plus-square"></i> Editar publicaciÃ³n</div>
                            <div class="card-body">
                            <form action="config/u-post.php" method="POST">

                            <div class="d-none form-group col-md-6">
                                    <label>ID</label>
                                    <input type="text" class="form-control" id="idPost" name="idPost" placeholder="id" value="<?php echo $row['idPost']; ?>" required>
                            </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" value="<?php echo $row['titulo']; ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" value="<?php echo $row['slug']; ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>CategorÃ­a</label>
                                    <select class="form-control" id="categoria" name="categoria">
                                        <option value="<?php echo $row['categoria'];?>" hidden><?php echo $row['categoria'];?></option>

                                     <option id="categoria" value="Coronavirus">Coronavirus</option>
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
                                    <input class="form-control" type="datetime-local" name="fechaP" id="fechaP" value="<?php echo $row['custom_date'] ?>">
                                </div>
                                </div>
                                <div class="form-group">
                                    <label>Imagen Destacada</label>
                                    <input type="text" class="form-control" name="feat_img" value="<?php echo $row['featuredimg']; ?>">
                                </div>
                      
                                <div class="form-group">
                                  
                                    <label>Escribe la publicaciÃ³n</label>
                                    <textarea id= "editor" name="editor"><?php echo $row['texto']; ?></textarea>
                                
                                    
                                </div>
                                <input style="float:right" value="Actualizar" type="submit" name="actualizar" class="btn btn-primary">
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

        <script>
        function slugify($string){
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));
        }
        </script>
        <!-- ==========   FIN CUSTOM ===================  -->

    </body>
</html>

