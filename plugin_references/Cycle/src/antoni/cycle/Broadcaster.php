<?php

namespace antoni\cycle;
use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\ClosureTask;
use pocketmine\Server;

class Broadcaster extends PluginBase {

    private $defNum = 0;

    public function onEnable() {
        $this->getScheduler()->scheduleRepeatingTask(new ClosureTask( function(int $currentTick): void{
        $this->saveDefaultConfig();
        $messages = $this->getConfig()->get("num");

            Server::getInstance()->broadcastMessage($messages[$this->defNum]);
            $this->defNum === 3 ? $this->defNum = 0 : $this->defNum++;


            }
        ), 80);
    }
}


