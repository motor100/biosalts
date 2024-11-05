 <?
/**
 * @package WordPress
 * @subpackage Classic_Theme
 * Template Name: Шаблон блога
 */
 get_header();

?>

<section class="text-page" style="padding-bottom: 80px;">
	<div class="container blog">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="sec-title"><?php the_title(); ?></h1>
			</div>
			<div class="tax-wrapper">
				<div id="content" style="max-width: calc(100vw - 50px);">
					<?php the_excerpt(); ?>
					<div class="wp-block-image">
						<figure class="aligncenter size-full">
							<?php the_post_thumbnail(''); ?>
						</figure>
					</div>									
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer();?>