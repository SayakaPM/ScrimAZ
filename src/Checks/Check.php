<?php

declare(strict_types=1);

namespace OnlyJaiden\ScrimAS\Checks;

// custom
use OnlyJaiden\ScrimAS\User;
use OnlyJaiden\ScrimAS\Main;
use OnlyJaiden\ScrimAS\Alert;
// pocketmine
use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\entity\effect\VanillaEffects;
use pocketmine\block\VanillaBlocks;
use pocketmine\entity\effect\EffectInstance;
use pocketmine\block\Block;

class Check {
  public function checkEffect(Player $player, string $cheat): void {
    $report = new Alert;
    // Fly Effects #0000
    if($cheat == 'Fly'){
      if($player->getAllowFlight() == false){
        if($player->getEffects()->has(VanillaEffects::LEVITATION())){
            return;
        }
        $report->alert($cheat, $player);
      }
    }
      // Speed Effects #0001
    if($cheat == 'Speed'){
      if($player->getAllowFlight() == false){
      if($player->getEffects()->has(VanillaEffects::SPEED())){
          return;
      }
      // Blocks #0002
      $cord = $player->getPosition()->getY() - 0.5;
      $blockBelow = $player->getWorld()->getBlock($player->getPosition()->subtract(0, 0.5, 0));
      if($blockBelow->isSameType(VanillaBlocks::PACKET_ICE()) || $blockBelow->isSameType(VanillaBlocks::ICE()))
      $report->alert($cheat, $player);
    }
  }
}
}
