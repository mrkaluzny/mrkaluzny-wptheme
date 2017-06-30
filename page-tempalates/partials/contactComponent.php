<section class="contact-component">
  <div class="container">
    <div class="row">
      <h1 class="text-center component-title">Let’s <strong>get in touch</strong>, shall we?</h1>
      <div class="col-md-12">
        <div class="contact-component__message" id="contactComponentMessage">
          <p></p>
        </div>
        <form action="<?php echo get_template_directory_uri(); ?>/mailer.php" class="form" method="POST" id="contactComponentForm">
          <div class="form-group form-group--underline">
            <label class="label" for="cname">Name and surname *</label>
            <input class="input" name="cname" id="cname" required/>
          </div>
          <div class="form-group form-group--underline">
            <label class="label" for="cemail">Email *</label>
            <input type="email" class="input" name="cemail" id="cemail" required />
          </div>
          <div class="form-group form-group--underline">
            <label class="label" for="cmessage">How may I help? *</label>
            <textarea class="input textarea" name="cmessage" id="cmessage" required></textarea>
          </div>
          <div class="form-group text-center">
            <input type="submit" class="btn-basic __contact-form" value="Send"/>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
