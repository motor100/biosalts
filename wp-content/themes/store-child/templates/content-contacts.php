<!--<div class="curved m-b-30">
		<div class="one"></div>
		<div class="two"></div>
		<div class="three"></div>
	</div>-->
<section class="text-page" style="padding-bottom: 80px;">
	<div class="container">
		<div class="row">
			<article >
			<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>		</header>
			<div class="tax-wrapper" style="margin-top:0;">
				<?php
				
				$query = new WP_Query( 'cat=103&nopaging=1' );
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
			</article >
		</div>
	</div>
</section>