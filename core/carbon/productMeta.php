<?php
    if (!defined('ABSPATH')) exit();

    use Carbon_Fields\Container;
    use Carbon_Fields\Field;

    add_action('carbon_fields_register_fields', 'crb_attach_product_meta');
    function crb_attach_product_meta() {
        Container::make('post_meta', 'Дополнительная информация')
            ->where('post_type', '=', 'product')
            ->add_fields([
                Field::make('text', 'main_speaker', 'Главный спикер')
                    ->set_width(50),
                Field::make('image', 'main_speaker_img', "Главный спикер(Избражение)")
                    ->set_help_text("Отображается на странице списка программ")
                    ->set_value_type('url')
                    ->set_width(50),
                Field::make('complex', 'crb_partners', 'Партнеры')
                    ->add_fields('partner', [
                            Field::make('select', 'id', 'Выберите партнера')
                                ->add_options('my_computation_heavy_getter_function')
                                ->set_width(50),
                            Field::make('checkbox', 'show_partner_site', __('Переход на сайт партнера'))
                                ->set_option_value('yes')
                                ->set_width(50),
                        ]
                    )->set_collapsed( true ),
            ]);

        Container::make('post_meta', 'Табики')
            ->where('post_type', '=', 'product')
            ->add_tab(__('Программа'), [
                Field::make('complex', 'crb_program_points', 'Пункты программы')
                    ->add_fields('point', [
                            Field::make('text', 'point_time', 'Время')
                                ->set_width(30),
                            Field::make('text', 'point_title', 'Заголовок')
                                ->set_width(70),
                            Field::make('textarea', 'desc', 'Описание'),
                        ]
                    )->set_collapsed( true ),
            ])
            ->add_tab(__('Спикеры'), [
                Field::make('complex', 'spikers_list', 'Спикеры')
                    ->add_fields('spiker', [
                            Field::make('image', 'spiker_image', __('Photo'))
                                ->set_value_type('url')
                                ->set_width(30),
                            Field::make('text', 'spiker_name', __('Name'))
                                ->set_width(70),
                            Field::make('rich_text', 'spiker_desc', 'Информация'),
                        ]
                    )->set_collapsed( true ),
            ])
            ->add_tab(__('О чем курс'), [
                Field::make('complex', __('about_program'))
                    ->add_fields('part', [
                            Field::make('text', 'part_title', __('Title')),
                            Field::make('textarea', 'part_subtitle', 'Подзаголовок'),
                            Field::make('rich_text', 'part_content', 'Контетн'),
                        ]
                    )
                    ->add_fields('part_with_label', [
                            Field::make('text', 'part_title', __('Title')),
                            Field::make('textarea', 'part_subtitle', 'Подзаголовок'),
                            Field::make('rich_text', 'part_content', 'Контетн'),
                            Field::make('text', 'part_label_title', 'Лэйбл заголовок'),
                            Field::make('complex', 'part_label_paragraphs', 'Параграфы')
                                ->add_fields('paragraph', [
                                    Field::make('textarea', 'part_label_paragraph', 'Параграф')
                                        ->set_width(90),
                                    Field::make('checkbox', 'paragraph_bold', 'Жирный текст')
                                        ->set_width(10),
                                ])->set_collapsed( true ),
                            Field::make('file', 'part_label_file', 'Файл для скачки')
                                ->set_value_type('url'),
                        ]
                    )->set_collapsed( true ),
            ]);

        Container::make('post_meta', 'Дата, место и отзыв')
            ->where('post_type', '=', 'product')
            ->add_fields([
                Field::make('date_time', 'prod_date_time', 'Дата, время')
                //				->set_storage_format( 'Y-m-d H:i:s' )
                //				->set_input_format( 'Y-m-d H:i:s', 'Y-m-d H:i:s')
                ,
                Field::make('text', 'prod_address', 'Адрес'),
                Field::make('separator', 'crb_promo_separator', __('Отзыв')),
                Field::make('text', 'reviewer_name', __('Имя'))
                    ->set_width(50),
                Field::make('text', 'reviewer_position', 'Должнасть')
                    ->set_width(50),
                Field::make('image', 'reviewer_image', __('Image'))
                    ->set_value_type('url')
                    ->set_width(33),
                Field::make('file', 'reviewer_video', __('Video'))
                    ->set_value_type('url')
                    ->set_type('video')
                    ->set_width(33),
                Field::make('image', 'video_preview', 'Превью')
                    ->set_value_type('url')
                    ->set_width(33),
            ]);

        Container::make('post_meta', 'Скидка от количества билетов')
            ->where('post_type', '=', 'product')
            ->add_fields([
                Field::make('complex', 'quantity_discount', 'Список скидок')
                    ->add_fields('discount', [
                        Field::make('text', 'quantity_from', 'От')
                            ->set_width(30)
                            ->set_required( true ),
                        Field::make('text', 'quantity_to', 'до')
                            ->set_width(30)
                            ->set_required( true ),
                        Field::make('text', 'discount', 'Скидка')
                            ->set_width(30)
                            ->set_required( true ),
                    ])->set_layout( "tabbed-horizontal" ),
            ]);
    }

    add_action('after_setup_theme', 'crb_load_product_meta');
    function crb_load_product_meta() {
        \Carbon_Fields\Carbon_Fields::boot();
    }

    function my_computation_heavy_getter_function() {
        $my_query       = new WP_Query();
        $query_partners = $my_query->query(['post_type' => 'partner']);

        $partners = [];
        foreach ($query_partners as $partner) {
            $partners[$partner->ID] = $partner->post_title;
        }
        return $partners;
    }
