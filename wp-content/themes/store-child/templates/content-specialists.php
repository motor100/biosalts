<div class="col-md-4">
  <div class="specialists-item">
    <div class="specialists-item__image">
      <?php the_post_thumbnail(); ?>
    </div>
    <div class="specialists-item__content">
      <div class="specialists-item__title"><?php the_title(); ?></div>
      <div class="specialists-item__excerpt"><?php echo the_text_max_charlength(get_the_excerpt(), 100); ?></div>
      <a href="<?php the_permalink(); ?>" class="specialists-item__link">Подробнее</a>
    </div>
  </div>
</div>