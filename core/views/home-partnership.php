<?php
	$partnership = carbon_get_post_meta( get_the_ID(), 'partnership' );
?>
<div class="mb-40">
	<div class="partnership">
		<div class="container">
			<div class="partnership__inner">
				<h2 class="title title_grey">Партнерство</h2>
				<div class="mt-20 mb-20 mt-sm-40 mb-sm-40 pt-md-15">
					<?php foreach($partnership as $item) : ?>
						<a class="partnership__download pb-05 pb-sm-10" href="<?= esc_url( $item[ 'link_file' ] ) ?>">
							<?= $item[ 'link_text' ]; ?>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
			<form id="partnership__form" method="POST" action="/">
				<div class="partnership__content row">
					<div class="col-12 col-sm-5 pb-sm-00">
						<div class="partnership__input pb-10">
							<input class="input" type="text" name="username" placeholder="имя">
						</div>
						<div class="partnership__input pb-10 pb-sm-00">
							<input class="input" type="text" name="useremail" placeholder="почта">
						</div>
					</div>
					<div class="col-12 col-sm-7 pb-20 pb-sm-00">
						<div class="partnership__textarea">
							<textarea class="textarea" name="usermessage" placeholder="CООБЩЕНИЕ"></textarea>
						</div>
					</div>
					<div class="partnership__textarea partnership__textarea_oh">
						<textarea class="textarea" name="message" placeholder=""></textarea>
					</div>
                    <div class="col-9 col-offset-3">
                        <div class="partnership__response">
                        </div>
                    </div>
					<div class="col-12 col-sm-6 col-offset-sm-2 pt-sm-10">
						<div class="partnership__button">
							<button class="button button__color_red" type="submit" name="userbutton">Стать партнером</button>
						</div>
					</div>
				</div>
			</form>
		</div>
        <div class="preloader">
            <div class="preloader__spinner preloader__spinner_egg"></div>
        </div>
	</div>
</div>