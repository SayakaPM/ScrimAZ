<?php

namespace OnlyJaiden\ScrimAS\Checks\Movement;

use pocketmine\math\Vector3;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\entity\effect\VanillaEffects;
use pocketmine\Server;
use pocketmine\player\Player;
use OnlyJaiden\ScrimAS\Alert;
use OnlyJaiden\ScrimAS\Checks\Check;

class Speed implements Listener{
    public function onPlayerMove(PlayerMoveEvent $event): void{
        $report = new Alert;
        $check = new Check;
        $player = $event->getPlayer();
        $x = $event->getFrom()->getX() - $event->getTo()->getX();
        //$y = $event->getFrom()->getY() - $event->getTo()->getY();
        $z = $event->getFrom()->getZ() - $event->getTo()->getZ();
        //Checks if player is moving too fast in X Cords
        if(abs($x) >= 1.1) {
                $check->checkEffect($player, 'Speed');
        }
        //Checks if player is moving too fast in Y Cords
        if(abs($z) >= 1.1) {
                $check->checkEffect($player, 'Speed');
        }

    }
}