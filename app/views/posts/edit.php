<?php require_once APPROOT.'/views/includes/head.php';?>
<?php require_once APPROOT.'/views/includes/navbar.php';?>

<main class="w-full">
  <div class="main-width mx-auto d-flex lg-flex-row my-5">
    <section class="blog flex-grow-1 lg-px-4">
      <!-- articles -->
      <article class="border-bottom">
        <div class="post-box">
          <div style="background: url('https://www.paniswojegoczasu.pl/wp-content/uploads/2021/03/ksiazka-czas-na-jezyki-dziewczyna.jpg') no-repeat; background-size: cover; background-position: center;" class="post-image w-full"></div>
          <h2 class="text-primary-o my-4">
            <?= $data->title ?>
          </h2>
          <div class="text-sm font-weight-bold">
            <span><?= $data->created_at ?></span>
            &#124;
            &#124;
            <span>
              <button class="btn-primary-o">
                <a href="<?= URLROOT ?>/posts/edit/<?= $data->id ?>">Edytuj</a>
              </button>
          </div>
        </div>
        <p class="text-sm my-5">
          <?= $data->body ?>
        </p>
      </article>
      <!-- End of articles -->
    </section>
    <aside class="about mx-auto">
      <div class="w-250px mx-auto about-img">
        <a href="">
          <img class=" w-250px h-250px" src="https://www.paniswojegoczasu.pl/wp-content/uploads/2016/06/ola-sidebar.jpg" alt="">
        </a>
      </div>
        <p class="text-xsm mt-4">
      Nazywam się Ola Budzyńska i jestem twórczynią Pani Swojego Czasu. Uczę kobiety zarządzania czasem, planowania, realizacji celów i biznesu online. Jestem przedsiębiorczynią, autorką #kursoksiążek, kursów online i e-booków, pomysłodawczynią Klubu Pań Swojego Czasu oraz właścicielką Przestrzeni Pełnej Czasu na krakowskim Kazimierzu.

      Jako Naczelna Gangu realizuję z nim naszą misję – chcemy, żeby każda kobieta zarządzała czasem po swojemu i żyła w zgodzie ze swoimi wartościami.
      </p>
      <div>
        <span class="text-primary-o text-sm">Zobacz mój zespół</span>
      </div>
    </aside>
  </div>
</main>

<?php require_once APPROOT.'/views/includes/footer.php';?>
