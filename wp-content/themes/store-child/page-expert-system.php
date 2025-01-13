<?php
/**
 * Expert system page
 *
 * @package WordPress
 * @subpackage Store-Child Theme
 * @since Store-Child Theme
 */
?>

<?php get_header(); ?>

<div class="expert-system-page custom-page">

  <div class="container">
    <div class="page-title">Экспертная система подбора солей Шюсслера для тканевой биохимической терапии</div>
  </div>

  <div class="questionnaire-description">

    <div class="about-expert-system-section">
      <div class="container">
        <p class="text">Медицинский ассистент на основе искусственного интеллекта для диагностики дефицитов минералов в организме человека, подбора персонифицированной комбинации препаратов с проверкой совместимости.</p>
        <p class="text">Программа создана на основе баз знаний и опыта работы врачей и экспертов в области медицины и натуропатии, позволяет систематизировать большой объем информации по дефицитам. На основании задаваемых вопросов о симптомах, малых признаках дефицитов, настроения, самоощущения, пищевых пристрастий система подберет наиболее подходящую комбинацию солей Шюсслера, предложит варианты дозирования и оптимальное время приема для каждой соли в течение дня.</p>
      </div>
    </div>

    <div class="advantages-section">
      <div class="container">
        <div class="section-title">Преимущества экспертной системы:</div>
        <div class="row">
          <div class="col-md-6">
            <div class="advantages-item">
              <div class="advantages-item__title">Оперативность</div>
              <div class="advantages-item__text">Вы можете подобрать необходимую комбинацию солей Шюсслера в течение 20-30 минут</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="advantages-item">
              <div class="advantages-item__title">Гибкость</div>
              <div class="advantages-item__text">Экспертная система может быть использована как для хронических, так и для острых случаев, для взрослых и детей</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="advantages-item">
              <div class="advantages-item__title">Актуальность</div>
              <div class="advantages-item__text">Система регулярно обновляется и пополняется новыми рубриками и сведениями о препаратах</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="advantages-item">
              <div class="advantages-item__title">Информативность</div>
              <div class="advantages-item__text">Вы получаете полную информацию о подобранных препаратах</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="advantages-item">
              <div class="advantages-item__title">Персонифицированность</div>
              <div class="advantages-item__text">Индивидуальный подбор комбинации солей на основе анализа более 800 симптомов и признаков</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="advantages-item">
              <div class="advantages-item__title">Защита персональных данных</div>
              <div class="advantages-item__text">Данные пациента не передаются и не публикуются</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="advantages-item">
              <div class="advantages-item__title">Сервис</div>
              <div class="advantages-item__text">Натуропатическая производственная аптека изготавливает подобранные соли Шюсслера  и доставляет до двери</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="diagnostics-section">
      <div class="container">
        <div class="flex-container">
          <div class="left">
            <p class="text">Для проведения персональной диагностики дефицитов минеральных веществ в организме Вам понадобится 20-40 минут свободного времени и интернет доступ.</p>
            <p class="text">Вы можете тестировать дефициты исходя из необходимости решить конкретную проблему или провести общую диагностику дефицитов.</p>
            <p class="text">Программа предложит Вам несколько блоков с вопросами, Вам необходимо отметить те жалобы или проявления, которые есть в данный момент у Вас.</p>
            <p class="text">Для более детальной диагностики Вам потребуется карманное или настольное зеркало, программа учитывает малые симптомы, которые проявляются на коже.</p>
          </div>
          <div class="right">
            <div class="title">По результатам диагностики Вам будет подобрана комбинация:</div>
            <div class="frame">
              <ul class="list">
                <li class="list-item">трех основных солей Шюсслера (№№1-12)</li>
                <li class="list-item">одной дополнительной соли Шюсслера (№№13-27) для настройки тонких биохимических процессов</li>
                <li class="list-item">одна комплексная соль Шюсслера при наличии показаний для пролонгации эффективности курса биохимической коррекции</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="doctor-section">
      <div class="container">
        <p class="text">Клеточные соли Шюсслера не могут заменить визита к врачу. Обратитесь в медицинское учреждение если Вы серьезно больны. Тяжелые заболевания нельзя лечить только солями Шюсслера. Клеточные соли можно использовать как дополнение к основному лечению, профилактики дефицита катализаторов и уменьшению побочных эффектов основной терапии.</p>
      </div>
    </div>

    <div class="copyright-section">
      <div class="container">
        <div class="copyright">Экспертная система подбора солей Шюсслера защищена авторским правом.</div>
      </div>
    </div>
  </div>

  <div class="catalog-section">
    <div class="container">
      <div class="cat-wrapper">

        <?php
        // Запрос
        $query = new WP_Query( array (
          'post_type'      => 'product',
          'post_status'    => 'publish',
          'posts_per_page' => '-1',
          'tax_query' => array( array (
            'taxonomy' => 'product_cat',
            'field'    => 'term_id',
            'terms'    => 429, // local 429 prod 433
          )),
        ));

        // Вывод записей
        if ( $query->have_posts() ) {

          // Подключение шаблона product loop start
          require ( get_stylesheet_directory() . '/woocommerce/loop/loop-start.php' );

          while ( $query->have_posts() ) {
            $query->the_post();

            // Подключение шаблона product loop
            require ( get_stylesheet_directory() . '/woocommerce/content-product.php' );
          }

          // Подключение шаблона product loop end
          require ( get_stylesheet_directory() . '/woocommerce/loop/loop-end.php' );

          wp_reset_postdata();

        }
        ?>

      </div>
    </div>
  </div>

</div>

<?php get_footer(); ?>