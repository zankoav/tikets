<?php
	$spikers_list = carbon_get_post_meta( get_the_ID(), 'spikers_list' );
?>
<div class="tabs__content tabs__content_active">
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
									<img class="about-spiker__item-look-image"
										 src="<?= $image; ?>" alt="<?= $name; ?>" title="<?= $name; ?>"/>
									<div class="about-spiker__item-look-line">
									</div>
								</div>
								<div class="about-spiker__item-content col-sm-7 mt-10">
									<span class="about-spiker__item-content-title"><?= $name; ?></span>
									<div class="about-spiker__item-content-text">
										<div class="editor-content">
											<?= wpautop($desc); ?>
										</div>
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