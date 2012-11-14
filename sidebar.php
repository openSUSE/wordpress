<?php
/**
 * @package WordPress
 * @subpackage oo-bento_Theme
 */
?>

<div class="grid_4 omega aside">
  <!-- <div class="box box-shadow"> -->
    <ul>
      <?php /* Widgetized sidebar, if you have the plugin installed. */
            /* Please Use Widgets to add content to sidebars */
        if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
      <?php endif; ?>
      
    <!-- </div> -->

</div>