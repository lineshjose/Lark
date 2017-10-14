	<?php if ( is_search() ) : // Only display Excerpts for search pages ?>
	<div class="entry-summary">
		<?php the_excerpt( __( 'View the pictures &rarr;', 'lj' ) ); ?>
	</div><!-- end entry-summary -->
	<?php else : ?>

		<?php if ( post_password_required() ) : ?>
			<?php the_content( __( 'View the pictures &rarr;', 'lj' ) ); ?>
			
			<?php else : ?>
				<?php
					$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
					if ( $images ) :
						$total_images = count( $images );
						$image = array_shift( $images );
						$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
				?>

				<figure class="gallery-thumb alignleft">
					<a href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
				</figure><!-- end gallery-thumb -->
				
			<?php endif; ?>
			
		<div class="entry-post-format">
			<?php the_excerpt( __( 'View the pictures &rarr;', 'lj' ) ); ?>
		<?php endif; ?>

		<p class="pics-count"><?php printf( _n( 'This gallery contains <a %1$s>%2$s photo</a>.', 'This gallery contains <a %1$s>%2$s photos</a>', $total_images, 'lj' ),
						'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'lj' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
						number_format_i18n( $total_images )
					); ?></p>
		
	</div><!-- end entry-content-gallery -->
	<?php endif; ?>
	
	<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'lj' ), 'after' => '</div>' ) ); ?>		
