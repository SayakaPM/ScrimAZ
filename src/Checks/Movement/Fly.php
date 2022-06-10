<?php

namespace OnlyJaiden\ScrimAS\Checks\Movement;

use pocketmine\event\Listener;
use pocketmine\math\Vector3;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\Server;
use pocketmine\player\Player;
use OnlyJaiden\ScrimAS\Alert;

class Fly implements Listener{
    public function onPlayerMove(PlayerMoveEvent $event): void{
      # Report is use for 
      $report = new Alert;
      $player = $event->getPlayer();
      $Oldy = $event->getFrom()->getY();
      $Newy = $event->getTo()->getY();
      $blockAbove = $player->getWorld()->getBlock(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY() + 1, $player->getPosition()->getZ()));
      $predictMove = ($blockAbove ? 0 : $Oldy) - 0.08 * 0.98000001907349;
      $difference = abs($Newy - $predictMove);
      if($difference >  0.015){
        $report->alert("Fly A", $player->getName());
      }
    }
}
