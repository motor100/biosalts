<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

</div>

<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-4 align-self-center with-logo">
				<img class="logo-footer" src="<?php echo get_stylesheet_directory_uri(); ?>/includes/images/logo_footer.png" alt="logo">
				<div class="flex align-items-center m-t-50">
					<div class="icon phone">
					</div>
					<a class="white" class="footer-phone" href="tel:+74959274928">+7 (495) 927-4-928</a>
				</div>
				<div class="flex align-items-center m-t-30">
					<div class="icon mail">
					</div>
					<a class="white" href="mailto:info@biosalts.ru">info@biosalts.ru</a>
				</div>
				<div class="m-t-30">
					<p>Московская область, совхоз им. Ленина, Техцентр</p><br>
					<p>Пн, Вт, Ср, Чт, Пт:</p>
					<p>С 10:00 до 20:00</p>
					<p>Сб, Вс: выходной</p>
				</div>
			</div>
			<div class="col-lg-4 align-self-center with-menu-footer">
				<?php
				wp_nav_menu(
					array(
						'menu' => 'footer_menu',
						'menu_id'        => 'footer_menu',
					)
				);
				?>
			</div>
			<div class="col-lg-4 txt_r flex f-d-column j-content-fe">
				<div class="w70 pay_box">
					<div class="flex j-content-c">
						<div class="pay_icons icon-visa" title="Visa"></div>
						<div class="pay_icons icon-mastercard" title="MasterCard"></div>
						<div class="pay_icons icon-mir" title="МИР"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="footer-responsibility">
	    <div class="footer-responsibility-message">
	        <p>Перед применением БАДов проконсультируйтесь с врачом.</p>
	        <p>Ответственность за выбор и применение добавок лежит на пользователе.</p>
	    </div>
	</div>
	
	<div class="footer-end">
		<p>
			<a href="/politika-v-otnoshenii-obrabotki-personalnyh-dannyh/" style="font-size: 1.7em;">Политика конфиденциальности</a><br>
			<a href="/soglasie-posetitelya-sajta-na-obrabotku-personalnyh-dannyh/" style="font-size: 1.7em;">Согласие на обработку персональных данных</a>
		</p>
		<p>© 2024 Все права защищены и принадлежат доктору Трушкиной И.В.</p>
		<p>Копирование материалов сайта без письменного разрешения запрещено</p>
	</div>
</footer>


</div>

<?php wp_footer(); ?>

<script type="text/javascript">
! function() {
  var t = document.createElement("script");
  t.type = "text/javascript", t.async = !0, t.src = 'https://vk.com/js/api/openapi.js?169', t.onload = function() {
    VK.Retargeting.Init("VK-RTRG-1527673-1t4wP"), VK.Retargeting.Hit()
  }, document.head.appendChild(t)
}();
</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-1527673-1t4wP" style="position:fixed; left:-999px;" alt="" /></noscript>


</body>

</html>