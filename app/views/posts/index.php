<?php require_once APPROOT.'/views/includes/head.php';?>
<?php require_once APPROOT.'/views/includes/navbar.php';?>

<main class="w-full">
  <div class="main-width mx-auto my-5">
    <div class="w-50 mx-auto text-center">
      <?php if(isset($_SESSION['user_id'])): ?>
        <button class="btn-primary-o-xlg">
          <a href="<?= URLROOT ?>/posts/create">Stwórz nowy post</a>
        </button>
      <?php endif; ?>
    </div>
  </div>
  <div class="main-width mx-auto d-flex lg-flex-row my-5">
    <section class="blog flex-grow-1 lg-px-4">
      <!-- articles -->
      <?php $iterator = 0; ?>
      <?php foreach($data['posts'] as $post): ?>
        <article class="border-bottom">
          <div class="post-box">
            <div style="background: url('https://www.paniswojegoczasu.pl/wp-content/uploads/2021/03/ksiazka-czas-na-jezyki-dziewczyna.jpg') no-repeat; background-size: cover; background-position: center;" class="post-image w-full"></div>
            <h2 class="text-primary-o my-4">
              <?= $post->title?>
            </h2>
            <div class="text-sm font-weight-bold">
              <span><?= $post->created_at ?></span>
              &#124;
              <?php foreach($data['tags'][$iterator] as $tag): ?>
              <span class="text-primary-o"><?= $tag ?></span>
              &#124;
              <?php endforeach; ?>
              <span><?= $data['authors'][$iterator] ?></span>
              <?php if(isset($_SESSION['user_id'])): ?>
                &#124;
                <span>
                  <button class="btn-primary-o">
                    <a href="<?= URLROOT ?>/posts/edit/<?= $post->id ?>">Edytuj</a>
                  </button>
                </span>
              <?php endif; ?>
            </div>
          </div>
          <p class="text-sm my-5">
            <?= $post->body?>
          </p>
        </article>
        <?php $iterator++;?>
      <?php endforeach; ?>
      <!-- End of articles -->
    </section>
    <?php require_once APPROOT.'/views/includes/aside.php';?>
  </div>
</main>

<?php require_once APPROOT.'/views/includes/footer.php';?>
