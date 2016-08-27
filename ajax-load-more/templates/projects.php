<?php snippet('header') ?>

  <main class="main" role="main">
    <h1><?= $page->title()->html() ?></h1>
    <?= $page->text()->kirbytext() ?>

    <ul class="projects" data-page="<?= $page->url() ?>" data-limit="<?= $limit ?>">

      <!-- Loop through the projects -->
      <?php foreach($projects as $project): ?>
      <?php snippet('project', compact('project')) ?>
      <?php endforeach ?>

    </ul>
    <button class="load-more">Load more</button>

  </main>

<?php snippet('footer') ?>
