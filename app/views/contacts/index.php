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
      <h4 class="text-primary-o">Skonaktuj się z nami</h4>
      <form action="">


      </form>
    <script src="<?= URLROOT ?>/js/map.js"></script>
    <div id="map"></div>
    </div>
  </div>
</main>

<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBjyQ3JNK_LNhAlsoT-6R5ZsoFYK9XChE&callback=initMap&libraries=&v=weekly"
      async
    ></script>
<?php require_once APPROOT.'/views/includes/footer.php';?>
