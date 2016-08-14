<?php snippet('header') ?>
<?php foreach($site->users() as $account): ?>
      <li>
        <a href="#">
          <?php if( $account->avatar() ): ?>
            <img src="<?php echo $account->avatar()->resize(200)->url() ?>">
          <?php endif ?>
        </a>
        <p><?php echo $site->user('kirby')->firstName() ?></p>
      </li>
  <?php endforeach ?>


<?php /*
<?php if($alert): ?>
  <div class="message alert">
    <ul>
      <?php foreach($alert as $message): ?>
        <li><?php echo html($message) ?></li>
      <?php endforeach ?>
    </ul>
  </div>
<?php endif ?>

<?php if(isset($success)): ?>
  <div class="message success">
    <?php echo $success; ?>
  </div>
<?php endif ?>

<?php
if(! isset($success)) { */
//var_dump($response);
snippet('registration-form', compact('data'));
//}
?>

<?php snippet('footer') ?>
