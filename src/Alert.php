<?php

declare(strict_types=1);

namespace OnlyJaiden\ScrimAS;

use OnlyJaiden\ScrimAS\Main;
use pocketmine\Server;
use pocketmine\player\Player;
use OnlyJaiden\ScrimAS\User;

class Alert {

  public function alert(string $cheat, string $player): void {
       $config = Main::getInstance()->getConfig();
       $user = new User;
        foreach(Server::getInstance()->getOnlinePlayers() as $staff) {
            if($staff->hasPermission("ScrimAS.alerts")) {
                $user->getUser($staff, $player, $cheat);
                
            }
            
        }
      
  }
}
