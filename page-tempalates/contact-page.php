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
                <form action="/" class="form">
                  <div class="form-group form-group--underline">
                    <label class="label">Name and surname</label>
                    <input class="input" />
                  </div>
                  <div class="form-group form-group--underline">
                    <label class="label">Email</label>
                    <input type="email" class="input" />
                  </div>
                  <div class="form-group form-group--underline">
                    <label class="label">How may I help?</label>
                    <textarea class="input textarea"></textarea>
                  </div>
                  <div class="form-group text-center">
                    <input type="submit" class="btn-basic __contact-form" value="Send"/>
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
