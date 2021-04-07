<?php require_once APPROOT.'/views/includes/head.php';?>
<?php require_once APPROOT.'/views/includes/navbar.php';?>

<main class="w-full">
  <div class="main-width mx-auto text-center my-5">
    <div class="mx-5 w-400px border-pink mx-auto">
      <form action="<?= URLROOT ?>/users/login" method="POST">

        <div class="my-5">
          <span class="font-weight-bold text-primary-o text-xlg">Zaloguj się</span>
        </div>  

        <div class="my-4">
          <input type="text" class="input-o" name='username' placeholder="Username...">
        </div>
        <?php if($data['usernameError']): ?>
          <div class="text-danger my-2">
            <?= $data['usernameError'] ?>
          </div>
        <?php endif;?>

        <div class="my-5">
          <input type="password" class="input-o" name='password' placeholder="Hasło..." autocomplete="off">
        </div>
        <?php if($data['passwordError']): ?>
          <div class="text-danger my-2">
            <?= $data['passwordError'] ?>
          </div>
        <?php endif;?>

        <div class="my-4">
          <button class="btn-primary-o" type="submit" name="submit">Zatwierdź</button>
        </div>

        <?php if($data['success']): ?>
          <div class="mx-5 border-dgreen">
            <span class="font-weight-bold text-dgreen">Zalogowano pomyślnie</span>
          </div>
        <?php endif; ?>
      </form>
      <div class="my-5">
          Nie masz jeszcze konta? 
          <span>
            <a href="<?= URLROOT ?>/users/register" class="text-primary-o-link font-weight-bold ml-2">
              Zarejestruj się
            </a> 
          </span>
        </div>
    </div>
  </div>
</main>

<?php require_once APPROOT.'/views/includes/footer.php';?>
