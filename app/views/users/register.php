<?php require_once APPROOT.'/views/includes/head.php';?>
<?php require_once APPROOT.'/views/includes/navbar.php';?>

<main class="w-full">
  <div class="main-width mx-auto text-center my-5">
    <div class="mx-5 w-400px border-pink mx-auto">
      <form action="<?= URLROOT ?>/users/register" method="POST">
        <div class="my-5">
          <span class="font-weight-bold text-primary-o text-xlg">Zarejestruj się</span>
        </div>  

        <div class="my-4">
          <input type="text" class="input-o" name='username' placeholder="Username...">
        </div>
        <?php if($data['usernameError']): ?>
          <div class="text-danger my-2">
            <?= $data['usernameError'] ?>
          </div>
        <?php endif;?>

        <div class="my-4">
          <input type="text" class="input-o" name='email' placeholder="Email...">
        </div>
        <?php if($data['emailError']): ?>
          <div class="text-danger my-2">
            <?= $data['emailError'] ?>
          </div>
        <?php endif;?>

        <div class="my-4">
          <input type="password" class="input-o" name='password' placeholder="Hasło..." autocomplete="off">
        </div>
        <?php if($data['passwordError']): ?>
          <div class="text-danger my-2">
            <?= $data['passwordError'] ?>
          </div>
        <?php endif;?>

        <div class="my-4">
          <input type="password" class="input-o" name='confirmPassword' placeholder="Potwierdź hasło..." autocomplete="off">
        </div>
        <?php if($data['confirmPasswordError']): ?>
          <div class="text-danger my-2">
            <?= $data['confirmPasswordError'] ?>
          </div>
        <?php endif;?>

        <div class="my-4">
          <button class="btn-primary-o" type="submit" name="submit">Zatwierdź</button>
        </div>

        <?php if($data['success']): ?>
          <div class="mx-5 border-dgreen">
            <span class="font-weight-bold text-dgreen">Zarejestrowano pomyślnie</span>
          </div>
        <?php endif; ?>

        <div class="my-5">
          Masz już konto? 
          <span>
            <a href="<?= URLROOT ?>/users/login" class="text-primary-o-link font-weight-bold ml-2">
              Zaloguj się
            </a> 
          </span>
        </div>
      </form>
    </div>
  </div>
</main>

<?php require_once APPROOT.'/views/includes/footer.php';?>
