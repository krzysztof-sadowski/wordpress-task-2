<!DOCTYPE html>
<html <?php language_attributes() ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ) ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title('|', true, 'right') ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ) ?>">
        <link rel="stylesheet" href="<?php echo sip_get_uri('css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="<?php echo sip_get_uri('style.css') ?>">
        <link rel="stylesheet" href="<?php echo sip_get_uri('css/post-content.css') ?>">
        <script src="<?php echo sip_get_uri('js/jquery-1.11.1.min.js') ?>"></script>
        <?php wp_head() ?>
    </head>
    <body <?php body_class() ?>>
        <div id="header-container">
            <div class="container">
                <header class="row" id="header-main">
                    <div class="col-md-3 text-center">
                        <a href="<?php echo esc_url(home_url('/')) ?>" rel="home">
                            <img src="<?php echo sip_get_uri('img/logo.png') ?>" alt="Sowa & Przyjaciele" class="img-responsive" />
                        </a>
                    </div>
                    <div class="col-md-9">
                        <?php if(function_exists('pll_the_languages')) : ?>
                            <div>
                                <ul id="lang-switcher" class="hidden-xs">
                                    <?php pll_the_languages(array(
                                        'show_names' => 0,
                                        'show_flags' => 1,
                                    )); ?>
                                </ul>
                                <ul id="lang-switcher" class="visible-xs-block">
                                    <?php pll_the_languages(array(
                                        'show_names' => 1,
                                        'show_flags' => 1,
                                    )); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <div>
                            <?php get_template_part('menu', 'main') ?>
                        </div>
                    </div>
                </header>
            </div>    
        </div>
        <div id="header-backdrop"></div>
        <div id="widgets-top-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12" id="widgets-top">
                        <?php if(is_active_sidebar('top')) { dynamic_sidebar('top'); } ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="content-wrapper">
        
            