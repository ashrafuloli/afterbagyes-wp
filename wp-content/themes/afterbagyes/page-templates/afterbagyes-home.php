<?php
/**
 * Template Name: Home Page
 */
get_header();
//the_content();
?>

<!--<img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/img/thumb/thumb-1.png" alt="thumb">-->


<div class="hero-area">
    <div class="container">
        <div class="row justify-content-lg-between justify-content-center">
            <div class="col-xl-5 col-lg-5 col-md-10">
                <div class="hero-thumb">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/thumb/thumb-1.png" alt="thumb">
                </div>
            </div>
            <div class="col-xl-6 col-lg-7 col-md-10">
                <div class="hero-content-wrapper">
                    <h2 class="hero-title">afterbagyes.</h2>
                    <p class="hero-subtitle">Samen groeien,</p>
                    <p class="hero-description">
                        Hoe mooi zou het zijn als we samen kunnen groeien, door onze kennis te delen en in de praktijk
                        toe te passen? Tja, of je bent gewoon op zoek naar ondersteuning, dat kan natuurlijk ook.
                        Afterbagyes gaat dit soort uitdagingen graag aan en zoekt door middel van creativiteit een
                        oplossing voor jou vraagstuk.
                    </p>
                    <a href="#" class="hero-btn">CONTACT</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="projecten-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 text-center">
                <h2 class="projecten-title mb-80">Projecten</h2>
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
        <div class="row mt-md-30 mt-xs-30">
            <div class="col-xl-12 text-center">
                <div class="projecten-btn">
                    <a href="#">Meer projecten</a>
                </div>
            </div>
        </div>
    </div>
</div>

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

<div class="blog-section">
    <div class="container">
        <div class="row mb-85 mb-md-50 mb-xs-40">
            <div class="col-xl-12 text-center">
                <div class="blog-title">
                    <h3>Blog</h3>
                </div>
            </div>
        </div>
        <div class="row blog-row">
            <div class="col-xl-4 col-md-6">
                <div class="blog-content-wrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/thumb/thumb-3.png" alt="thumb">
                    <div class="blog-content">
                        <a href="#">Meer lezen</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="blog-content-wrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/thumb/thumb-3.png" alt="thumb">
                    <div class="blog-content">
                        <a href="#">Meer lezen</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="blog-content-wrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/thumb/thumb-3.png" alt="thumb">
                    <div class="blog-content">
                        <a href="#">Meer lezen</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-md-30 mt-xs-30">
            <div class="col-xl-12 text-center">
                <div class="blog-btn">
                    <a href="#">Meer berichten</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>
