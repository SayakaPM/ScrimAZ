<?php

declare(strict_types=1);

namespace OnlyJaiden\ScrimAS\Checks;

use OnlyJaiden\ScrimAS\User;
use OnlyJaiden\ScrimAS\Main;
use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\entity\effect\EffectManager;
use pocketmine\entity\effect\EffectInstance;
use OnlyJaiden\ScrimAS\Alert;

class Check {
  public function checkEffect($player, $cheat): void {
    $report = new Alert;
    if($cheat == 'Fly'){
      $levitation = EffectManager::get(EffectInstance::LEVITATION);
        if($player->getEffects()->has($levitation)){
            return;
        }
        $report->alert("Fly", $player->getName());
    }

  }
}
