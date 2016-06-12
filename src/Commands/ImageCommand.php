<?php
/**
 * ImageCommand.php
 * This file is part of the TelegramBot package.
 *
 * (c) Ashkan yzd
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace phpbot\TelegramBot\Commands\UserCommands;

use phpbot\TelegramBot\Commands\UserCommand;
use phpbot\TelegramBot\Request;
use phpbot\TelegramBot\Entities\ReplyKeyboardMarkup;

/**
 * User "/image" command
 */
class ImageCommand extends UserCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'image';
    protected $description = 'Send Image';
    protected $usage = '/image';
    protected $version = '2.0.0';
    /**#@-*/

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $message = $this->getMessage();
        $chat_id = $message->getChat()->getId();
        $text = trim($message->getText(true));
        $random = rand (10,99000);
        $data = [];
        $data['chat_id'] = $chat_id;
        if ($text === '') {
            
        $url = 'http://lorempixel.com/400/200/';
        $img = $this->telegram->getUploadPath().'/'.$random.'.png';
        file_put_contents($img, file_get_contents($url));
        $data['caption'] = 'Random';
        
        return Request::sendPhoto($data, $this->telegram->getUploadPath().'/'.$random.'.png');
        } else {
        $api = file_get_contents('http://5.9.183.69/index.php?text='.$text);
        $img =  $this->telegram->getUploadPath().'/'.$random.'.jpg';
        file_put_contents($img, file_get_contents($api));
        $data['caption'] = $text;
        
        return Request::sendPhoto($data, $this->telegram->getUploadPath().'/'.$random.'.jpg');
        }

        
        //return Request::sendPhoto($data, $this->ShowRandomImage($this->telegram->getUploadPath()));
    }
    //return random picture from the telegram->getUploadPath();
    
    private function ShowRandomImage($dir) {
    $image_list = scandir($dir);
    return $dir . "/" . $image_list[mt_rand(2, count($image_list) - 1)];
  }

}