<?php
/**
 * Template Name: About page
 * @package mrkaluzny
 */

get_header(); ?>

<section>
  <div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h2 class="text-center mar-side-50"><?php the_field('short') ?></h2>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 ">
      <?php if (have_posts()) : while (have_posts()) : the_post();?>
        <?php the_content(); ?>
      <?php endwhile; endif; ?>
    </div>
  </div>
</div>
</section>
<section class="aboutme">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="about-con">
                        <div class="information">
                            <h2>Wojciech Kałużny</h2><hr>
                            <h3>Webdesign &amp; Development</h3>
                            <h4><span class="glyphicon glyphicon-map-marker"></span> Poznań, Poland</h4> </div>
                            <hr>
                        <div class="skills">
                           <h4><span class="glyphicon glyphicon-flag"></span> Skills</h4>
                            <div>HTML5</div>
                            <div>CSS3</div>
                            <div>JavaScript</div>
                            <div>MongoDB</div>
                            <div>Express.js</div>
                            <div>Angular.js</div>
                            <div>Node.js</div>
                            <div>WordPress</div>
                        </div>
                        <hr>
                        <div class="details">
                           <h4>Overview</h4>
                            <p>Thanks to programming I'm able to develop ideas using only my imagination and a computer. This idea is both liberating and mesmerizing, which happend to be the things I look for in my life.</p>
                            <p>Today I help people execute their ideas in a way which they customers will truly love and appreciate. Knowing that my work makes life of few hundred people a day easier by providing them with is the most rewarding feeling in the world.</p>
                        </div>
                    </div>
                    <div class="about-con">
                       <h3><span class="glyphicon glyphicon-fire"></span> Experience</h3>
                       <div class="work">
                            <div>mrkaluzny.com</div>
                            <div>Freelance Web Developer</div>
                            <div>September 2015 - present</div>
                            <p>I work as a freelance developer for website development and webapps development with MEAN Stack technologies.</p>
                        </div>
                        <hr>
                        <div class="work">
                            <div>Blue Owl sp. z o.o.</div>
                            <div>Marketing Designer | Front-end Developer</div>
                            <div>March 2015 - present</div>
                            <p>As a marketing designer and front-end developer at Blue Owl I'm responsible for planning marketing strategies for our clients and preparing IT solutions to support the execution of those plans.</p>
                        </div>
                    </div>
                    <div class="about-con">
                        <h3><span class="glyphicon glyphicon-education"></span> Certificates</h3>
                        <div class="certificate">
                            <div>Front End Certificate</div>
                            <div>Free Code Camp | 25/07/2016</div>
                            <p>Free Code Camp is an open-source community that helps to learn code with self-paced coding challenges, projects to build and certifications to earn. Total estimated time to finish all challenges is 1,200 hours and total time needed to earn Full Stack Developer Certification is 2,080 hours - exactly one year of coding.  After first 477 hours of coding challenges I've claimed Front-End Development Certification on 25th of July 2016.</p>
                        </div>
                        <hr>
                        <div class="certificate">
                            <div>Front-End JavaScript Frameworks: AngularJS</div>
                            <div>The Hong Kong University</div>
                            <p>This course concentrated mainly on Javascript based front-end frameworks, and in particular, AngularJS, the most popular among them. It reviewed the model view controller (MVC) design-pattern in the context of AngularJS. I was introduced to various aspects of AngularJS including two-way data binding and angular directives and filters as well as angular controllers and scopes, UI routing and templates, modules and services. Single page application (SPA) development using Angular was also explored.</p>
                        </div>
                        <hr>
                        <div class="certificate">
                            <div>Front-End Web UI Frameworks and Tools (Bootstrap &amp; jQuery)</div>
                            <div>The Hong Kong University</div>
                            <p>This course gave me an overview of client-side web frameworks, in particular Bootstrap. I learned about grids and responsive design, Bootstrap CSS and JavaScript components, and got to know CSS preprocessors - Less and Sass.</p>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </section>

<div class="wrapper"></div>

<?php get_footer(); ?>
