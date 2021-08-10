<?php

namespace App\Messenger\MessageHandler;

use App\Messenger\Message\SmsNotification;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SmsNotificationHandler implements MessageHandlerInterface
{
    public function __invoke(SmsNotification $message)
    {
        dump($message);
    }
}