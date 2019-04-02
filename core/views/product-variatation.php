<?php
	$product    = wc_get_product( get_the_ID() );
	$variations = $product->get_available_variations();
	foreach($variations as $variation) {
		foreach($variation[ "attributes" ] as $attribute) {
			if ($attribute == "busines"){
				$business_ticket = $variation;
			}
			if ($attribute == "vip"){
				$vip_ticket = $variation;
			}
			if ($attribute == "platinum"){
				$platinum_ticket = $variation;
			}
			if ($attribute == "standard"){
//				var_dump($variation);
				$standard_ticket = $variation;
			}
		}
//		if ($variation[ "attributes" ][ "attribute_pa_tip-bileta" ] == "busines") {
//			$business_ticket = $variation;
//		} elseif ($variation[ "attributes" ][ "attribute_pa_tip-bileta" ] == "vip") {
//			$vip_ticket = $variation;
//		} elseif ($variation[ "attributes" ][ "attribute_pa_tip-bileta" ] == "platinum") {
//			$platinum_ticket = $variation;
//		} elseif ($variation[ "attributes" ][ "attribute_pa_tip-bileta" ] == "standard") {
//			var_dump($variation);
//			$standard_ticket = $variation;
//		}
	}
	$checkoutLink = getCheckoutPermaLink();
?>

<div class="tabs__content">
	<div class="tariffs">
		<div class="container">
			<div class="tariffs__inner mt-20 mb-20 mt-lg-40 mb-lg-40">
				<h2 class="title title_grey">тарифы</h2>
				<div class="row">
					<div class="col-12 col-sm-10 col-offset-sm-2">
						<div class="tariffs__description">Выберите наиболее подходящий формат участия</div>
					</div>
				</div>
				<div class="row">
					<div class="col-11 col-sm-5">
						<?php
							if (!empty( $standard_ticket )):
								$benefits = explode( ";", trim( $standard_ticket[ "_ticket_benefits" ] ) );
								$displayPrice = $standard_ticket[ "_display_price" ];
								$price = $standard_ticket['display_regular_price'];
								$tariff_id = $standard_ticket[ 'variation_id' ];
								?>
								<div class="standard">
									<div class="standard__title">стандарт</div>
									<ul class="standard__list">
										<?php foreach($benefits as $benefit) : if (!empty( $benefit )): ?>
											<li class="standard__list-item"><?= $benefit; ?></li>
										<?php endif; endforeach; ?>
									</ul>
									
									<?php if ($displayPrice == 'yes'): ?>
										<!--start second option-->
										<div class="vip__price"><?= $price; ?> руб.</div>
										<a class="orange-button orange-button__vip"
										   href="<?= esc_url($checkoutLink.'?seminar='.get_the_ID().'&tariff='.$tariff_id)?>">
											записаться</a>
										<!--end-->
									<?php elseif($displayPrice == 'no'): ?>
										<div class="button-with-balls button-with-balls">
											узнать цену
											<span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_red"></span>
											<span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_grey"></span>
											<span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_white"></span>
										</div>
									<?php endif; ?>
									
								</div>
							<? endif;
						
						?><?php
							
							if (!empty( $vip_ticket )):
								$benefits = explode( ";", trim( $vip_ticket[ "_ticket_benefits" ] ) );
								$displayPrice = $vip_ticket[ "_display_price" ];
								$price = $vip_ticket['display_regular_price'];
								$tariff_id = $vip_ticket[ 'variation_id' ]; ?>
								<div class="vip">
									<div class="vip__title">vip</div>
									<ul class="vip__list">
										<?php foreach($benefits as $benefit) : if (!empty( $benefit )): ?>
											<li class="vip__list-item"><?= $benefit; ?></li>
										<?php endif; endforeach; ?>
									</ul>
									<?php if ($displayPrice == 'yes'): ?>
										<!--start second option-->
										<div class="vip__price"><?= $price; ?>  руб.</div>
										<a class="orange-button orange-button__vip"
										   href="<?= esc_url($checkoutLink.'?seminar='.get_the_ID().'&tariff='.$tariff_id)?>">
											записаться</a>
										<!--end-->
									<?php elseif($displayPrice == 'no'): ?>
										<div class="button-with-balls button-with-balls">
											узнать цену
											<span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_red"></span>
											<span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_grey"></span>
											<span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_white"></span>
										</div>
									<?php endif; ?>
								</div>
							<? endif;
						
						?>
					</div>
					<div class="col-11 col-sm-5 col-offset-sm-2">
						<?php
							
							if (!empty( $business_ticket )):
								$benefits = explode( ";", trim( $business_ticket[ "_ticket_benefits" ] ) );
								$displayPrice = $business_ticket[ "_display_price" ];
								$price = $business_ticket['display_regular_price'];
								$tariff_id = $business_ticket[ 'variation_id' ];
								?>
								<div class="business">
									<div class="business__title">business</div>
									<ul class="business__list">
										<?php foreach($benefits as $benefit) :
											if (!empty( $benefit )):?>
												<li class="business__list-item"><?= $benefit; ?></li>
											<?php endif; endforeach; ?>
									</ul>
									<?php if ($displayPrice == 'yes'): ?>
										<!--start second option-->
										<div class="business__price"><?= $price; ?> руб.</div>
										<a class="orange-button orange-button__vip"
										   href="<?= esc_url($checkoutLink.'?seminar='.get_the_ID().'&tariff='.$tariff_id)?>">
											записаться</a>
										<!--end-->
									<?php elseif($displayPrice == 'no'): ?>
										<div class="button-with-balls button-with-balls__white">
											узнать цену
											<span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_red"></span>
											<span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_grey"></span>
											<span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_white"></span>
										</div>
									<?php endif; ?>
								</div>
							<? endif;
							
							?><?php
							
							if (!empty( $platinum_ticket )):
								$benefits = explode( ";", trim( $platinum_ticket[ "_ticket_benefits" ] ) );
								$displayPrice = $platinum_ticket[ "_display_price" ];
								$price = $platinum_ticket['display_regular_price'];
								$tariff_id = $platinum_ticket[ 'variation_id' ];?>
								<div class="platinum">
									<div class="platinum__title">platinum</div>
									<ul class="platinum__list">
										<?php foreach($benefits as $benefit) :
											if (!empty( $benefit )):?>
												<li class="platinum__list-item"><?= $benefit; ?></li>
											<?php endif; endforeach; ?>
									</ul>
									<?php if ($displayPrice == 'yes'): ?>
										<!--start second option-->
										<div class="platinum__price"><?= $price; ?> руб.</div>
										<a class="orange-button orange-button__vip"
										   href="<?= esc_url($checkoutLink.'?seminar='.get_the_ID().'&tariff='.$tariff_id)?>">
											записаться</a>
										<!--end-->
									<?php elseif($displayPrice == 'no'): ?>
										<div class="button-with-balls button-with-balls__white">
											узнать цену
											<span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_red"></span>
											<span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_grey"></span>
											<span class="button-with-balls__ball button-with-balls__ball button-with-balls__ball_white"></span>
										</div>
									<?php endif; ?>
								</div>
							<? endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>