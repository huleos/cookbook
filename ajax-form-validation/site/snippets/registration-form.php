<!-- /site/snippets/registration-form.php -->
<?php if(!isset($response['success'])):  ?>
<form id="event-registration" action="<?= $page->url() ?>"  method="post">

  <div class="form-element">
    <label for="firstname">First Name: *</label>
    <input type="text" id="firstname" name="firstname" placeholder="First name"  value="<?= isset($data['firstname']) ? $data['firstname'] : ''  ?>" required/>
    <div class="alert"><?php if(isset($response['errors']['firstname'])) { echo $response['errors']['firstname']; } ?></div>
  </div>

  <div class="form-element">
    <label for="lastname">Last Name: *</label>
    <input type="text" id="lastname" name="lastname" placeholder="Last name"  value="<?= isset($data['lastname']) ? $data['lastname'] : ''  ?>" required/>
    <div class="alert"><?php if(isset($response['errors']['lastname'])) { echo $response['errors']['lastname']; } ?></div>
  </div>

  <div class="form-element">
    <label for="company">Company: </label>
    <input type="text" id="company" name="company" placeholder="Company"  value="<?= isset($data['company']) ? $data['company'] : ''  ?>"  />
  </div>

  <div class="form-element">
    <label for="email">Email: *</label>
    <input type="email" name="email" id="email" placeholder ="mail@example.com" value="<?= isset($data['email']) ? $data['email'] : ''  ?>" required/>
    <div class="alert"><?php if(isset($response['errors']['email'])) { echo $response['errors']['email']; } ?></div>
  </div>

  <div class="form-element">
    <label for="message">Message:</label>
    <textarea name="message" id="message" placeholder="Do you have any comments?"><?= isset($data['message']) ? $data['message'] : ''  ?></textarea>
  </div>
 <div class="honey">
     <label for="message">If you are a human, leave this field empty</label>
     <input type="website" name="website" id="website" placeholder ="http://example.com" value="<?= isset($data['website']) ? $data['website'] : ''  ?>" />
 </div>
  <p>* required</p>

  <button class="button" type="submit" name="register" value="Register" </button>Register</button>

</form>
<?php endif ?>
<div class="message"><?php if(isset($response['success'])) { echo $response['success']; } elseif(isset($response['error'])) { echo $response['error']; }  ?></div>
