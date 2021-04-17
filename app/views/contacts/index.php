<?php require_once APPROOT.'/views/includes/head.php';?>
<?php require_once APPROOT.'/views/includes/navbar.php';?>

<main class="w-full">
  <div class="bg-img-contact">
    <div class="main-width mx-auto py-5">
      <h2>Witaj!</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, error.</p>
      <p>Lorem ipsum dolor sit amet consectetur . Blanditiis, error.</p>
      <p>Lorem ipsum dolor sit amet consectetur . Blanditiis, error.</p>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Bla, error.</p>
      <p class="font-weight-bold ">Do zobaczenia!</p>
    </div>
  </div>
  <div class="my-5">
    <div class="main-width mx-auto py-5">
      <h4 class="text-primary-o text-center">Skonaktuj się z nami</h4>
      <?php if($_GET['success']): ?>
        <h6 class="text-dgreen text-center">Wiadomość wysłana pomyślnie</h6>
      <?php elseif($data['error']):?>
        <h6 class="text-primary-o text-center">Nie udało się, wysłać wiadmości</h6>
      <?php endif;?>
      <form action="<?= URLROOT ?>/contacts/store" method="POST">
          <div class="border text-center">

            <div class="my-4">
              <h4 class="my-2 text-primary-o">Nazwa:</h4>
              <input autocomplete="off" type="text" name="name" class="input-o">
            </div>

            <div class="my-4">
              <h4 class="my-2 text-primary-o">Email:</h4>
              <input autocomplete="off" type="text" name="email" class="input-o">
            </div>

            <div class="my-4">
              <h4 class="my-2 text-primary-o">Tytuł:</h4>
              <input autocomplete="off" type="text" name="title" class="input-o">
            </div>
            
            <div class="my-4">
              <h4 class="my-2 text-primary-o">Treść:</h4>

              <textarea name="body" class="text-area-o"></textarea>
            </div>
            <div class="my-3">
              <button class="btn-primary-o" type="submit" name="submit">Wyślij wiadomość!</button>
            </div>
          </div>
        </form>
        <h4 class="text-primary-o text-center my-5">Nasza lokalizacja</h4>
      <script src="<?= URLROOT ?>/js/map.js"></script>
      <div id="map" class="my-3 mx-auto"></div>
    </div>
  </div>
</main>

<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBjyQ3JNK_LNhAlsoT-6R5ZsoFYK9XChE&callback=initMap&libraries=&v=weekly"
      async
    ></script>
<?php require_once APPROOT.'/views/includes/footer.php';?>
