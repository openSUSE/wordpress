<?php
/**
 * @package WordPress
 * @subpackage oo-bento_Theme
 */
?>

<form role="search" method="get" id="searchform" action="<?php echo get_bloginfo('url'); ?>" >
  <div>
    <!-- TODO: use Label as action indicator ==> JS needed -->
    <label class="screen-reader-text layer-label" for="s">Search</label>
    <input type="text" value="" name="s" id="s" />
    <input type="submit" id="searchsubmit" class="hidden" value="Search" />
  </div>
</form>