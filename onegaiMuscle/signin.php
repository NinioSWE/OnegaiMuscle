  <!-- Portfolio Section -->
  <section class="page-section portfolio" id="signin">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">start your journey</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

		<!-- Contact Section Form -->
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <form name="signin" id="signinForm" novalidate="novalidate" >
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Username</label>
                <input class="form-control" id="username" type="text" placeholder="Username" required="required" data-validation-required-message="Please enter your username.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Password</label>
                <input class="form-control" id="password" type="password" placeholder="Password" required="required" data-validation-required-message="Please enter your password.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
			<div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Image link</label>
                <input class="form-control" id="imageLink" type="text" placeholder="Image link" required="required" data-validation-required-message="Please enter a URL to a profile picture.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Register</button>
            </div>
          </form>
        </div>
      </div>

    </div>

    </div>
  </section>