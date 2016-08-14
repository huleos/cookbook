<form id="event-registration" action="" data-page="<?= $page->url() ?>" method="post">

  <div class="form-element">
    <label for="firstname">First Name: *</label>
    <input type="text" id="firstname" name="firstname" placeholder="First name"  value="" required/>
    <div class="alert"></div>
  </div>

  <div class="form-element">
    <label for="lastname">Last Name: *</label>
    <input type="text" id="lastname" name="lastname" placeholder="Last name"  required/>
    <div class="alert"></div>
  </div>

  <div class="form-element">
    <label for="company">Company: </label>
    <input type="text" id="company" name="company" placeholder="Company"/>
  </div>

  <div class="form-element">
    <label for="email">Email: *</label>
    <input type="email" id="email" name="email" placeholder ="mail@example.com" required/>
    <div class="alert"></div>
  </div>

  <div class="form-element">
    <label for="message">Message:</label>
    <textarea name="message" id="message" placeholder="Do you want to leave a comment?"></textarea>
  </div>
 <div class="honey" style="display:none">
     <label for="message">If you are a human, leave this field empty</label>
     <input type="website" name="website" id="website" placeholder ="http://example.com" />
 </div>
  <p>* required</p>

  <button class="button" type="submit" name="register">Register</button>

</form>
<div class="message"></div>
