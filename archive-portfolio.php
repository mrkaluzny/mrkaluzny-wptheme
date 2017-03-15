<?php get_header(); ?>

<section class="hero __small">
  <div class="container flex">
    <div class="row text-center">
      <h1 style="text-align:center;">Portfolio</h1>
      <h2>Moje projekty są super</h2>
    </div>
  </div>
</section>

<section class="portfolio-single __gray">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1 class="subtitle">Przykładowy tekst (w razie jakby coś wymyślono)</h1>
        <h2 class="content">Przykładowo jakby było więcej</h2>
      </div>
    </div>
  </div>
</section>


<?php get_template_part('components/portfolio', 'archive'); ?>

<?php get_footer(); ?>
