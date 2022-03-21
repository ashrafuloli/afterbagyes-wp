<?php
/**
 * Template Name: Uitgelicht-Project
 */
get_header();
//the_content();
?>

<div class="uitgelicht-section pt-150 pt-md-100 pt-xs-70 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 order-2 order-lg-1">
                <div class="uitgelicht-header mt-25">
                    <h3 class="uitgelicht-title">Titel project</h3>
                    <p class="uitgelicht-subtitle">Verhaaltje over het project... (waarschijnlijk worden dit landingspagina’s?)</p>
                    <p class="uitgelicht-desc">mogelijk 2 kollomen?</p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 order-1 order-lg-2 text-center mb-md-40 mb-xs-40">
                <div class="uitgelicht-thumb">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/thumb/thumb-4.png" alt="thumb">
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>
