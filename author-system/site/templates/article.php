<?php snippet('header') ?>

<article>

  <h1><?php echo $page->title()->html() ?></h1>
  <time><?php echo $page->date('d.m.Y') ?></time>
  <?php echo $page->text()->kirbytext() ?>

  <?php $author = $pages->find('authors/' . $page->author()) ?>
  <aside class="author">

    <h1><?php echo $author->name() ?></h1>

    <figure>
      <img src="<?php echo $author->images()->first()->url() ?>">
    </figure>

    <?php echo $author->bio()->kirbytext() ?>

    <h2>On the web:</h2>

    <ul>
      <li><a href="<?php echo $author->website() ?>">Website</a></li>
      <li><a href="<?php echo $author->twitter() ?>">Twitter</a></li>
    </ul>

  </aside>

</article>

<?php snippet('footer') ?>
