<?php snippet('header') ?>
<?php $articles = $pages->find('blog')->children() ?>

<h1>Authors</h1>

<?php foreach($page->children() as $author): ?>
<article class="author">

  <h1><?php echo $author->name()->html() ?></h1>

  <figure>
    <img src="<?php echo $author->images()->first()->url() ?>">
  </figure>

  <ul class="articles">
    <?php foreach($articles->filterBy('author', $author->uid()) as $article): ?>
    <li><a href="<?php echo $article->url() ?>"><?php echo $article->title() ?></a></li>
    <?php endforeach ?>
  </ul>

</article>
<?php endforeach ?>

<?php snippet('footer') ?>
