<?php

namespace antoni\hasteplugin;
use pocketmine\entity\EffectInstance;
use pocketmine\entity\Effect;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;


class Main extends PluginBase implements Listener {

    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onHaste(BlockBreakEvent $e) {

    $p = $e->getPlayer();
    if($p->isSneaking()) {
        $p->addEffect(new EffectInstance(Effect::getEffect(Effect::HASTE),20*5,1));

        }
    }
}
