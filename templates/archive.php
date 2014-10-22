<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
  <?php 
    $return_string .= '<div class="post">';
    $return_string .= '<div class="blog-date">'.get_the_time('F j, Y').'</div>';
    $return_string .= '<h2 id="post-'.get_the_ID().'" class="archive-title"><a href="'.get_the_permalink().'" rel="bookmark">'.get_the_title().'</a></h2>';
    $return_string .= '<div class="break"></div>';
    $return_string .= '<div class="excerpt-archive-text">';
    $return_string .= get_the_excerpt();
    $return_string .= '</div>';
    $return_string .= '<div class="blog-read-more"><a href="'.get_the_permalink().'" rel="bookmark">Read More</a></div>';
    $return_string .= '<div class="break"></div>';
    $return_string .= '<div class="blog-meta">';
    $return_string .= '</div><!-- end .blog-meta -->';
    $return_string .= '</div><!-- end .post -->';
  ?>
  <?php endwhile; ?>
  <?php
    $return_string .= '<div id="postnavigation">';
    $return_string .= '<p>'.get_next_posts_link("&laquo; Older Entries") . get_previous_posts_link(" | Newer Entries &raquo;").'</p>';
    $return_string .= '</div> <!-- end #postnavigation -->';
  ?>
<?php endif; ?>