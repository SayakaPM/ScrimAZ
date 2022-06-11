<?php

declare(strict_types=1);

namespace OnlyJaiden\ScrimAS\Checks;

use OnlyJaiden\ScrimAS\User;
use OnlyJaiden\ScrimAS\Main;
use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\entity\effect\VanillaEffects;
use pocketmine\entity\effect\EffectInstance;
use OnlyJaiden\ScrimAS\Alert;

class Check {
  public function checkEffect($player, $cheat): void {
    $report = new Alert;
    // Check if Player has LEVITATION as it alerts fly.
    if($cheat == 'Fly'){
        if($player->getEffects()->has(VanillaEffects::LEVITATION())){
            return;
        }
        $report->alert($cheat, $player->getName());
    }
  }
}
