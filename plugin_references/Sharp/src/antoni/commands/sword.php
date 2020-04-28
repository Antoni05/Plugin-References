<?php

namespace antoni\commands;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;


class Sword extends PluginBase implements Listener {

    public $usage = "§4/sword <diamond|gold|iron|wooden>";

    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args):bool  {
        if(!$sender instanceof Player) return true;
        if($cmd->getName() === "sword") {
            if(isset($args[0])) {
                $lowerC = strtolower($args[0]);
                if($lowerC === "diamond") {
                    $sender->getInventory()->addItem($item = Item::get(Item::DIAMOND_SWORD));
                    $sender->sendMessage("§4" . "Successfully given you §e" . $item->getName() . "§4!");
                }
                if($lowerC === "gold") {
                    $sender->getInventory()->addItem($item = Item::get(Item::GOLDEN_SWORD));
                    $sender->sendMessage("§4" . "Successfully given you §e" . $item->getName() . "§4!");
                }
                if($lowerC === "iron") {
                    $sender->getInventory()->addItem($item = Item::get(Item::IRON_SWORD));
                    $sender->sendMessage("§4" . "Successfully given you §e" . $item->getName() . "§4!");
                }
                if($lowerC === "wooden") {
                    $sender->getInventory()->addItem($item = Item::get(Item::WOODEN_SWORD));
                    $sender->sendMessage("§4" . "Successfully given you §e" . $item->getName() . "§4!");
                }
            return true; } else { return false; }
        }
    }
}
