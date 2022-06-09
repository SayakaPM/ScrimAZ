<?php

namespace OnlyJaiden\ScrimAS\Checks\Movement;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\Server;
use pocketmine\player\Player;
use OnlyJaiden\ScrimAS\Alert;

class Fly implements Listener{
  
    public function onPlayerMove(PlayerMoveEvent $event): void{
      $report = new Alert;
      $player = $event->getPlayer();
      $Oldy = $event->getFrom()->getY();
      $Newy = $event->getTo()->getY();
      if($player->getAllowFlight() == false){
          if($Oldy <= $Newy){
              if($player->GetInAirTicks() > 20){
                  $maxY = $player->getWorld()->getHighestBlockAt(floor($event->getTo()->getX()), floor($event->getTo()->getZ()));
                  if($Newy - 2 > $maxY){
                      $report->alert("Fly", $player->getName());
                  }
              }
              
          }
      }
      
    }
}
