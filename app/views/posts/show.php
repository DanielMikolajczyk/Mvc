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
            <?= $data['post']->title ?>
          </h2>
          <div class="text-sm font-weight-bold">
            <span><?= $data['post']->created_at ?></span>
            &#124;
            <?php foreach($data['tags'] as $tag): ?>
              <span class="text-primary-o"><?= $tag ?></span>
              &#124;
            <?php endforeach; ?>
            <button class="btn-primary-o">
              <a href="<?= URLROOT ?>/posts/edit/<?= $data['post']->id ?>">Edytuj</a>
            </button>
          </div>
        </div>
        <p class="text-sm my-5">
          <?= $data['post']->body ?>
        </p>
      </article>
      <!-- End of articles -->
    </section>
    <?php require_once APPROOT.'/views/includes/aside.php';?>
    
  </div>
</main>

<?php require_once APPROOT.'/views/includes/footer.php';?>
