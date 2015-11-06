

      <!-- footer -->
      <footer class="footer" role="contentinfo">






        <!-- social media -->
        <ul class="sm-links--footer">
          <li>
            <a href="#" class="sm-twitter">
              <span class="visuallyhidden">Twitter icon</span>
               @@include('partials/icons/twitter.svg')
            </a>
          </li>
          <li>
            <a href="#" class="sm-facebook">
              <span class="visuallyhidden">Facebook icon</span>
               @@include('partials/icons/facebook.svg')
            </a>
          </li>
          <li>
            <a href="#" class="sm-instagram">
              <span class="visuallyhidden">Instagram icon</span>
               @@include('partials/icons/instagram.svg')
            </a>
          </li>
          <li>
            <a href="#" class="sm-google">
              <span class="visuallyhidden">Google icon</span>
               @@include('partials/icons/google.svg')
            </a>
          </li>
          <li>
            <a href="#" class="sm-tumblr">
              <span class="visuallyhidden">Tumblr icon</span>
               @@include('partials/icons/tumblr.svg')
            </a>
          </li>
        </ul>
        <!-- /social media -->






        <!-- copyright -->
        <p class="copyright">
          &copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>. <?php _e('Powered by', 'html5blank'); ?>
          <a href="//wordpress.org" title="WordPress">WordPress</a>
        </p>
        <!-- /copyright -->





      </footer>
      <!-- /footer -->

    </div>
    <!-- /wrapper -->

    <?php wp_footer(); ?>



    <!-- analytics -->
    <script>
    (function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
    (f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
    l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
    ga('send', 'pageview');
    </script>

  </body>
</html>
