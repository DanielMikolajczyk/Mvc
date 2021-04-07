<?php require_once APPROOT.'/views/includes/head.php';?>
<?php require_once APPROOT.'/views/includes/navbar.php';?>

<main class="w-full">
  <div class="main-width mx-auto d-flex lg-flex-row my-5">
    <section class="blog flex-grow-1 lg-px-4">
      <!-- Creaet article -->
        <form action="<?= URLROOT ?>/posts/store" method="POST">
          <div class="border text-center">
            <div class="text-primary-o font-weight-bold my-4">
              Wybierz tagi
              <div class="text-left ml-5">
                <div>
                  <input type="checkbox" name="tags[]" id="tag1" class="checkbox-o" value="1">
                  <label for="tag1" class="label-o">Label</label>
                </div>
                <div>
                  <input type="checkbox" name="tags[]" id="tag2" class="checkbox-o">
                  <label for="tag2" class="label-o">Label</label>
                </div>
                <div>
                  <input type="checkbox" name="tags[]" id="tag3" class="checkbox-o">
                  <label for="tag3" class="label-o">Label</label>
                </div>
              </div>
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
              <button class="btn-primary-o" type="submit" name="submit">Wstaw</button>
            </div>
          </div>
        </form>
      <!-- End of create article -->
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
