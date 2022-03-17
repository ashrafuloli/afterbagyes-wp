<?php
/**
 * Template Name: Uitgelicht-Project
 */
get_header();
//the_content();
?>

<div class="uitgelicht-section pt-145 pb-200">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <div class="uitgelicht-header mt-25">
                    <h3 class="uitgelicht-title">Titel project</h3>
                    <p class="uitgelicht-subtitle">Verhaaltje over het project... (waarschijnlijk worden dit landingspagina’s?)</p>
                    <p class="uitgelicht-desc">mogelijk 2 kollomen?</p>
                </div>
            </div>
            <div class="col-xl-4">
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
