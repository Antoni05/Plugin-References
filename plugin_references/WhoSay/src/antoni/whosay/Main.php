<?php

namespace antoni\whosay;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Server;


class Main extends PluginBase implements Listener {

    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onCommand(CommandSender $sender, Command $cmd, String $label, array $args): bool {
        if(!isset($args[0])) { return false; } else {
        if($cmd->getName() === "whosay") {
            $msgs = implode(" ", $args);
            Server::getInstance()->broadcastMessage($msgs);
            return true;
            }
        }
    }
}
