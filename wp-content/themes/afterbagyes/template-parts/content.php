<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package afterbagyes
 */
if ( is_single() ): ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-wrap mb-30' ); ?>>
		<?php
		if ( has_post_thumbnail() ): ?>
            <div class="blogs-thumb mb-35">
				<?php the_post_thumbnail( 'afterbagyes-post-details', array(
					'class' => 'img-responsive',
					'alt'   => get_the_post_thumbnail_caption( get_the_ID() )
				) ); ?>
            </div>
		<?php
		endif; ?>

        <div class="blog-content">
            <div class="blog-meta">
                <span>
                        <a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                            <i class="fal fa-user"></i> <?php print get_the_author(); ?>
                        </a>
                    </span>
                <span>
                    <i class="fal fa-calendar-alt"></i> <?php the_time( get_option( 'date_format' ) ); ?>
                </span>
            </div>
            <div class="blog-text mb-20">
				<?php the_content(); ?>
				<?php
				wp_link_pages( array(
					'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'afterbagyes' ),
					'after'       => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
				) );
				?>
            </div>
			<?php print afterbagyes_get_tag(); ?>
        </div>
    </article>
<?php
else: ?>
    <div class="col-xl-6">
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-wrap mb-30' ); ?>>
			<?php
			if ( has_post_thumbnail() ): ?>
                <div class="blog-thumb">
                    <a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'afterbagyes-post-thumb', array( 'class' => 'img-responsive' ) ); ?>
                    </a>
                </div>
			<?php
			endif; ?>
            <div class="blog-content">
                <div class="blog-meta">
                     <span>
                        <a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                            <i class="fal fa-user"></i> <?php print get_the_author(); ?>
                        </a>
                    </span>
                    <span>
                        <i class="fal fa-calendar-alt"></i> <?php the_time( get_option( 'date_format' ) ); ?>
                    </span>
                </div>
                <h3 class="blog-title mb-20">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <div class="blog-text">
					<?php the_excerpt(); ?>
                </div>
                <!-- blog btn -->
				<?php
				$afterbagyes_blog_btn = get_theme_mod( 'afterbagyes_blog_btn', 'Read More' );

				$afterbagyes_blog_btn_switch = get_theme_mod( 'afterbagyes_blog_btn_switch', true );
				?>

				<?php if ( ! empty( $afterbagyes_blog_btn_switch ) ) : ?>
                    <div class="read-more">
                        <a href="<?php the_permalink(); ?>"><?php print esc_html( $afterbagyes_blog_btn ); ?></a>
                    </div>
				<?php endif; ?>
            </div>
        </article>
    </div>
<?php
endif; ?>
