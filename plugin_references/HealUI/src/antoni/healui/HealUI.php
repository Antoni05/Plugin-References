<?php

namespace antoni\healui;
use jojoe77777\FormAPI\SimpleForm;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\entity\Human;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;


class HealUi extends PluginBase
{
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args):bool {
        if($args) return true;
        if(!$sender instanceof Player) return true;
        $this->saveDefaultConfig();
        $title = $this->getConfig()->get("Title");
        $heal = $this->getConfig()->get("HealSelfName");
        $healAll = $this->getConfig()->get("HealEveryoneName");
        $foodper = $this->getConfig()->get("SaturateTitle");
        $form = new SimpleForm(function(Player $player, ?string $data) {
        if($data === null) return;
        switch($data) {
            case "healSelf":
                $amount = 20;
                $player->setHealth($amount);
                $player->sendMessage("§8[Server] §7You have just been healed to Maximum Health!");
                break;
            case "healAll":
                $amount = 20;
                $ppl = Server::getInstance()->getOnlinePlayers();
                foreach ($ppl as $value) {
                    $value->setHealth($amount);
                }
                Server::getInstance()->broadcastMessage("§8[Server] §7The whole server has just been healed!");
                break;
            case "halfFood":
                $amount = 10;
                $player->addFood($amount);
                $player->sendMessage("§8[Server] §7Half of your Hunger has now been saturated!");
                break;

        }
        });

        $form->setTitle(implode($title));
        $form->addButton(implode($heal), -1, "", "healSelf");
        $form->addButton(implode($healAll), -1, "", "healAll");
        $form->addButton("Feed Half Hunger", -1,"","halfFood");
        $sender->sendForm($form);
    return true; }
}
//§
