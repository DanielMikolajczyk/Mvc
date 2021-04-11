<nav class="navbar navbar-expand-lg navbar-light main-width mx-auto">
  <a class="navbar-brand" href="<?= URLROOT ?>/posts/index">
    <img src="<?= URLROOT ?>/public/img/logo.png" class="logo" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto text-sm">
      <li class="nav-item">
        <a class="nav-link" href="#">O nas</a>
      </li>
      <li class="nav-item dropdown" id="blog-Li">
        <a class="nav-link dropdown-toggle" id="blog-Dropdown">Blog</a>
        <div id="blog-Menu" class="dropdown-menu" aria-labelledby="blog-Dropdown">
          <a class="dropdown-item" href="<?= URLROOT ?>/blog/index">Artykuły</a>
          <a class="dropdown-item" href="#">Podcast</a>
          <a class="dropdown-item" href="#">Video</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Sklep</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Free</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Kursy online</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= URLROOT ?>/contacts/index">Kontakt</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Praca</a>
      </li>
      <li class="nav-item">
      <?php if(isset($_SESSION['user_id'])): ?>
        <a class="nav-link" href="<?= URLROOT ?>/users/logout">Wyloguj</a>
      <?php else: ?>
        <a class="nav-link" href="<?= URLROOT ?>/users/login">Zaloguj</a>
      <?php endif; ?>
      </li>

      
    </ul>
  </div>
</nav>