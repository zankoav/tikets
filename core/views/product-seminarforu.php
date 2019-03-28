<?php


?>

<div class="seminarforu">
	<div class="container mb-30 mb-sm-40 pb-lg-40">
		<div class="row">
			<div class="col-12 col-sm-7">
				<img class="seminarforu__image d-b" src="/wp-content/themes/tikets/src/icons/hand.6babc4.png" alt="hand"
					 title=""/>
				<div class="d-b pos-r">
					<span class="seminarforu__line d-b pos-a"></span>
				</div>
			</div>
			<div class="col-12 col-sm-5 mt-10 pos-sm-r">
				<div class="seminarforu__sign pos-sm-a">Запишись
				</div>
			</div>
		</div>
		<div class="row mt-20 mt-sm-40 pt-md-40 pt-lg-00 pt-hd-20">
			<div class="col-12 col-sm-6 mt-10 mt-sm-00 col-offset-sm-3">
				<a class="seminarforu__button-sign d-b seminarforu__button-sign_active" href="<?= getCheckoutPermaLink().'?seminar='.get_the_ID(); ?>" target="_blank">Запиcаться</a>
			</div>
		</div>
	</div>
</div>