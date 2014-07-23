<?php
defined('ABSPATH') or die('No script kiddies please!');

get_header();
?>
<div class="container">
    <?php
    if(get_post_type($post) == 'with-submenu-panel') {
        get_template_part('post', 'with-submenu-panel');
    } else {
        get_template_part('post');
    }
    ?>
</div>
<?php
get_footer();
