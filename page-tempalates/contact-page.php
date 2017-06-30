<?php
/**
 * Template Name: Contact page
 * @package mrkaluzny
 */

get_header(); ?>

<section class="hero hero--contact hero--overlay" style="background-image: url('<?php the_post_thumbnail_url('cover-img'); ?>')">
  <div class="container">
    <div class="row">
      <div class="hero__content">
        <?php the_field('hero_text');?>
        <section class="contact-component contact-component--transparent">
            <div class="row">
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
                    <button role="submit" class="btn-basic __contact-form" id="sendButton">Send</button>
                  </div>
                </form>
              </div>
            </div>
        </section>

      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
