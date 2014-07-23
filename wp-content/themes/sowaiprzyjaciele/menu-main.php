<nav class="navbar navbar-default" id="menu-main" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sowaiprzyjaciele-navbar-main">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="sowaiprzyjaciele-navbar-main">
            <?php
                wp_nav_menu(array(
                    'theme_location'  => 'main',
                    'container'       => false,
                    'menu_class'      => 'nav navbar-nav',
                    'menu_id'         => 'menu-main',
                    'depth'           => 2,
                ));
            ?>
        </div>
    </div>
</nav>