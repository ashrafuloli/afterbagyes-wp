<?php
/**
 * Template Name: Diensten
 */
get_header();
//the_content();
?>

<div class="diensten-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 text-center">
                <div class="diensten-header">
                    <h3>Diensten en prijzen</h3>
                    <p>Ieder bedrijf is anders en daarom is ook iedere prijs anders. Laten we eerst goed in kaart
                        brengen wat bij jou past en samen tot een goed besluit komen. <span>Afterbagyes</span> richt
                        zichzelf voornamelijk op <span>branding</span> en <span>vormgeving</span>, maar heeft ook
                        ervaring op het gebied van; <span>online marketing, fotografie, strategisch advies </span> en
                        meer..</p>
                </div>
            </div>
        </div>
        <div class="row diensten-row">
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="diensten-wrap">
                    <h3 class="title">BRANDING</h3>
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/icon-1.png"
                             alt="icon">
                    </div>
                    <div class="content">
                        <p>Jouw missie, visie en kernwaarden laten leven?</p>
                        <a href="#" class="read-more">Op aanvraag</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="diensten-wrap">
                    <h3 class="title">VORMGEVING</h3>
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/icon-2.png"
                             alt="icon">
                    </div>
                    <div class="content">
                        <p>Visitekaartjes, posters, flyers, een whitepaper oi.d.?</p>
                        <a href="#" class="read-more">Op aanvraag</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="diensten-wrap">
                    <h3 class="title">MEER...</h3>
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/icon-3.png"
                             alt="icon">
                    </div>
                    <div class="content">
                        <p>Online marketing, advies, fotografie, of iets anders?</p>
                        <a href="#" class="read-more">Op aanvraag</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>
