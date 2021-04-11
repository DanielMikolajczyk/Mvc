<?php require_once APPROOT.'/views/includes/head.php';?>
<?php require_once APPROOT.'/views/includes/navbar.php';?>

<main class="w-full">
  <div class="main-width mx-auto d-flex lg-flex-row my-5">
    <section class="blog flex-grow-1 lg-px-4">
      <!-- Create article -->
        <form action="<?= URLROOT ?>/posts/store" method="POST">
          <div class="border text-center">
            <div class="text-primary-o font-weight-bold my-4">
              Wybierz tagi
              <div class="text-left ml-5">
                <?php foreach($data['tags'] as $tag): ?>
                  <input type="checkbox" name="tags[]" id="<?= $tag->tag ?>" class="checkbox-o" value="<?= $tag->tag ?>">
                  <label for="<?= $tag->tag ?>" class="label-o"><?= $tag->tag ?></label>
                  <div></div>
                <?php endforeach; ?>
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
    <?php require_once APPROOT.'/views/includes/aside.php';?>
  </div>
</main>

<?php require_once APPROOT.'/views/includes/footer.php';?>
