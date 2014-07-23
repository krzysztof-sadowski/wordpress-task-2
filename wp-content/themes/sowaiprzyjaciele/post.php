<div class="row">
    <div class="col-xs-12">
        <div class="content">
            <?php
            while(have_posts()) {
                the_post();
                get_template_part('post', 'content');
            }
            ?>
        </div>
    </div>
</div>