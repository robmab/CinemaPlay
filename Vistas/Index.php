<!DOCTYPE html>
<html lang="en">

<head>
  <?php session_start();
  include '../ConexiónBD.php';

  /* Check Controler */
  if (isset($_SESSION['check']))
    unset($_SESSION['check']);
  else
    header("Location:../Controladores/MoviesController.php");
  ?>

  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" href="../img/core-img/favicon.ico">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../css/css.css">
  <link rel="stylesheet" href="../css/views/home.css">
  <title>CinemaPlay</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- LEFT -->
    <a class="navbar-brand" href="#">
      <img src="../img/Logo.png" alt="" width="150" height="150">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Top películas<span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Proximos estrenos<span class="sr-only"></span></a>
        </li>

      </ul>

      <!-- SEARCH -->
      <div class="input-group">
        <input id="title" placeholder="Buscar película por nombre" type="text" class="form-control"
          aria-label="Text input with dropdown button">
        <div class="hr" style="width: 0.1em;"></div>
        <div class="input-group-append">
          <p>Fecha</p>
          
          <select id="release-date">
            <option value="" selected disabled hidden>Elegir fecha</option>
            <option value="rigatoni">Rigatoni</option>
          </select>

        </div>
        <div class="hr"></div>
        <div class="input-group-append">
          <p>Idioma</p>
          <select id="original-language">
            <option value="" selected disabled hidden>Elegir idioma</option>
            <?php 
            $languages = array();
            foreach ($_SESSION['films'] as $c => $arr) {
                $languages[] =strtoupper($arr['original_language'])    ;
            }
            $languages = array_unique($languages);
            foreach ($languages as $language) { ?>
              <option value="<?php echo $language?>"><?php echo $language?></option>
            <?php } ?>
          </select>
        </div>
        <div
          class="icon-search"
          onclick="filterCards()"        
        >
          <img src="../img/Icon_Search-Black.png" alt="" width="21px">
        </div>

      </div>
    </div>

    <!-- RIGHT -->
    <div class="rigth-icons">
      <img src="../img/Icon_Icon_Shopping_Cart_white.png" alt="" height="30px" width="30px">
      <img src="../img/Usser.png" alt="" height="60px" width="60px">
    </div>

  </nav>

  <!-- HERO -->
  <header>
    <div class="hero">
      <div class="content">
        <h1>¡Listas las palomitas!</h1>
        <p>Encuentra la mejor selección de películas, estrenos y taquilleras a nivel mundial. Dale play</p>
      </div>
    </div>
  </header>

  <!-- BOODY -->

  <div class="body container-fluid">
    <h1>Top películas</h1>
    <div class="movies row">

      <?php foreach ($_SESSION['films'] as $c => $arr) { ?>

        <div
          class="movie-card  col-lg-2 col-6"
          data-title="<?php echo $arr['title']?>"
          data-release-date="<?php echo $arr['release_date']?>"
          data-original-language="<?php echo $arr['original_language']?>"
        >
          <div class="cover"
            style="background-image: url('<?php echo $arr['backdrop_path']?>');">
          </div>
          <div class="header">
            <h2><?php echo $arr['title']?></h2>
            <p class="date"><?php echo $arr['release_date']?></p>
            <p class="rating"><img src="../img/Icon_Star.png" alt=""><?php echo $arr['vote_average']?>
            <span>(<?php echo $arr['vote_count']?> votos)</span></p>
          </div>
          <div class="info">
            <p><?php echo $arr['overview']?></p>
            <div class="lang">
              <p class="">Idioma
              <div class="hr"></div> <span><?php echo $arr['original_language']?></span></p>
            </div>
          </div>
        </div>

      <?php } ?>

    </div>
  </div>

  <!-- FOOTER -->
  <footer>
    <div class="footer">

      <div class="content">
        <div class="select">
          <img src="../img/Icon_Globe.png" alt="" width="18px" width="18px">
          <select class="form-select" aria-label="Default select example">
            <option selected value="Español">Español</option>
            <option value="Ingles">Ingles</option>
          </select>
        </div>
        <div>
          <h1>Navegación</h1>
          <p>Top películas</p>
          <p>Próximos estrenos</p>
        </div>
        <div>
          <h1>Legal</h1>
          <p>Aviso Legal</p>
          <p>Política de Privacidad</p>
          <p>Política de Cookies</p>
        </div>
        <div>
          <h1>Nosotros</h1>
          <p>info@dominio.com</p>
          <p>641 02 22 31</p>
        </div>
        <div class="social">
          <h1>Síguenos</h1>
          <a href=""><img src="../img/Icon_Facebook.png" alt=""></a>
          <a href=""><img src="../img/Icon_Linkedin.png" alt=""></a>
          <a href=""><img src="../img/Icon_Twitter.png" alt=""></a>
        </div>
      </div>

      <div class="end">
        <p>@ 2022 Prueba desarrollador Lagahe</p>
      </div>
    </div>

  </footer>

  <script>
    function filterCards() {
      const cards = document.querySelectorAll('.movie-card');
      const title = document.querySelector('#title')?.value.toLowerCase() || '';
      const releaseDate = document.querySelector('#release-date')?.value.toLowerCase() || '';
      const originalLanguage = document.querySelector('#original-language')?.value.toLowerCase() || '';
      cards.forEach(card => {
        const cardTitle = card.getAttribute('data-title').toLowerCase();
        const cardReleaseDate = card.getAttribute('data-release-date').toLowerCase();
        const cardOriginalLanguage = card.getAttribute('data-original-language').toLowerCase();
        if (cardTitle.includes(title) && cardReleaseDate.includes(releaseDate) && cardOriginalLanguage.includes(originalLanguage)) {
          card.classList.remove('hidden');
        } else {
          card.classList.add('hidden');
        }

        /* debugger */
      });
    }
  </script>

</body>

</html>