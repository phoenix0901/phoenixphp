<?php
//README
//This configuration file is intended to run the bot with the webhook method.
//Uncommented parameters must be filled
//Please notice that if you open this file with your browser you'll get the "Input is empty!" Exception.
//This is a normal behaviour because this address has to be reached only by Telegram server.

// Load composer
require __DIR__ . '/vendor/autoload.php';

$API_KEY = 'your_bot_api_key';
$BOT_NAME = 'username_bot';
//$commands_path = __DIR__ . '/Commands/';
//$mysql_credentials = [
//    'host'     => 'localhost',
//    'user'     => 'dbuser',
//    'password' => 'dbpass',
//    'database' => 'dbname',
//];

try {
    // Create Telegram API object
    $telegram = new phpbot\TelegramBot\Telegram($API_KEY, $BOT_NAME);

    //// Enable MySQL
    //$telegram->enableMySQL($mysql_credentials);

    //// Enable MySQL with table prefix
    //$telegram->enableMySQL($mysql_credentials, $BOT_NAME . '_');

    //// Add an additional commands path
    //$telegram->addCommandsPath($commands_path);

    //// Here you can enable admin interface for the channel you want to manage
    //$telegram->enableAdmins(['your_telegram_id']);
    //$telegram->setCommandConfig('sendtochannel', ['your_channel' => '@type_here_your_channel']);

    //// Here you can set some command specific parameters,
    //// for example, google geocode/timezone api key for date command:
    //$telegram->setCommandConfig('date', ['google_api_key' => 'your_google_api_key_here']);

    //// Logging
    //\phpbot\TelegramBot\TelegramLog::initialize($your_external_monolog_instance);
    //\phpbot\TelegramBot\TelegramLog::initErrorLog($path . '/' . $BOT_NAME . '_error.log');
    //\phpbot\TelegramBot\TelegramLog::initDebugLog($path . '/' . $BOT_NAME . '_debug.log');
    //\phpbot\TelegramBot\TelegramLog::initUpdateLog($path . '/' . $BOT_NAME . '_update.log');

    //// Set custom Upload and Download path
    //$telegram->setDownloadPath('../Download');
    //$telegram->setUploadPath('../Upload');

    //// Botan.io integration
    //$telegram->enableBotan('your_token');

    // Handle telegram webhook request
    $telegram->handle();
} catch (phpbot\TelegramBot\Exception\TelegramException $e) {
    // Silence is gold!
    // echo $e;
    // log telegram errors
    \phpbot\TelegramBot\TelegramLog::error($e);
} catch (phpbot\TelegramBot\Exception\TelegramLogException $e) {
    // Silence is gold! Uncomment this to catch log initilization errors
    //echo $e;
}
