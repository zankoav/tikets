<?php
	if (!defined( 'ABSPATH' )) exit();
	
	$about_program = carbon_get_post_meta( get_the_ID(), 'about_program' );
//	var_dump( $about_program );
?>
<div class="tabs__content">
	<?php foreach($about_program as $item) :
		$part_title = $item[ 'part_title' ];
		$part_subtitle = $item[ 'part_subtitle' ];
		$part_content = $item[ 'part_content' ];
		if ($item[ '_type' ] == 'part_with_label'):
			$label_title = $item[ 'part_label_title' ];
			$paragraphs = $item[ 'part_label_paragraphs' ];
			$part_label_file = $item[ 'part_label_file' ];
			?>
			<div class="block-with-label">
				<div class="container">
					<div class="block-with-label__inner mt-20 mb-20 mt-lg-40 mb-lg-40">
						<h2 class="title title_grey"><?= $part_title; ?></h2>
						<div class="block-with-label__wrapper mt-20 mt-sm-20 mt-md-40">
							<div class="row">
								<div class="block-with-label__label">
									<p class="block-with-label__label-title col-12 col-sm-11 col-offset-sm-1">
										<?= $part_subtitle; ?>
									</p>
									<div class="editor-content col-12 col-sm-10 col-offset-sm-2">
										<?= wpautop( $part_content ); ?>
									</div>
									<div class="block-with-label__label-content pt-20 pb-20 pb-sm-40 col-sm-9 col-offset-sm-1">
										<div class="block-with-label__label-content-inner">
											<div class="block-with-label__label-content-inner-title">
												<?= $label_title; ?>
											</div>
											<?php foreach($paragraphs as $paragraph) :
												if (!$paragraph[ 'paragraph_bold' ]):?>
													<div class="block-with-label__label-content-inner-text">
														<?= $paragraph[ 'part_label_paragraph' ]; ?>
													</div>
												<?php else: ?>
													<div class="block-with-label__label-content-inner-promo">
														<?= $paragraph[ 'part_label_paragraph' ]; ?>
													</div>
												<?php endif; endforeach;
												
												if (!empty( $part_label_file )):?>
													<div class="block-with-label__label-content-inner-button">
														<a class="orange-button orange-button__type_1"
														   href="<?= esc_url( $part_label_file ); ?>">Скачать
														</a>
													</div>
												<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php elseif ($item[ '_type' ] == 'part'): ?>
			<div class="block-without-label">
				<div class="container">
					<div class="block-without-label__inner mt-20 mb-20 mt-lg-40 mb-lg-40">
						<h2 class="title title_grey"><?= $part_title; ?></h2>
						<div class="block-without-label__wrapper mt-20 mt-sm-20 mt-md-40">
							<div class="row">
								<div class="block-without-label__label">
									<p class="block-without-label__label-title col-12 col-sm-11 col-offset-sm-1">
										<?= $part_subtitle; ?>
									</p>
									<div class="editor-content col-12 col-sm-10 col-offset-sm-2">
										<?= wpautop( $part_content ); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif;endforeach; ?>
</div>