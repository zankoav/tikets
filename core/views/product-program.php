<?php
	$program       = carbon_get_post_meta( get_the_ID(), 'crb_program_points' );
?>

<div class="tabs__content">
	<div class="programm">
		<div class="container">
			<div class="programm__inner mt-20 mb-20 mt-lg-40 mb-lg-40">
				<h2 class="title title_grey">ПРОГРАММА</h2>
				<div class="programm__wrapper mt-10 mt-sm-20 mt-lg-40">
					<?php foreach($program as $item) :
						$point_time = $item[ 'point_time' ];
						$point_title = $item[ 'point_title' ];
						$desc = $item[ 'desc' ];
						?>
						<div class="programm__item pt-05 pb-05 pt-sm-10 pb-sm-10 pt-lg-20 pb-lg-20">
							<div class="row">
								<div class="programm__item-date col-3 col-sm-2">
									<span class="programm__item-date-text"><?= $point_time; ?></span>
								</div>
								<div class="programm__item-content col-9 col-sm-10">
									<span class="programm__item-content-title"><?= $point_title; ?></span>
									<span class="programm__item-content-text"><?= $desc; ?></span>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>