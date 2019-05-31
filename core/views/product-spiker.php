<?php
	if (!defined( 'ABSPATH' )) exit();
	
	$spikers_list = carbon_get_post_meta( get_the_ID(), 'spikers_list' );
	$question_page = get_permalink(carbon_get_theme_option('question_link'));

    $isTargetTarifs = false;
    $active_tab = "tabs__content_active";
    if (!empty($_GET["target"]) && $_GET["target"] === "tarifs"){
        $isTargetTarifs = true;
    }
?>
<div class="tabs__content <?= $isTargetTarifs ? "" : $active_tab; ?>">
	<div class="about-spiker">
		<div class="container">
			<div class="about-spiker__inner mt-20 mb-20 mt-lg-40">
				<h2 class="title title_grey">О СПИКЕРЕ</h2>
				<div class="about-spiker__wrapper mt-10 mt-sm-20 mt-md-40">
					<?php foreach($spikers_list as $item) :
						$image = $item[ 'spiker_image' ];
						$name = $item[ 'spiker_name' ];
						$desc = $item[ 'spiker_desc' ];
						?>
						<div class="about-spiker__item pb-40">
							<div class="row">
								<div class="about-spiker__item-look col-sm-5">
									<?php if (!empty($image)):?>
									<img class="about-spiker__item-look-image"
										 src="<?= $image; ?>" alt="<?= $name; ?>" title="<?= $name; ?>"/>
									<?php endif; ?>
									<div class="about-spiker__item-look-line">
									</div>
								</div>
								<div class="about-spiker__item-content col-sm-7 mt-10">
									<span class="about-spiker__item-content-title"><?= $name; ?></span>
									<div class="about-spiker__item-content-text">
										<div class="editor-content">
											<?= wpautop($desc); ?>
										</div>
										<a class="about-spiker__askquestion"
										   href="<?= esc_url($question_page.'?seminar='.get_the_ID().'&speaker='.$name)?>"
										   target="_blank">
											<img class="about-spiker__askquestion-image"
												 src="/wp-content/themes/tikets/src/icons/message.30369b.svg"
												 alt="message" title=""/>
											<div class="about-spiker__askquestion-text">Задать вопрос
												спикеру
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>