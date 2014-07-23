<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
    <?php the_title('<h2 class="post-title">', '</h2>') ?>
    <div class="post-content">
        <?php the_content() ?>
    </div>
    <div class="clearfix"></div>
    <?php
        $pagination = wp_link_pages(array(
            'before'           => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'sowaiprzyjaciele') . '</span>',
            'after'            => '</div>',
            'link_before'      => '<span>',
            'link_after'       => '</span>',
            'nextpagelink'     => '«', 
            'previouspagelink' => '»',
            'echo'             => 0
        ));
    ?>
    <?php if(!empty($pagination)) : ?>
        <div class="custom-pagination custom-post-pagination">
            <?php echo $pagination ?>
        </div>
    <?php endif; ?>
</article>


