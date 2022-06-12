<?php

declare(strict_types=1);

namespace OnlyJaiden\ScrimAS\Checks;

// custom
use OnlyJaiden\ScrimAS\User;
use OnlyJaiden\ScrimAS\Main;
use OnlyJaiden\ScrimAS\Alert;
// pocketmine
use pocketmine\Server;
use pocketmine\math\Vector3;
use pocketmine\player\Player;
use pocketmine\entity\effect\VanillaEffects;
use pocketmine\entity\effect\EffectInstance;
use pocketmine\block\Block;

class Check {
  public function checkEffect($player, $cheat): void {
    $report = new Alert;
    // Effects #0000
    if($cheat == 'Fly'){
        if($player->getEffects()->has(VanillaEffects::LEVITATION())){
            return;
        }
        $report->alert($cheat, $player->getName());
      }
      // Effects #0001
    if($cheat == 'Speed'){
      if($player->getEffects()->has(VanillaEffects::SPEED())){
          return;
      }
      // Blocks #0002
      $blockBelow = $player->getWorld()->getBlock(new Vector3($player->getPosition()->getX(), $player->getPosition()->getY() - 0.5, $player->getPosition()->getZ()));
      $player->sendMessage($blockBelow);
      $report->alert($cheat, $player->getName());
  }
  }
}
