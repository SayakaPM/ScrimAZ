<?php

namespace OnlyJaiden\ScrimAS\Checks\Movement;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\Server;
use pocketmine\player\Player;
use OnlyJaiden\ScrimAS\Alert;

class Spider implements Listener{
  
    public function onPlayerMove(PlayerMoveEvent $event): void{
      $report = new Alert;
    }
}