#!/usr/bin/env php
<?php
//README
//This configuration file is intented to run the bot with the webhook method
//Uncommented parameters must be filled

// Load composer
require __DIR__ . '/vendor/autoload.php';

$API_KEY = 'your_telegram_api';
$BOT_NAME = 'username';
$commands_path = __DIR__ . '/Commands/';
$mysql_credentials = [
   'host'     => 'localhost',
   'user'     => 'root',
   'password' => 'pass',
   'database' => 'db',
];

try {
    // Create Telegram API object
    $telegram = new phpbot\TelegramBot\Telegram($API_KEY, $BOT_NAME);

    // Enable MySQL
    $telegram->enableMySQL($mysql_credentials);

    //// Enable MySQL with table prefix
    $telegram->enableMySQL($mysql_credentials, $BOT_NAME . '_');

    //// Add an additional commands path
    $telegram->addCommandsPath($commands_path);

    //// Here you can enable admin interface for the channel you want to manage
    $telegram->enableAdmins(['your_id']);
    

    \phpbot\TelegramBot\TelegramLog::initErrorLog('./' . $BOT_NAME . '_error.log');
    \phpbot\TelegramBot\TelegramLog::initDebugLog('./' . $BOT_NAME . '_debug.log');
    \phpbot\TelegramBot\TelegramLog::initUpdateLog('./' . $BOT_NAME . '_update.log');

    //// Set custom Upload and Download path
    //$telegram->setDownloadPath('../Download');
    //$telegram->setUploadPath('../Upload');

    //// Botan.io integration
    //$telegram->enableBotan('botan_api');

    // Handle telegram getUpdate request
    $ServerResponse = $telegram->handleGetUpdates();

    if ($ServerResponse->isOk()) {
        $n_update = count($ServerResponse->getResult());
        print(date('Y-m-d H:i:s', time()) . ' - Processed ' . $n_update . ' updates' . "\n");
    } else {
        print(date('Y-m-d H:i:s', time()) . ' - Failed to fetch updates' . "\n");
        echo $ServerResponse->printError() . "\n";
    }
} catch (phpbot\TelegramBot\Exception\TelegramException $e) {
    echo $e;
    // log telegram errors
    \phpbot\TelegramBot\TelegramLog::error($e);
} catch (phpbot\TelegramBot\Exception\TelegramLogException $e) {
    //catch log initilization errors
    echo $e;
}
