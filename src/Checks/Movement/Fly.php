<?php

namespace OnlyJaiden\ScrimAS\Checks\Movement;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\entity\effect\VanillaEffects;
use pocketmine\entity\effect\EffectManager;
use pocketmine\entity\effect\EffectInstance;
use pocketmine\data\bedrock\EffectIds;
use OnlyJaiden\ScrimAS\Checks\Check;

class Fly implements Listener{
  
    public function onPlayerMove(PlayerMoveEvent $event): void{
      $check = new Check;
      $player = $event->getPlayer();
      $Oldy = $event->getFrom()->getY();
      $Newy = $event->getTo()->getY();
      if($player->getAllowFlight() == false){
          if($Oldy <= $Newy){
              if($player->GetInAirTicks() > 20){
                $playerPos = $player->getPosition()->floor();
                $world = $player->getPosition()->getWorld();
                for($y = $playerPos - 2; $y >= World::MIN_Y; --$y){
                  $block = $world->getBlockAt($playerPos->x, $y, $playerPos->z, false, false);
                  if($block->isSolid() && !$block->isTransparent()){
                    $check->checkEffect($player, 'Fly');
                  }
                  }
              } 
          }
      }
    }
}