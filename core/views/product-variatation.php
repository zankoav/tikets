<?php
	//	$main_speaker  = carbon_get_post_meta( get_the_ID(), 'main_speaker' );
	
	$product    = wc_get_product( get_the_ID() );
	$variations = $product->get_available_variations();
	foreach($variations as $variation) {
		if ($variation[ "attributes" ][ "attribute_pa_tip-bileta" ] == "busines") {
			$business_ticket = $variation;
		} elseif ($variation[ "attributes" ][ "attribute_pa_tip-bileta" ] == "vip") {
			$vip_ticket = $variation;
		} elseif ($variation[ "attributes" ][ "attribute_pa_tip-bileta" ] == "platinum") {
			$platinum_ticket = $variation;
		} elseif ($variation[ "attributes" ][ "attribute_pa_tip-bileta" ] == "standard") {
			$standard_ticket = $variation;
		}
//		var_dump($variation);
	}
?>


<div class="tabs__content">
	<div class="tariffs">
		<div class="container">
			<div class="tariffs__inner">
				<h2 class="title title_grey">тарифы</h2>
				<div class="row">
					<div class="col-12 col-sm-10 col-offset-sm-2">
						<div class="tariffs__description">Выберите наиболее подходящий формат участия</div>
					</div>
				</div>
				<div class="row">
					<div class="col-11 col-sm-5">
						<?php if (!empty( $standard_ticket )):
							$benefits = explode( ";", $standard_ticket[ "_ticket_benefits" ] );
							?>
							<div class="standard">
								<div class="standard__title">стандарт</div>
								<ul class="standard__list">
									<?php foreach($benefits as $benefit) : ?>
										<li class="standard__list-item"><?= $benefit; ?></li>
									<?php endforeach; ?>
								</ul>
								<div class="button-with-balls">
									узнать цену
									<span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_red"></span>
									<span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_grey"></span>
									<span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_orange"></span>
								</div>
							</div>
						<? endif; ?>
						<?php if (!empty( $vip_ticket )):
							$benefits = explode( ";", $vip_ticket[ "_ticket_benefits" ] );
							?>
							<div class="vip">
								<div class="vip__title">vip</div>
								<ul class="vip__list">
									<?php foreach($benefits as $benefit) : ?>
										<li class="vip__list-item"><?= $benefit; ?></li>
									<?php endforeach; ?>
								</ul>
								<div class="vip__price">400 Br</div>
								<a class="orange-button orange-button__vip" href="#"> записаться</a>
							</div>
						<? endif; ?>
					</div>
					<div class="col-11 col-sm-5 col-offset-sm-2">
						<?php if (!empty( $business_ticket )):
								$benefits = explode( ";", $business_ticket[ "_ticket_benefits" ] );
								?>
								<div class="business">
									<div class="business__title">business</div>
									<ul class="business__list">
										<?php foreach($benefits as $benefit) : ?>
											<li class="vip__list-item"><?= $benefit; ?></li>
										<?php endforeach; ?>
									</ul>
									<div class="business__price">200 Br</div>
									<a class="orange-button orange-button__vip" href="#">записаться</a>
								</div>
							<? endif; ?>
						<?php if (!empty( $platinum_ticket )):
								$benefits = explode( ";", $platinum_ticket[ "_ticket_benefits" ] );
								?>
								<div class="platinum">
									<div class="platinum__title">platinum</div>
									<ul class="platinum__list">
									<?php foreach($benefits as $benefit) : ?>
											<li class="vip__list-item"><?= $benefit; ?></li>
										<?php endforeach; ?></ul>
									<div class="button-with-balls button-with-balls__white">
										узнать цену
										<span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_red"></span>
										<span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_grey"></span>
										<span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_white"></span>
									</div>
									<!--start second option-->
									<div class="platinum__price">400 Br</div>
									<a class="orange-button orange-button__vip" href="#">записаться</a>
									<!--end-->
								</div>
							<? endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>