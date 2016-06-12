<?php
/**
 * HidekeyboardCommand.php
 * This file is part of the TelegramBot package.
 *
 * (c) Ashkan yzd
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace phpbot\TelegramBot\Commands\UserCommands;

use phpbot\TelegramBot\Commands\UserCommand;
use phpbot\TelegramBot\Entities\ReplyKeyboardHide;
use phpbot\TelegramBot\Entities\ReplyKeyboardMarkup;
use phpbot\TelegramBot\Request;

/**
 * User "/hidekeyboard" command
 */
class HidekeyboardCommand extends UserCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'hidekeyboard';
    protected $description = 'Hide the custom keyboard';
    protected $usage = '/hidekeyboard';
    protected $version = '0.0.6';
    /**#@-*/

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $message = $this->getMessage();
        $chat_id = $message->getChat()->getId();

        $data = [
            'chat_id'      => $chat_id,
            'text'         => 'Keyboard Hidden',
            'reply_markup' => new ReplyKeyboardHide(['selective' => false]),
        ];

        return Request::sendMessage($data);
    }
}
