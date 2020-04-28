<?php

namespace Antoni\TPI;

use jojoe77777\FormAPI\CustomForm;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;


class tpi extends PluginBase {

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool {
        if (!$sender instanceof Player) return true;
        //Online Players
        $onlinePlayers = Server::getInstance()->getOnlinePlayers();
        sort($onlinePlayers);
        //Dropdown Options
        $options = [];
        foreach($onlinePlayers as $online){
            array_push($options, $online->getName());
        }
        //Form Creation
        $form = new CustomForm(function (Player $player, ?array $data) use ($onlinePlayers) {
            if (!$data) return;
                $player1 = $onlinePlayers[$data[0]];
                $player2 = $onlinePlayers[$data[1]];
                $player1->teleport($player2);
                $name1 = $player1->getName();
                $name2 = $player2->getName();
                $player->sendMessage("$name1 has successfully been teleported to $name2");
        });
        //Form Type Layout
        $form->addDropdown("Teleport: ", $options, null, 0);
        $form->addDropdown("To: ", $options, null, 1);
        $sender->sendForm($form);
        return true; }
}

