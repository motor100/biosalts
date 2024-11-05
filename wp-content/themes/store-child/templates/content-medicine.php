<section class="text-page" style="padding-bottom: 80px;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<p class="sec-title"><?php the_title(); ?></p>
			</div>
			<div class="tax-wrapper">
				<?php
				
				$query = new WP_Query( 'cat=102&nopaging=1' );
				if( $query->have_posts() ){
					while( $query->have_posts() ){
						$query->the_post();
				?>
				<div class=tax__item data-fancybox="dialog-<?php echo $post->ID; ?>" data-src="#content-<?php echo $post->ID; ?>" style="cursor: pointer;">
					<div class="catalog__item">
						<div class="item__image">
							<?php the_post_thumbnail( 'big' ); ?>
						</div>
						<div class="item__info">
							<div class="item__border">
								<p class="item__title"><?php the_title(); ?></p>
							</div>
						</div>
					</div>
				</div>
				
				
				
				<div id="content-<?php echo $post->ID; ?>" style="display:none;max-width: calc(100vw - 50px);">
					<h3>
						<?php the_title(); ?>
					</h3>
					<?php the_content(); ?>
				</div>
	
				
				<?php
					}
					wp_reset_postdata();
				}
				else
					echo 'Записей нет.';
				?>
			</div>
		</div>
	</div>
</section>