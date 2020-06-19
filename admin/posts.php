<?php  
 include("config/conn.php");
 //$connect = mysqli_connect("localhost", "pltcmthz_igualagob", "Iguala!123.", "pltcmthz_igualagob");  
 $query ="SELECT * FROM publicacion, usuario WHERE isPublished=1 and publicacion.idUsuario = usuario.idUsuario ORDER BY idpost DESC";  
 $result = mysqli_query($connect, $query);  
 ?> 
    <?php include('config/nu-post.php'); ?>
    <?php include('includes/header.php'); ?>
    <?php include('includes/menu.php'); ?>

    
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <!--<h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>-->

                        <?php 
                               if (isset($_SESSION['messageupdate'])): ?>
                               <p></p>
                                <div class="alert alert-success" role="alert">
                                    
                                    <?php 
                                        
                                        echo $_SESSION['messageupdate']; 
                                        unset($_SESSION['messageupdate']);
                                    ?>
                                </div>
                            <?php endif ?>

                        <?php
                        if(isset($_GET['action']) == 'delete'){
                            $id_delete = intval($_GET['idPost']);
                            $query = mysqli_query($connect, "SELECT * FROM publicacion WHERE idPost='$id_delete'");
                            if(mysqli_num_rows($query) == 0){
                                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
                            }else{
                                $delete = mysqli_query($connect, "UPDATE publicacion SET isPublished=0 WHERE idPost='$id_delete' ");
                                if($delete){
                                    echo '<p></p><div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  Bien hecho, los datos han sido eliminados correctamente.</div>';
                                    echo '<meta http-equiv="refresh" content="2;url=posts.php">';

                                }else{
                                    echo '<p></p><div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
                                }
                            }
                        }
                        ?>
                        <p></p>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i> Publicaciones</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Imagen</th>
                                                <th>Titulo</th>
                                                <th>Autor</th>
                                                <th>Categoría</th>
                                                <th>Estatus</th>
                                                <th>Fecha</th>
                                                <th class="text-center"> Acciones </th> 

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Imagen</th>
                                                <th>Titulo</th>
                                                <th>Autor</th>
                                                <th>Categoría</th>
                                                <th>Estatus</th>
                                                <th>Fecha</th>
                                                <th class="text-center"> Acciones </th> 

                                            </tr>
                                        </tfoot>
                                        <?php  
                                        while($row = mysqli_fetch_array($result))  
                                        {  
                                            echo '  
                                            <tr>  
                                                    <td><img src="'.$BASE_URL.'archivos/'.$row["featuredimg"].'" width="100" height="100"></td>
                                                    <td>'.$row["titulo"].'</td>  
                                                    <td>'.$row["nombre"].'</td>  
                                                    <td>'.$row["categoria"].'</td>  
                                                    <td>'.$row["isPublished"].'</td>  
                                                    <td>'.$row["fechaPublicacion"].'</td> 
                                                    <td><center>
                                                    <a target="_blank" href="http://iguala.gob.mx/'.$row['slug'].'"  data-toggle="tooltip" title="Editar datos" class="btn btn-info btn-sm rounded-0"> <i class="fa fa-eye"></i> </a>
                                                    <a href="editar_post.php?idPost='.$row['idPost'].'"  data-toggle="tooltip" title="Editar datos" class="btn btn-success btn-sm rounded-0"> <i class="fa fa-edit"></i> </a>
                                                    <a href="posts.php?action=delete&idPost='.$row['idPost'].'"  data-toggle="tooltip" title="Eliminar" class="btn btn-danger btn-sm rounded-0"> <i class="fa fa-trash"></i> </a>
                                                    </center></td>
                                            </tr>  
                                            ';  
                                        }  
                                        ?>  
                                    </table>
                                </div>
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
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
