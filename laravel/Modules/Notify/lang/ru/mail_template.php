<?php

declare(strict_types=1);

return [
    'navigation' => [
        'group' => [
            'name' => 'Уведомления',
            'description' => 'Управление email уведомлениями и их шаблонами',
        ],
        'label' => 'Email шаблоны',
        'plural' => 'Email шаблоны',
        'singular' => 'Email шаблон',
        'icon' => 'heroicon-o-envelope',
        'sort' => '1',
        'name' => 'Email шаблон',
    ],
    'fields' => [
        'id' => [
            'label' => 'ID',
            'helper_text' => 'Уникальный идентификатор шаблона',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'description' => '',
>>>>>>> dev
        ],
        'mailable' => [
            'label' => 'Класс Mailable',
            'placeholder' => 'Введите имя класса Mailable',
            'help' => 'PHP класс, который обрабатывает отправку email',
            'helper_text' => 'PHP класс, управляющий отправкой email',
            'description' => 'mailable',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'subject' => [
            'label' => 'Тема',
            'placeholder' => 'Введите тему письма',
            'help' => 'Тема, которая появится в письме',
            'helper_text' => 'Тема письма',
            'description' => 'subject',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'html_template' => [
            'label' => 'HTML содержимое',
            'placeholder' => 'Введите HTML содержимое письма',
            'help' => 'Содержимое письма в формате HTML',
            'helper_text' => 'HTML содержимое email шаблона',
            'description' => 'html_template',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'text_template' => [
            'label' => 'Текстовое содержимое',
            'placeholder' => 'Введите текстовое содержимое письма',
            'help' => 'Текстовая версия письма для клиентов, не поддерживающих HTML',
            'helper_text' => 'Текстовая версия email шаблона',
            'description' => 'text_template',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'version' => [
            'label' => 'Версия',
            'help' => 'Номер версии шаблона',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
>>>>>>> dev
        ],
        'created_at' => [
            'label' => 'Создано',
            'helper_text' => 'Дата создания шаблона',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'description' => '',
>>>>>>> dev
        ],
        'updated_at' => [
            'label' => 'Последнее изменение',
            'helper_text' => 'Дата последнего изменения шаблона',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'description' => '',
>>>>>>> dev
        ],
        'from_email' => [
            'label' => 'Email отправителя',
            'helper_text' => 'Адрес электронной почты отправителя',
            'placeholder' => 'noreply@example.com',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'description' => '',
>>>>>>> dev
        ],
        'from_name' => [
            'label' => 'Имя отправителя',
            'helper_text' => 'Отображаемое имя отправителя',
            'placeholder' => 'Название компании',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'description' => '',
>>>>>>> dev
        ],
        'variables' => [
            'label' => 'Доступные переменные',
            'helper_text' => 'Список переменных, которые можно использовать в шаблоне',
            'placeholder' => 'напр: {{name}}, {{email}}',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'description' => '',
>>>>>>> dev
        ],
        'is_markdown' => [
            'label' => 'Использовать Markdown',
            'helper_text' => 'Указывает, использует ли шаблон синтаксис Markdown',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
            'description' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
            'description' => '',
>>>>>>> dev
        ],
        'status' => [
            'label' => 'Статус',
            'helper_text' => 'Текущий статус шаблона',
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
            'tooltip' => '',
            'description' => '',
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'openFilters' => [
            'label' => 'openFilters',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'layout' => [
            'label' => 'layout',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
<<<<<<< HEAD
=======
        ],
        'toggleColumns' => [
            'label' => 'toggleColumns',
        ],
        'reorderRecords' => [
            'label' => 'reorderRecords',
        ],
        'resetFilters' => [
            'label' => 'resetFilters',
        ],
        'applyFilters' => [
            'label' => 'applyFilters',
        ],
        'openFilters' => [
            'label' => 'openFilters',
        ],
        'layout' => [
            'label' => 'layout',
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
        ],
        'slug' => [
            'label' => 'slug',
            'description' => 'slug',
            'helper_text' => 'slug',
            'placeholder' => 'slug',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'name' => [
            'description' => 'Название шаблона',
            'helper_text' => 'Описательное имя для идентификации шаблона',
            'placeholder' => 'Напр: Добро пожаловать, Подтверждение заказа, Сброс пароля',
            'label' => 'Название шаблона',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
        'params' => [
            'label' => 'Параметры',
            'helper_text' => 'Введите параметры, разделенные запятыми, которые можно использовать в шаблоне',
            'placeholder' => 'name, email, date, company',
            'description' => 'Доступные параметры для email шаблона',
<<<<<<< HEAD
<<<<<<< HEAD
            'tooltip' => '',
=======
>>>>>>> 4b6b99016 (first commit)
=======
            'tooltip' => '',
>>>>>>> dev
        ],
    ],
    'filters' => [
        'search_placeholder' => 'Поиск шаблонов...',
        'version' => [
            'label' => 'Версия',
            'placeholder' => 'Выбрать версию',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Новый шаблон',
            'modal' => [
                'heading' => 'Создать email шаблон',
                'description' => 'Введите данные для нового email шаблона',
                'submit' => 'Создать',
            ],
        ],
        'edit' => [
            'label' => 'Редактировать',
            'modal' => [
                'heading' => 'Редактировать email шаблон',
                'description' => 'Изменить данные email шаблона',
                'submit' => 'Сохранить',
            ],
        ],
        'delete' => [
            'label' => 'Удалить',
            'modal' => [
                'heading' => 'Удалить email шаблон',
                'description' => 'Вы уверены, что хотите удалить этот шаблон? Это действие нельзя отменить.',
                'submit' => 'Удалить',
            ],
        ],
        'restore' => [
            'label' => 'Восстановить',
        ],
        'force_delete' => [
            'label' => 'Полное удаление',
            'modal' => [
                'heading' => 'Полное удаление email шаблона',
                'description' => 'Вы уверены, что хотите полностью удалить этот шаблон? Это действие нельзя отменить.',
                'submit' => 'Полное удаление',
            ],
        ],
        'new_version' => [
            'label' => 'Новая версия',
            'modal' => [
                'heading' => 'Создать новую версию',
                'description' => 'Создать новую версию email шаблона',
                'submit' => 'Создать версию',
            ],
        ],
        'preview' => [
            'label' => 'Предварительный просмотр',
            'tooltip' => 'Посмотреть предварительный просмотр письма',
            'success_message' => 'Предварительный просмотр успешно создан',
            'error_message' => 'Ошибка при создании предварительного просмотра',
        ],
        'test' => [
            'label' => 'Отправить тест',
            'tooltip' => 'Отправить тестовое письмо',
            'success_message' => 'Тестовое письмо успешно отправлено',
            'error_message' => 'Ошибка при отправке тестового письма',
        ],
        'duplicate' => [
            'label' => 'Дублировать',
            'tooltip' => 'Создать копию шаблона',
            'success_message' => 'Шаблон успешно дублирован',
            'error_message' => 'Ошибка при дублировании шаблона',
        ],
        'export' => [
            'label' => 'Экспорт',
            'tooltip' => 'Экспортировать шаблон в формат JSON',
            'success_message' => 'Шаблон успешно экспортирован',
            'error_message' => 'Ошибка при экспорте шаблона',
        ],
        'import' => [
            'label' => 'Импорт',
            'tooltip' => 'Импортировать шаблон из JSON файла',
            'success_message' => 'Шаблон успешно импортирован',
            'error_message' => 'Ошибка при импорте шаблона',
        ],
    ],
    'messages' => [
        'created' => 'Email шаблон успешно создан.',
        'updated' => 'Email шаблон успешно обновлен.',
        'deleted' => 'Email шаблон успешно удален.',
        'restored' => 'Email шаблон успешно восстановлен.',
        'force_deleted' => 'Email шаблон полностью удален.',
        'version_created' => 'Новая версия шаблона успешно создана.',
        'success' => 'Операция успешно выполнена',
        'error' => 'Произошла ошибка во время операции',
        'confirmation' => 'Вы уверены, что хотите продолжить эту операцию?',
        'template_created' => 'Email шаблон был успешно создан',
        'template_updated' => 'Email шаблон был успешно обновлен',
        'template_deleted' => 'Email шаблон был успешно удален',
    ],
    'sections' => [
        'template' => [
            'label' => 'Шаблон',
            'description' => 'Основная информация шаблона',
        ],
        'versions' => [
            'label' => 'Версии',
            'description' => 'История версий шаблона',
        ],
        'logs' => [
            'label' => 'Журналы',
            'description' => 'История отправки шаблона',
        ],
        'main' => 'Основная информация',
        'content' => 'Содержимое',
        'styling' => 'Стили',
        'settings' => 'Настройки',
        'variables' => 'Переменные',
    ],
    'status' => [
        'sent' => 'Отправлено',
        'delivered' => 'Доставлено',
        'failed' => 'Неудачно',
        'opened' => 'Открыто',
        'clicked' => 'Кликнуто',
        'bounced' => 'Возвращено',
        'spam' => 'Помечено как спам',
    ],
    'model' => [
        'label' => 'email шаблон',
    ],
<<<<<<< HEAD
<<<<<<< HEAD
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
=======
>>>>>>> 4b6b99016 (first commit)
=======
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
>>>>>>> dev
];
