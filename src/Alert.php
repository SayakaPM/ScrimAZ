<?php

declare(strict_types=1);

namespace OnlyJaiden\ScrimAS;

use pocketmine\Server;
use pocketmine\player\Player;

class Alert {

  public function alert(string $cheat, string $player): void {
        foreach(Server::getInstance()->getOnlinePlayers() as $staff) {
            if($staff->hasPermission("alert.ac")) {
                $staff->SendMessage("[Alerts] $player has been using $cheat");
            }
        }
    }

}
