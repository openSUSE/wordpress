<?php
/**
 * @package WordPress
 * @subpackage oo-bento_Theme
 */
?>

<?php get_header(); ?>


<!-- Start: Main Content Area -->
<div id="content" class="container_16 ui-oo-content-wrapper">
  <div class="box box-shadow grid_12 alpha main">

     <?php if (have_posts()) : ?>

      <?php if(is_author()) {
        $user = get_userdatabylogin(get_query_var('author_name'));
        $username = get_the_author_meta('user_login', $user->ID);
        $userdescription = get_the_author_meta('description', $user->ID); ?>
        <div class="author-bio">
            <?php printf('<a target="_blank" href="http://en.opensuse.org/User:%s"><h2>%s</h2></a>', $username, $user->display_name);
            if($userdescription != '') {
                printf('<h4>%s</h4>', $userdescription);}?>
        </div>
      <?php } ?>

      <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
      <?php /* If this is a category archive */ if (is_category()) { ?>
      <h2 class="pagetitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
      <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
      <h2 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
      <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
      <h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
      <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
      <h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
      <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
      <h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
      <?php /* If this is an author archive */ } elseif (is_author()) { ?>
      <h2 class="pagetitle">Author Archive</h2>
      <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
      <h2 class="pagetitle">Blog Archives</h2>
      <?php } ?>

      <div class="navigation page-navigation">
        <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
        <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
        <div class="clearfix"></div>
      </div>

      <?php while (have_posts()) : the_post(); ?>
      <div <?php post_class() ?>>
          <h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
          <small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?> </small>

          <div class="share-links">
	    <div class="share-link">
              <a href="http://twitter.com/share" class="twitter-share-button"
                data-url="<?php echo get_permalink(); ?>"
                data-text="openSUSE News: <?php the_title() ?>"
                data-count="horizontal"
                data-hashtags="openSUSE"
                data-via="openSUSE">Tweet</a>
            </div>
            <div class="share-link">
              <iframe src="https//www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink()); ?>&amp;layout=button_count&amp;show_faces=true&amp;width=100&amp;action=like&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>
            </div>
            <div class="clear"></div>
          </div>

          <div class="entry">
            <?php the_content() ?>
          </div>

          <p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>

        </div>

      <?php endwhile; ?>

      <div class="navigation page-navigation">
        <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
        <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
      </div>
    <?php else :

      if ( is_category() ) { // If this is a category archive
        printf("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
      } else if ( is_date() ) { // If this is a date archive
        echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
      } else if ( is_author() ) { // If this is a category archive
        $userdata = get_userdatabylogin(get_query_var('author_name'));
        printf("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
      } else {
        echo("<h2 class='center'>No posts found.</h2>");
      }
      get_search_form();

    endif;
  ?>
  </div>

    <?php get_sidebar(); ?>

</div>
<!-- End: Main Content Area -->

<?php get_footer(); ?>
