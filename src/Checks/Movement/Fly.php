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
      $blockAbove = $player->getWorld()->getBlock(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY() + 1, $player->getPosition()->getZ()));
      $movement = ($event->getFrom()->getY() - 0.08 )* 0.98000001907349;
      $difference = abs($event->getTo()->getY() - $movement);
      if($difference > 0.015){
        if($player->GetInAirTicks() > 20){
          $maxY = $player->getPosition()->getHighestBlockAt(floor($event->getTo()->getX()), floor($event->getTo()->getZ()));
          if($difference - 2 > $maxY){
            $report->alert("Fly", $player->getName());
        }
        }
      }
    }
}
