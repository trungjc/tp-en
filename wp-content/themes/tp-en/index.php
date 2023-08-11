<?php
get_header();

echo '<main class="main">';
if(have_posts()):
	while (have_posts()): the_post();
		the_content();
	endwhile;
endif;
?>home page
<?php
echo '</main>';

get_footer();
