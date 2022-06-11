<?php

declare(strict_types=1);

namespace OnlyJaiden\ScrimAS\Checks;

use OnlyJaiden\ScrimAS\User;
use OnlyJaiden\ScrimAS\Main;
use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\entity\effect\Effect;
use OnlyJaiden\ScrimAS\Alert;

class Check {
  public function checkEffect(string $player, string $cheat): void {
    $report = new Alert;
    if($cheat == 'Fly'){
        $levitation = Effect::getEffect(Effect::LEVITATION);
        if($player->getEffects()->has($levitation)){
            return;
        }
        $report->alert("Fly", $player->getName());
    }

  }
}
