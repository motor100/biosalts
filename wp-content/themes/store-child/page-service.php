<?php
/**
 * Service page
 *
 * @package WordPress
 * @subpackage Store-Child Theme
 * @since Store-Child Theme
 */
?>

<?php get_header(); ?>
  
<div class="service-page custom-page">

  <div class="container">
    <div class="page-title">Служба поддержки (СЕРВИС)</div>
  </div>

  <div class="desc-section">
    <div class="container">
      <div class="sotrudnichestvo-subtitle">СОТРУДНИЧЕСТВО</div>
      <p class="text-bold">Мы первая производственная аптека в России, специализирующаяся на производстве новых классов натуропатических лекарств для здоровья и осознанной жизни, а не просто для лечения симптомов болезни.</p>
      <p class="text-bold p-last">Мы создаем новую культуру здоровья и здорового образа жизни, осознанного отношения к жизни.</p>
      <div class="sotrudnichestvo-subtitle">Мы приглашаем к сотрудничеству:</div>
      <ul class="list">
        <li class="list-item">Гомеопатические, натуропатические, фитотерапевтические аптеки.</li>
        <li class="list-item">Клиники, медицинские центры, лечебно-профилактические учреждения, которым близки идеи натуропатии и психосоматики.</li>
        <li class="list-item">Частнопрактикующих врачей, специалистов интегративной медицины, натуропатов, психологов, нутрициологов, массажистов, консультантов ЗОЖ и других специалистов помогающих профессий.</li>
        <li class="list-item">Обучающие центры.</li>
        <li class="list-item">Разработчиков новых натуропатических лекарственных средств и БАД, косметологических средств.</li>
        <li class="list-item">Приверженцев принципов персонализированного подхода, понимающих важность индивидуального подхода и бережного отношения к здоровью.</li>
      </ul>
    </div>
  </div>

  <div class="frames-section">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 col-md-7">
          <div class="frames-item">
            <div class="frames-item__title">Мы создаем индивидуальные лекарства и комплексы</div>
            <div class="frames-item__text">на основе природных компонентов высочайшего качества согласно российской и европейской фармакопеям.</div>
          </div>
        </div>
        <div class="col-xl-4 col-md-5">
          <div class="frames-item">
            <div class="frames-item__title">Препараты изготавливаются вручную сертифицированными фармацевтами из сырья высокого качества</div>
          </div>
        </div>
        <div class="col-xl-8 col-md-7">
          <div class="frames-item">
            <div class="frames-item__title">Все наши рецептуры основаны на разработках российских и европейских практикующих врачей</div>
            <div class="frames-item__text">не содержат консервантов, красителей и других небезопасных вспомогательных веществ.</div>
          </div>
        </div>
        <div class="col-xl-4 col-md-5">
          <div class="frames-item">
            <div class="frames-item__title">Имеем большой опыт работы с биологическими препаратами</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="partnership-section sp-section">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 col-md-7">
          <div class="partnership-text">По вопросам сотрудничества</div>
        </div>
        <div class="col-xl-4 col-md-5">
          <a href="https://docs.google.com/forms/d/1Wry8A04nUhU-9HZJI1pZGSFZ2PROh7RRYkmgi8MiXUg/viewform?edit_requested=true&pli=1" class="partnership-btn" target="_blank">Заполнить анкету</a>
        </div>
        <div class="col-xl-8 col-md-7">
          <div class="partnership-text">Ознакомьтесь с документацией</div>
        </div>
        <div class="col-xl-4 col-md-5">
          <a href="#" class="partnership-btn">Читать документ по сотрудничеству</a>
        </div>
      </div>
    </div>
  </div>

  <div class="pharmacy-section sp-section">
    <div class="container">
      <div class="pharmacy-section-subtitle">Аптека</div>
      <div class="pharmacy-description">Для Вас работает специализированная натуропатическая производственная аптека. Вы можете купить готовые формы или заказать изготовление персональных лекарств. Мы специализируемся на изготовлении гомеопатии, препаратов для фитотетарпии, цветочных эссенций Эдварда Баха, препаратов для тканевой биохимической терапии, натуральных соков дикорастущих растений, низкодозных препаратов.</div>
      <a href="https://natura-pharma.ru" class="pharmacy-btn" target="_blank">перейти на сайт аптеки</a>
    </div>
  </div>

  <div class="partners-section sp-section">
    <div class="container">
      <div class="pn-title">ПАРТНЕРЫ</div>
      <div class="flex-container">
        <img src="/wp-content/themes/store-child/includes/images/centr-natalii-radomskoj.jpg" class="centr-natalii-radomskoj" alt="">
        <img src="/wp-content/themes/store-child/includes/images/vala-r.jpg" class="vala-r" alt="">
      </div>
    </div>
  </div>

  <div class="news-section sp-section">
    <div class="container">

      <?php
      $args = array(
        'cat' => 432, // Новости production id 432
        'posts_per_page' => 6,
      );
      ?>
        
      <?php $query = new WP_Query( $args ); ?>

      <?php if ( $query->have_posts() ) : ?>
        <div class="pn-title">Новости</div>
        <div class="row">
          <?php while ( $query->have_posts() ) : ?>
            <?php $query->the_post(); ?>
      
            <div class="col-lg-4 col-sm-6">
              <div class="news-item">
                <div class="news-item__image">
                  <a href="<?php the_permalink(); ?>" class="news-item__link">
                    <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>" alt="">
                  </a>
                </div>
                <a href="<?php the_permalink(); ?>" class="news-item__title"><?php echo the_text_max_charlength(get_the_title(), 50) ?></a>
                <div class="news-item__excerpt"><?php echo the_text_max_charlength(get_the_excerpt(), 100); ?></div>
              </div>
            </div>

          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <div class="faq-section sp-section">
    <div class="container">
      <div class="pn-title">Частые вопросы</div>
      <div class="faq-description">На нашем сайте вы можете найти много информации о гомеопатии и солях Шюслера. Конечно, по этому поводу возникают те или иные вопросы. Возможно, вы уже можете найти ответ в наших разделах часто задаваемых вопросов, также называемых часто задаваемыми вопросами.</div>
      <div class="faq-item">
        <div class="flex-container">
          <div class="faq-item__image">
            <img src="/wp-content/themes/store-child/includes/images/category-nabory.jpg" alt="">
          </div>
          <div class="faq-item__content">
            <div class="faq-item__title">Частые вопросы 1</div>
            <div class="faq-item__text">Про что...</div>
          </div>
        </div>
        <a href="/faq/" class="arrow-right">
          <img src="/wp-content/themes/store-child/includes/images/svg/faq-arrow-right.svg" alt="">
        </a>
      </div>
      <div class="faq-item">
        <div class="flex-container">
          <div class="faq-item__image">
            <img src="/wp-content/themes/store-child/includes/images/category-nabory.jpg" alt="">
          </div>
          <div class="faq-item__content">
            <div class="faq-item__title">Частые вопросы 1</div>
            <div class="faq-item__text">Про что...</div>
          </div>
        </div>
        <a href="/faq/" class="arrow-right">
          <img src="/wp-content/themes/store-child/includes/images/svg/faq-arrow-right.svg" alt="">
        </a>
      </div>
    </div>
  </div>

  <div class="testimonials-section">
    <div class="container">
      <div class="title-wrapper">
        <div class="pn-title">Отзывы</div>
        <div class="swiper-nav">
          <div class="swiper-prev">
            <img src="/wp-content/themes/store-child/includes/images/svg/slider-nav-arrow-left.svg" alt="">
          </div>
          <div class="swiper-next">
            <img src="/wp-content/themes/store-child/includes/images/svg/slider-nav-arrow-right.svg" alt="">
          </div>
        </div>
      </div>
      
      <div class="flex-container">
        <div class="testimonials-item">
          <div class="testimonials-item__title">Клиент 354</div>
          <div class="testimonials-item__text">Рыбатекст используется дизайнерами, проектировщиками и фронтендерами, когда нужно быстро заполнить макеты или прототипы содержимым. Это тестовый контент, который не должен нести никакого смысла, лишь показать наличие самого текста или продемонстрировать типографику в деле.</div>
        </div>
        <div class="testimonials-item hidden-small">
          <div class="testimonials-item__title">Иван</div>
          <div class="testimonials-item__text">Но тщательные исследования конкурентов, вне зависимости от их уровня, должны быть функционально разнесены на независимые элементы. Но стремящиеся вытеснить традиционное производство, нанотехнологии являются только методом политического участия и разоблачены. Современные технологии достигли такого уровня, что постоянное информационно-пропагандистское обеспечение нашей деятельности является качественно новой ступенью распределения внутренних резервов и ресурсов.</div>
        </div>
        <div class="testimonials-item hidden-mobile">
          <div class="testimonials-item__title">Алена Смирнова</div>
          <div class="testimonials-item__text">Противоположная точка зрения подразумевает, что многие известные личности, вне зависимости от их уровня, должны быть объективно рассмотрены соответствующими инстанциями. Сложно сказать, почему действия представителей оппозиции набирают популярность среди определенных слоев населения, а значит, должны быть представлены в исключительно положительном свете. Разнообразный и богатый опыт говорит нам, что высокотехнологичная концепция общественного уклада играет важную роль в формировании новых предложений.</div>
        </div>
      </div>
    </div>
  </div>

</div>

<?php get_footer(); ?>