<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><img style="width: 70px; margin-left: 2vw;" src="image/logo.png" alt="Logo du site"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link <?php if ($page == 'accueil') {echo('active');} ?>" href="index.php">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if ($page == 'habitat') {echo('active');} ?>" href="liste_habitat.php">Habitat</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if ($page == 'service') {echo('active');} ?>" href="liste_service.php">Service</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if ($page == 'animal') {echo('active');} ?>" href="liste_animal.php">Animal</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if ($page == 'contact') {echo('active');} ?>" href="formulaire_contact.php">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if ($page == 'compte') {echo('active');} ?>" href="connexion.php">Mon compte</a>
      </li>
    </ul>
  </div>
</nav>