<?php
defined('ABSPATH') or die('No script kiddies please!');

get_header();
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-push-3 text-center content">
            <?php
                $language = 'pl';
                if(function_exists('pll_current_language')) {
                    $language = pll_current_language('slug');
                }
                if($language == 'pl') {
                    ?>
                        <h1>404</h1>
                        <p>Nie odnaleziono szukanej strony.</p>
                        <p><a href="<?php echo esc_url(home_url('/')) ?>">Wróć na stronę główną</a></p>
                    <?php
                } else {
                    ?>
                        <h1>404</h1>
                        <p>The page you are looking for could not be found.</p>
                        <p><a href="<?php echo esc_url(home_url('/')) ?>">Head back to the home page</a></p>
                    <?php
                }
            ?>
            
        </div>
    </div>
</div>
<?php
get_footer();