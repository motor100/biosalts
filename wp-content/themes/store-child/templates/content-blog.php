<section class="text-page" style="padding-bottom: 80px;">
	<div class="container blog">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="sec-title"><?php the_title(); ?></h1>
			</div>
			<div class="tax-wrapper">
				<?php
				
				$query = new WP_Query( 'cat=105&nopaging=1' );
				if( $query->have_posts() ){
					while( $query->have_posts() ){
						$query->the_post();
				?>
				<div class=tax__item style="cursor: pointer;">
					<div class="catalog__item" >
						<div class="item__image">
							<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(array(120,100)); ?></a>
						</div>						
						<div class="item-desc">
							<h2><a class="desc-link-head" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							<p><?php the_excerpt(); ?></p>
							<div class="item__info">
								<div class="item__border">
									<a href="<?php the_permalink() ?>" rel="bookmark">Читать подробнее</a>
								</div>
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