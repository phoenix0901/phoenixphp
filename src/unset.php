<?php
// Load composer
require __DIR__ . '/vendor/autoload.php';

$API_KEY = 'your_bot_api_key';
$BOT_NAME = 'username_bot';
try {
    // Create Telegram API object
    $telegram = new phpbot\TelegramBot\Telegram($API_KEY, $BOT_NAME);

    // Unset webhook
    $result = $telegram->unsetWebHook();

    if ($result->isOk()) {
        echo $result->getDescription();
    }
} catch (phpbot\TelegramBot\Exception\TelegramException $e) {
    echo $e;
}
