<?php
/**
 * Template Name: Blog
 */
get_header();
//the_content();
?>

<div class="blog-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 text-center">
                <div class="blog-title">
                    <h3>Blog</h3>
                </div>
                <div class="blog-search">
                    <from class="search">
                        <input type="text" placeholder="zoeken...">
                        <button><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/arrow-icon.png"
                                     alt="icon"></button>
                    </from>
                </div>
                <div class="blog-categorie">
                    <p>Categorie; <span>Online marketing</span>, <span>Design</span>, <span>Fotografie,</span> </p>
                </div>
            </div>
        </div>
        <div class="row blog-row">
            <div class="col-xl-4">
                <div class="blog-content-wrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/thumb/thumb-3.png" alt="thumb">
                    <div class="blog-content">
                        <a href="#">Meer lezen</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="blog-content-wrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/thumb/thumb-3.png" alt="thumb">
                    <div class="blog-content">
                        <a href="#">Meer lezen</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="blog-content-wrapper">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/thumb/thumb-3.png" alt="thumb">
                    <div class="blog-content">
                        <a href="#">Meer lezen</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>
