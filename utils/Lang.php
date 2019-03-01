<?php

	class Lang {

		const COOKIE_KEY = 'lang';
		const LANGUAGES = [ 'ru', 'en' ];
		const BASE_LANG = 'ru';
		const CONSTANTS = [
			'All rights reserved.'                                                           => [
				'ru' => 'Все права защищены.',
				'en' => 'All rights reserved.'
			],
			'Attention: An email with the activation code was sent again. Check your email.' => [
				'ru' => "Внимание: Письмо с кодом активации выслано повторно. Проверьте Ваш email.",
				'en' => "Attention: An email with the activation code was sent again. Check your email."
			],
			'Attention: please Confirm your email address.'                                  => [
				'ru' => "Внимание: Подтвердите Ваш email-адрес.",
				'en' => "Attention: please Confirm your email address."
			],
			'Attention: Your account is inactive.'                                           => [
				'ru' => "Внимание: Ваш аккаунт неактивен. Пожалуйста, перейдите по ссылке в письме, высланном Вам на почту.",
				'en' => "Attention: Your account is inactive. Please follow the link in the email sent to you."
			],
			'blog'                                                                           => [
				'ru' => 'блог',
				'en' => 'blog'
			],
			'by'                                                                             => [
				'ru' => ' ',
				'en' => 'by'
			],
			'Click here to confirm your email address'                                       => [
				'ru' => 'Для подтверждения email-адреса перейдите по ссылке',
				'en' => 'Click here to confirm your email address',
			],
			'Confirm Email address'                                                          => [
				'ru' => 'Подтверждение Email-адреса',
				'en' => 'Confirm Email address'
			],
			'Congratulations: Your account is activated!'                                    => [
				'ru' => "Поздравляем: Ваш аккаунт активирован!",
				'en' => "Congratulations: Your account is activated!"
			],
			'Contacts'                                                                       => [
				'ru' => 'Контакты',
				'en' => 'Contacts'
			],
			'click'                                                                          => [
				'ru' => 'Кликни',
				'en' => 'Click'
			],
			'Error: your account is not activated.'                                          => [
				'ru' => "Ошибка: Ваш аккаунт не активирован.",
				'en' => "Error: your account is not activated."
			],
			'home'                                                                           => [
				'ru' => 'главная',
				'en' => 'home'
			],
			'Links'                                                                          => [
				'ru' => 'Ссылки',
				'en' => 'Links'
			],
			'login'                                                                          => [
				'ru' => 'Login',
				'en' => 'Login'
			],
			'map'                                                                            => [
				'ru' => 'Карта',
				'en' => 'Map'
			],
			'Menu'                                                                           => [
				'ru' => 'Меню',
				'en' => 'Menu'
			],
			'partners'                                                                       => [
				'ru' => 'Партнеры',
				'en' => 'Partners'
			],
			'photo'                                                                          => [
				'ru' => 'Фото',
				'en' => 'Photo'
			],
			'read more'                                                                      => [
				'ru' => 'подробнее',
				'en' => 'read more'
			],
			'REGULATION'                                                                     => [
				'ru' => 'РЕГЛАМЕНТ',
				'en' => 'REGULATION'
			],
			'registration'                                                                   => [
				'ru' => 'Зарегистрироваться',
				'en' => 'Registration'
			],
			'resent posts'                                                                   => [
				'ru' => 'последние новости',
				'en' => 'recent news'
			],
			'results'                                                                        => [
				'ru' => 'Результаты',
				'en' => 'Results'
			],
			'search'                                                                         => [
				'ru' => 'Поиск...',
				'en' => 'Search...'
			],
			'search-empty'                                                                   => [
				'ru' => 'Поиск не принес результатов',
				'en' => 'Search returned no results'
			],
			'search-empty-description'                                                       => [
				'ru' => 'По вашему запросу нет данных, попробуйте ввести другой запрос',
				'en' => 'No data available on your request, please try another request'
			],
			'Send_again'                                                                     => [
				'ru' => 'Выслать снова на ',
				'en' => 'Send again to '
			],
			'shema_delivery'                                                                 => [
				'ru' => 'Схема проезда',
				'en' => 'Location map'
			],
			'Socials'                                                                        => [
				'ru' => 'Социальные сети',
				'en' => 'Socials'
			],
			'tags'                                                                           => [
				'ru' => 'теги',
				'en' => 'tags'
			],
			'video'                                                                          => [
				'ru' => 'Видео',
				'en' => 'Video'
			]
		];

		public static function current() {
			return ( isset( $_COOKIE[ self::COOKIE_KEY ] ) and in_array( $_COOKIE[ self::COOKIE_KEY ], self::LANGUAGES ) ) ?
				$_COOKIE[ self::COOKIE_KEY ] :
				self::LANGUAGES[0];
		}

		public static function get( $name, $echo = false ) {
			$value = self::CONSTANTS[ $name ][ self::current() ];
			if ( $echo ) {
				echo $value;
			} else {
				return $value;
			}
		}

	}