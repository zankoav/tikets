<?php
	/**
	 * Template Name: Contacts Template
	 */
	get_header();
	
	//$oembed = carbon_get_theme_option('crb_oembed');
	//var_dump($oembed);
	//	echo wp_oembed_get($oembed);
	$address = carbon_get_post_meta(get_the_ID(),'contact_address');
	$phones = carbon_get_post_meta(get_the_ID(),'crb_phones');
	$emails = carbon_get_post_meta(get_the_ID(),'crb_emails');
	$map_center = carbon_get_post_meta(get_the_ID(),'map_center');
	$marc_coordinate = carbon_get_post_meta(get_the_ID(),'marc_coordinate');
	$marc_text = carbon_get_post_meta(get_the_ID(),'marc_text');
?>
<div class="app">
	<?php get_template_part( '/core/views/headerView' ); ?>
	<main class="main">
		<div class="contacts">
			<div class="container">
				<h1 class="title title_grey title_default pt-20 pb-20 pb-sm-05 pt-md-40">Контакты</h1>
				<div class="contacts__inner mb-40 mb-sm-30 mb-md-40">
					<div class="contacts__envelope row pos-r mb-20 mb-sm-00">
						<div class="col-3 col-sm-2 col-offset-sm-6 col-offset-hd-7">
							<img class="contacts__image" src="/wp-content/themes/tikets/src/icons/finger.8d57c8.svg"
								 alt="arm" title=""/>
						</div>
						<div class="col-9 col-sm-4 col-lg-3">
							<div class="contacts__link-list">
								<?php foreach($phones as $phone) :
									$number = $phone['phone_number'];?>
								<a class="contacts__link pb-sm-05" href="tel:<?= esc_attr($number); ?>">
									<span class="contacts__number"><?= esc_html($number); ?></span>
								</a>
								<?php endforeach;?>
								<?php foreach($emails as $email) :
									$val = $email['email_value'];?>
								<a class="contacts__link pb-sm-05" href="mailto:<?= $val;?>">
									<span class="contacts__mail"><?= esc_html($val);?></span>
								</a>
								<?php endforeach;?>
							</div>
						</div>
					</div>
					<div class="contacts__wrapper row">
						<div class="col-3 col-sm-2 col-offset-lg-1">
							<img class="contacts__image" src="/wp-content/themes/tikets/src/icons/arm.3a60e4.svg"
								 alt="arm" title=""/>
						</div>
						<div class="col-9 col-sm-4 col-lg-3">
							<div class="contacts__addres"><?= esc_html($address); ?></div>
						</div>
					</div>
				</div>
				<div class="contacts__map">
					<?php echo do_shortcode('[yamap controls="" center="'.$map_center.'"  type="yandex#map"][yaplacemark  name="'.$marc_text.'" coord="'.$marc_coordinate.'" icon="islands#blueDotIcon" color="#1e98ff"][/yamap]')?>
				</div>
			</div>
		</div>
	</main>
	<?php get_template_part( '/core/views/footerView' ); ?>
</div>

<?php
	get_footer();
?>
