<?php

declare(strict_types=1);

namespace OnlyJaiden\ScrimAS;

use OnlyJaiden\ScrimAS\Checks\Movement\Speed;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{
    
    public function onEnable(): void {
        $this->registerEvents(new Speed());
    }
    
    private function registerEvents(Listener $listener): void {
        $this->getServer()->getPluginManager()->registerEvents($listener, $this);
    }

}
