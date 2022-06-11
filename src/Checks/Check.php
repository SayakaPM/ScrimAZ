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
    $levitation = new EffectInstance(VanillaEffects::LEVITATION());
    $report = new Alert;
    if($cheat == 'Fly'){
        if($player->getEffects()->has($levitation)){
            return;
        }
        $report->alert("Fly", $player->getName());
    }

  }
}
