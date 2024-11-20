<?php if ( !is_page('catalog') ) { ?>

  <div class="text-page">
    <div class="container">
      <div class="row">
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php
              /**
               * Functions hooked in to storefront_page add_action
               *
               * @hooked storefront_page_header          - 10
               * @hooked storefront_page_content         - 20
               */
              do_action( 'storefront_page' );
          ?>
        </div> 
      </div>
    </div>
  </div>

<?php } else { ?>

  <div class="catalog-page">
    <div class="catalog-section">
      <div class="catalog-section-title">Каталог</div>
      <div class="catalog-tabs">
        <div class="catalog-tabs-contents">
          <div class="container">
            <div class="catalog-tabs-content active" data-id="1">
              <div class="cat-wrapper">
                <?php echo render__catalog('25'); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php } ?>
