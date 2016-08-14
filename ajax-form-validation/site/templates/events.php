<?php snippet('header') ?>

<?php
// fetch events
$events = $page->children()->visible();

foreach($events as $event): ?>

  <h2><a href="<?php echo $event->url() ?>"><?php echo $event->title()->html() ?></a></h2>

<?php endforeach ?>

<?php snippet('footer') ?>
