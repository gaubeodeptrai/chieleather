<?php
namespace app\modules\orders;

class OrdersModule extends \yii\easyii\components\Module
{
    public $settings = [
        'enableTitle' => false,
        'enableEmail' => true,
        'preModerate' => false,
        'enableCaptcha' => false,
        'mailAdminOnNewPost' => true,
        'subjectOnNewPost' => 'New message in the guestbook.',
        'templateOnNewPost' => '@app/modules/orders/mail/en/new_post',
        'frontendGuestbookRoute' => '/orders',
        'subjectNotifyUser' => 'Your post in the guestbook answered',
        'templateNotifyUser' => '@app/modules/orders/mail/en/notify_user'
    ];

    public static $installConfig = [
        'title' => [
            'en' => 'Guestbook',
            'ru' => 'Гостевая книга',
        ],
        'icon' => 'book',
        'order_num' => 80,
    ];
}