<!-- search -->
<form class="search-form" method="get" action="<?php echo home_url(); ?>" role="search">
  <input class="search-input" type="search" name="s" placeholder="<?php _e( 'Search', 'haobao' ); ?>">
  <button class="search-submit" type="submit" role="button"><?php _e( 'Search', 'haobao' ); ?></button>
          <span class="visuallyhidden">Search icon</span>
          @@include('partials/icons/search.html')
</form>
<!-- /search -->