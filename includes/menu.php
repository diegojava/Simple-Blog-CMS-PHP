 <body> 
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="<?php echo $BASE_URL ?>index.php">Simple Blog CMS PHP</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $BASE_URL ?>index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $BASE_URL ?>about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $BASE_URL ?>blog.php">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $BASE_URL ?>contacto.php">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>