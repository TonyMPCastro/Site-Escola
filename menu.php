
 <!DOCTYPE html>
<html lang="en">

<head>
  <?php
 session_start();
 ?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ESCOLA</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

</head>

<body> 
 <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
    <a href="home"><img  class="navbar-brand" width="130px" height="50px"  src="img/logo.png"></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="sobre">Sobre</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="services">Serviços</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact">Contato</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Portfolio
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
              <a class="dropdown-item" href="portfolio-1-col">1 Column Portfolio</a>
              <a class="dropdown-item" href="portfolio-2-col">2 Column Portfolio</a>
              <a class="dropdown-item" href="portfolio-3-col">3 Column Portfolio</a>
              <a class="dropdown-item" href="portfolio-4-col">4 Column Portfolio</a>
              <a class="dropdown-item" href="portfolio-item">Single Portfolio Item</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Blog
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item" href="blog-home-1">Blog Home 1</a>
              <a class="dropdown-item" href="blog-home-2">Blog Home 2</a>
              <a class="dropdown-item" href="blog-post">Blog Post</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Other Pages
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item" href="full-width">Full Width Page</a>
              <a class="dropdown-item" href="sidebar">Sidebar Page</a>
              <a class="dropdown-item" href="faq">FAQ</a>
              <a class="dropdown-item" href="404">404</a>
              <a class="dropdown-item" href="pricing">Pricing Table</a>
            </div>
          </li>
          <li class="nav-item">
            <a href="login" class="btn btn-primary" target="_blank">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</body>
</html>
