<? if($_SERVER['REQUEST_URI'] != '/catalog/') { ?>

<section class="text-page">
	<div class="container">
		<div class="row">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			  <?php
    			  /**
    			   * Functions hooked in to storefront_page add_action
    			   *
    			   * @hooked storefront_page_header          - 10
    			   * @hooked storefront_page_content         - 20
    			   */
    			  do_action( 'storefront_page' );
			  ?>
			</article> 
		</div>
	</div>
</section>

<? } else { ?>

<section class="catalog" style=" margin: 0; ">
	<div class="title">
		<?php the_title(); ?>
	</div>

	<div class="curved violet v2">
		<div class="one"></div>
		<div class="two"></div>
		<div class="three"></div>
	</div>
	
	<div class="catalog-tabs">
		<div class="curved green v2">
			<div class="one"></div>
			<div class="two"></div>
			<div class="three"></div>
		</div>

		<div class="container">
			<div class="row">
				<div id="tab-1">
                    <div class="cat-wrapper">
                        <?php
                        $args = array(
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat', // Укажите таксономию
                                    'field'    => 'slug', // Мы будем использовать slug
                                    'terms'    => 'soli-schuesslera', // Укажите ярлык вашей категории
                                ),
                            ),
                            'posts_per_page' => 20, 
                            'post_type'      => 'product', 
                            'orderby'        => 'title',
                        );
                
                        $loop = new WP_Query($args);
                        while ($loop->have_posts()) : $loop->the_post();
                            global $product; ?>
                            <div class="children__item">
                                <div class="children__image">
                                    <a href="<?php echo get_permalink($loop->post->ID); ?>">
                                        <img class="ww100" src="<?php echo get_the_post_thumbnail_url($loop->post->ID); ?>">
                                    </a>
                                </div>
                                <a class="subcat__link" href="<?php echo get_permalink($loop->post->ID); ?>"><?php the_title(); ?></a>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_query(); ?>
                    </div>
                </div>
			</div>
			
			<div style=" margin-top: 50px; ">
				<h2>Аптека натуральных лекарств</h2>
				<p>Аптека натуральных лекарств NaturaPharma единственная в своем роде, потому что предлагает лекарства не просто от болезней, а для повышения уровня здравья. Увеличения ресурса, трансформации негативных и ограничивающих убеждений, бессознательных программ. Аптека натуральных лекарств NaturaPharma – это аптека для людей, которые стремятся к здоровой и осознанной жизни. Мы верим, что только живые лекарства, наполненные природной энергией, способны помогать человеку на самом глубоком уровне.</p>
				<p>В каталоге NaturaPharma вы найдете большой выбор натуропатических комплексов и индивидуальных лекарств, которые можно использовать в тех или иных случаях. Цель наших лекарств - регуляция энергетических и биохимических процессов без замещения или подавления. Мы предлагаем лекарства в виде капель, таблеток, порошков (тритураций), глицериновых экстрактов, созданных из высококачественного сырья, собранного нами самостоятельно, или купленных в экологически чистых уголках нашей планеты, в соответствии со знанием природных циклов, планетарных ритмов, с большим уважением к природе и всему тому, что она даёт человеку.</p>
				<p>Наши продукты – это результат многолетних исследований и личного опыта врачей и фармацевтов в области натуропатии и психосоматики. Мы создаем культуру здоровой и осознанной жизни. В аптеке натуральных лекарств NaturaPharma каждый найдет именно то, что нужно лично ему для повышения уровня здоровья и ресурсности организма.</p>
				<p>Позвоните нам сегодня по телефону +7 (495) 927-49-28, чтобы узнать больше о наших продуктах и сделать шаг навстречу своему здоровью. Купите натуральные лекарства в NaturaPharma и откройте новую страницу в своей жизни.</p>
			</div>
		</div>
	</div>
</section>

<?} ?>
