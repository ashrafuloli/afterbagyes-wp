<?php
/**
 * Template Name: Projecten
 */
get_header();
//the_content();
?>

<div class="projecten-section-2 pt-150 pt-md-100 pt-xs-100">
    <div class="container">
        <div class="row mb-200 mb-lg-100 mb-md-100 mb-xs-50">
            <div class="col-xl-12 text-center">
                <h2 class="projecten-title mb-20">Projecten</h2>
                <p class="projecten-subtitle">Tekst over projecten etc.</p>
            </div>
        </div>
        <div class="row projecten-row">
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="projecten-wrapper">
                    <div class="projecten-thumb">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/thumb/thumb-2.png" alt="thumb">
                    </div>
                    <div class="projecten-content">
                        <h4>Voorbeeld</h4>
                        <p>platte tekst</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="projecten-wrapper">
                    <div class="projecten-thumb">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/thumb/thumb-2.png" alt="thumb">
                    </div>
                    <div class="projecten-content">
                        <h4>Voorbeeld</h4>
                        <p>platte tekst</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="projecten-wrapper">
                    <div class="projecten-thumb">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/thumb/thumb-2.png" alt="thumb">
                    </div>
                    <div class="projecten-content">
                        <h4>Voorbeeld</h4>
                        <p>platte tekst</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>
