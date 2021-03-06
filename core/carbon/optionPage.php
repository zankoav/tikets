<?php
    if (!defined('ABSPATH')) exit();

    use Carbon_Fields\Container;
    use Carbon_Fields\Field;

    add_action('carbon_fields_register_fields', 'crb_attach_theme_options');
    function crb_attach_theme_options() {
        $basic_options_container = Container::make('theme_options', __('Настройки темы'))
            ->set_page_file('theme-options')
            ->set_page_menu_title('Настройки темы')
            ->set_icon('dashicons-carrot')
            ->add_tab(__('Основные настройки'), [
                Field::make('image', 'crb_logo_img', __('Logo'))
                    ->set_value_type('url')
                    ->set_width(50),
                Field::make('image', 'crb_footer_logo_img', 'Логотип в подвале')
                    ->set_value_type('url')
                    ->set_width(50),
                Field::make('separator', 'crb_contact_data_op_sep', __('Контактная информаця')),
                Field::make('text', 'crb_phone_vel', 'Номер телефон(velcom)')
                    ->set_width(50),
                Field::make('text', 'crb_phone_mts', 'Номер телефон(МТС)')
                    ->set_width(50),
                Field::make('text', 'crb_email', 'Email'),
                Field::make('text', 'crb_address', 'Аднес'),
                Field::make('text', 'crb_work_time', 'Режим работы'),
                Field::make('text', 'crb_unp', 'УНП'),
                Field::make('separator', 'crb_soc_links_op_sep', __('Социальные сети')),
                Field::make('text', 'crb_vk_link', 'Вконтакте'),
                Field::make('text', 'crb_insta_link', 'Instagram'),
                Field::make('text', 'crb_fb_link', 'FaceBook'),
                Field::make('text', 'crb_youtube_link', 'Youtube'),
            ])
            ->add_tab(__('Формы'), [
                Field::make('separator', 'partnership_mail_op_sep', 'Email для форм'),
                Field::make('text', 'partnership_mail', 'Email')
                    ->set_help_text('Email, на который будут отправляться письма'),

                Field::make('separator', 'crb_ccsqf_op_sep', __('Форма на странице "Задать вопрос"')),
                Field::make('textarea', 'text_before_form', 'Текс до формы'),
                Field::make('textarea', 'text_after_form', 'Текс полсе формы'),
//
                Field::make('separator', 'crb_main_page_form_op_sep', __('Форма на главной странице')),
                Field::make('text', 'shortcode_form', 'Shortcode для вывода формы'),
            ])
            ->add_tab(__('Баннер'), [
                Field::make('separator', 'programm_page_banner_op_sep', __('Баннер на страницах категорий')),
                Field::make('image', 'prod_cat_banner_img', 'Баннер')
                    ->set_value_type('url')
                    ->set_width(50),
                Field::make('text', 'prod_cat_banner_link', 'Ссылка банера')
                    ->set_width(50),
            ])
            ->add_tab(__('Страницы'), [
                Field::make('separator', 'crb_404_link_op_sep', __('Страница 404')),
                Field::make('text', 'crb_404_link', 'Ссылка на странице 404'),

                Field::make('separator', 'crb_question_link_op_sep', __('Страница для задания вопроса')),
                Field::make('select', 'question_link', 'Выберите страницы')
                    ->add_options('page_selecting')
                    ->set_required(true),
                Field::make('separator', 'crb_cashless_page_link_op_sep', __('Страница атрибутов безналичного расчёта')),
                Field::make('select', 'cashless_page_link', 'Выберите страницы')
                    ->add_options('page_selecting')
                    ->set_required(true),
                Field::make('separator', 'crb_public_offer_link_op_sep', __('Страница заказа билета')),
                Field::make('text', 'public_offer_link', 'Ссылка на файл Публичной оферты'),
                Field::make('text', 'discount_and_sail', 'Ссылка над счётчиком'),
                Field::make('text', 'discount_and_sail_text', 'Текст ссылки'),
            ]);

        // Add second options page under 'Basic Options'
        Container::make('theme_options', 'Настройки WEBPAY')
            ->set_page_parent($basic_options_container)// reference to a top level container
            ->add_fields([

                Field::make('text', 'wsb_store', 'Название магазина')
                    ->set_required(true),
                Field::make('text', 'wsb_storeid', 'ID магазина')
                    ->set_required(true),
                Field::make('text', 'wsb_secret_key', 'Секретный ключ')
                    ->set_required(true),

                Field::make('text', 'webpay_user_name', 'Имя пользователя WEBPAY')
                    ->set_required(true),
                Field::make('text', 'webpay_user_password', 'Пароль пользователя WEBPAY')
                    ->set_required(true),

                Field::make('radio', 'payment_test_mode', "Оплата в теставом режиме")
                    ->set_options([
                        '0' => 'проводить реальную оплату',
                        '1' => 'производить тестовую оплату',
                    ]),

                Field::make('select', 'wsb_cancel_return_url', 'Выберите страницу для неудачной оплата заказа')
                    ->add_options('page_selecting')
                    ->set_required(true),
                Field::make('select', 'wsb_notify_url', 'Выберите страницу для извещения о оплате')
                    ->add_options('page_selecting')
                    ->set_required(true),
            ]);
    }

    add_action('after_setup_theme', 'crb_load');
    function crb_load() {
        \Carbon_Fields\Carbon_Fields::boot();
    }

    function page_selecting() {
        $my_query   = new WP_Query();
        $query_news = $my_query->query(['post_type' => 'page']);

        $news_list = [];
        foreach ($query_news as $news) {
            $news_list[$news->ID] = $news->post_title;
        }
        return $news_list;
    }