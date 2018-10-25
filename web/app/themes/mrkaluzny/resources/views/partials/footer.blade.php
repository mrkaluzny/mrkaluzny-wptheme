<footer class="footer">
  <div class="footer__top">
    <div class="title title--white">
      <h2 class="title__top">What's Next</h2>
      <h1 class="title__main">Let's work together!</h1>
    </div>
    <div id="availability"></div>
    <div class="footer__hello">
      @if(get_field('availability_content'))
        <p>{{ the_field('availability_content', 'options')}}</p>
      @endif
      <p> If you'd like to talk about a project you want help with or need an advice about development or product design, just drop me a message at <a href="mailto:wk@mrkaluzny.com">wk@mrkaluzny.com</a></p>
    </div>
  </div>
  <div class="footer__break">
  </div>
  <div class="container">
    <div class="row">
      <div class="footer__bottom">
        <ul class="footer__social">
          <li>
            <a href="https://instagram.com/mrkaluzny" class="footer__link" target="_blank">
              @include('icons.instagram')
            </a>
          </li>
          <li>
            <a href="https://twitter.com/mrkaluzny" class="footer__link" target="_blank">
              @include('icons.twitter')
            </a>
          </li>
          <li>
            <a href="https://github.com/mrkaluzny" class="footer__link" target="_blank">
              @include('icons.github')
            </a>
          </li>
          <li>
            <a href="https://linkedin.com/in/mrkaluzny" class="footer__link" target="_blank">
              @include('icons.linkedin')
            </a>
          </li>
        </ul>
        <div class="footer__copyright">© 2015 - {{ date('Y') }} Wojciech Kałużny All Rights Reserved</div>
      </div>
    </div>
  </div>
</footer>
