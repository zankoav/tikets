<?php
    if (!defined('ABSPATH')) exit();
    $logo      = carbon_get_theme_option('crb_footer_logo_img');
    $phone_vel = carbon_get_theme_option('crb_phone_vel');
    $phone_mts = carbon_get_theme_option('crb_phone_mts');
    $email     = carbon_get_theme_option('crb_email');
    $address   = carbon_get_theme_option('crb_address');
    $unp       = carbon_get_theme_option('crb_unp');
    $work_time = carbon_get_theme_option('crb_work_time');

    $vk_link      = carbon_get_theme_option('crb_vk_link');
    $insta_link   = carbon_get_theme_option('crb_insta_link');
    $fb_link      = carbon_get_theme_option('crb_fb_link');
    $youtube_link = carbon_get_theme_option('crb_youtube_link');
?>
<footer class="footer pt-10 pb-10 pt-sm-40 pb-sm-40">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-3">
                <a class="footer__logo footer__logo_link" href="/">
                    <img class="footer__logo footer__logo_link-image" src="<?= $logo; ?>" alt="Seminar4U" title=""/>
                </a>
            </div>
            <div class="col-12 col-sm-3 pt-10 pt-sm-00">
                <?php get_template_part('/core/views/footerMenu'); ?>
            </div>
            <div class="col-12 col-sm-3 pt-10 pt-sm-00">
                <div class="footer__contacts">
                    <div class="footer__title pt-05 pb-05 pt-sm-00 pb-sm-00">Контакты</div>
                    <div class="footer__contacts footer__contacts_text">
                        <img class="footer__contacts footer__contacts_text-image"
                             src="/wp-content/themes/tikets/src/icons/velcom.09a78e.png" alt="Velcom" title=""/>
                        <a href="tel:<?= $phone_vel; ?>"><?= $phone_vel; ?></a>
                    </div>
                    <div class="footer__contacts footer__contacts_text">
                        <img class="footer__contacts footer__contacts_text-image"
                             src="/wp-content/themes/tikets/src/icons/mts.a15c83.png" alt="Mts" title=""/>
                        <a href="tel:<?= $phone_mts; ?>"><?= $phone_mts; ?></a>
                    </div>
                    <div class="footer__contacts footer__contacts_text">
                        <img class="footer__contacts footer__contacts_text-image"
                             src="/wp-content/themes/tikets/src/icons/email.84b8e5.png" alt="email" title=""/>
                        <a href="email:<?= $email; ?>"><?= $email; ?></a>
                    </div>
                    <div class="footer__contacts footer__contacts_text">
                        <?php
                            if (!empty($youtube_link)): ?>
                                <a href="<?= esc_url($youtube_link); ?>">
                                    <img class="footer__soc" src="/wp-content/themes/tikets/src/icons/soc1.png"/>
                                </a>
                            <?php
                            endif;
                            if (!empty($insta_link)):
                                ?>
                                <a href="<?= esc_url($insta_link); ?>">
                                    <img class="footer__soc" src="/wp-content/themes/tikets/src/icons/soc2.png"/>
                                </a>
                            <?php
                            endif;
                            if (!empty($fb_link)):
                                ?>
                                <a href="<?= esc_url($fb_link); ?>">
                                    <img class="footer__soc" src="/wp-content/themes/tikets/src/icons/soc3.png"/>
                                </a>
                            <?php
                            endif;
                            if (!empty($vk_link)):
                                ?>
                                <a href="<?= esc_url($vk_link); ?>">
                                    <img class="footer__soc" src="/wp-content/themes/tikets/src/icons/soc4.png"/>
                                </a>
                            <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-3 pt-10 pt-sm-00">
                <div class="footer__address">
                    <div class="footer__title pt-05 pb-05 pt-sm-00 pb-sm-00">Адрес</div>
                    <div class="footer__address footer__address_text"><?= $address; ?></div>
                    <div class="footer__address footer__address_text">Режим работы: <?= $work_time; ?></div>
                    <img class="footer__address footer__address_image"
                         src="/wp-content/themes/tikets/src/icons/logo-payment-system.d23a70.png" alt="Payment"
                         title=""/>
                </div>
            </div>
        </div>
        <div class="footer__copyright pt-10 pt-sm-20">
            <div class="footer__copyright footer__copyright_text">
                © <?= date('Y'); ?>. Все права защищены. УНП <?= $unp; ?>
            </div>
            <a class="footer__copyright footer__copyright_development" href="https://mastak.by/">
                <span class="footer__copyright footer__copyright_development-text">Разработка сайта</span>
                <img class="footer__copyright footer__copyright_development-image"
                     src="/wp-content/themes/tikets/src/icons/develop.b811c0.svg" alt="mastak" title=""/>
            </a>
        </div>
    </div>
</footer>
