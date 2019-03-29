<?php
	/**
	 * Template Name: Question Template
	 */
	get_header();
	
	$programId   = $_GET['seminar' ];
	$speakerName = $_GET[ 'speaker' ];
	
	if (empty( $programId ) || empty( $speakerName )) {
		global $wp_query;
		$wp_query->set_404();
		status_header( 404 );
		get_template_part( 404 );
		exit();
	}
	
?>
	<div class="app app__h_100vh">
		<?php get_template_part( '/core/views/headerView' );?>
		<main class="main">
			<div class="container">
				<h1 class="title title_grey title_default mt-20 mt-sm-40">Вопрос спикеру</h1>

                <?php
//                    $post = get_post($programId);
//                    var_dump($post->post_title);
//                    var_dump($speakerName);
                    ?>
                <p class="pay-type__program-description" style="margin-top:2rem;">
                    Авторизуйтесь, чтобы воспользоваться
                    скидкой по программе лояльности
                </p>
				<div class="mt-30 mb-30">
					<div class="question-speaker">
						<form id="question-speaker__form" method="POST" action="/">
							<div class="question-speaker__content row">
								<div class="col-12 col-sm-5 pb-sm-00">
									<div class="question-speaker__input pb-10">
										<input class="input" type="text" name="username" placeholder="имя">
									</div>
									<div class="question-speaker__input pb-10 pb-sm-00">
										<input class="input" type="text" name="useremail" placeholder="почта">
									</div>
								</div>
								<div class="col-12 col-sm-7 pb-20 pb-sm-00">
									<div class="question-speaker__textarea">
										<textarea class="textarea" name="usermessage"
												  placeholder="CООБЩЕНИЕ"></textarea>
									</div>
								</div>
								<div class="question-speaker__textarea question-speaker__textarea_oh">
									<textarea class="textarea" name="message" placeholder=""></textarea>
								</div>
								<div class="question-speaker__response">
								</div>
								<input class="input" type="hidden" name="programName" value="<?=$programId;?>">
								<input class="input" type="hidden" name="speakerName" value="<?=$speakerName;?>">
								<div class="col-12 col-sm-6 col-offset-sm-2 pt-sm-10">
									<div class="question-speaker__button">
										<button class="button button__color_red" type="submit" name="userbutton">
											Отправить
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>
		<?php get_template_part( '/core/views/footerView' ); ?>
	</div>
<?php
	get_footer();

