<div class="row">
    <?php
        $submenu = sip_get_current_post_submenu('main', $post);
        $display_submenu = (!empty($submenu) && $submenu['items_count'] > 1);
    ?>
    <div class="<?php echo $display_submenu ? 'col-md-9 col-md-push-3' : 'col-xs-12' ?>">
        <div class="content content-with-submenu">
            <?php
                while(have_posts()) {
                    the_post();
                    get_template_part('post', 'content');
                }
            ?>
        </div>
    </div>
    <?php if($display_submenu) : ?>
        <div class="col-md-3 col-md-pull-9">
            <div class="content-menu">
                <div class="content-menu-top"></div>
                <?php sip_render_current_post_submenu($submenu) ?>
                <div class="content-menu-bottom"></div>
            </div>
        </div>
    <?php endif; ?>
</div>