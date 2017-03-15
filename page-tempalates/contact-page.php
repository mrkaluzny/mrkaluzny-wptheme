<?php
/**
 * Template Name: Contact page
 * @package mrkaluzny
 */

get_header(); ?>

<section class="hero __small">
        <div class="container flex">
          <div class="row text-center">
            <h1 style="text-align:center;">Porozmawiajmy</h1>
            <h2>O twoim projekcie</h2>
          </div>
        </div>
      </section>

      <section class="contact">
        <div class="container">
          <div class="row">

              <div class="card">
                <div class="row">
                  <div class="col-md-4 photo" style="background-image:url('assets/img/poznan.jpg');">
                  </div>
                  <div class="col-md-8">
                    <div class="contact-info">
                      <h5>Our office</h5>
                      <h2>Headquaters</h2>
                      <p>Plac Europejski 2 <br /> 00-844 Warsaw, Poland</p>
                      <hr>
                      <p>87 887 88 23</p>
                      <p><a href="#">wk@mrkaluzny.pl</a></p>
                    </div>
                  </div>
                </div>
              </div>

          </div>
        </div>
      </section>

      <section class="contact-component __underlay">
        <div class="container">
          <div class="row">
            <h2 class="text-center component-title">Zapraszam do kontaktu</h2>
            <div class="col-md-12">
              <form action="/" class="form">
                <div class="form-group">
                  <label>Imię i nazwisko</label>
                  <input class="input" />
                </div>
                <div class="form-group">
                  <label>Adres email *</label>
                  <input type="email" class="input" />
                </div>
                <div class="form-group">
                  <label>W czym mogę pomóc?</label>
                  <textarea class="input"></textarea>
                </div>
                <div class="form-group text-center">
                  <input type="submit" class="btn-basic __contact-form" value="Wyślij"/>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>

<?php get_footer(); ?>
