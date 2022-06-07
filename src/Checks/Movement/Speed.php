<?php

namespace OnlyJaiden\ScrimAS\Checks\Movement;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\entity\effect\VanillaEffects;
use pocketmine\Server;
use pocketmine\player\Player;

class Speed implements Listener{
    public function onPlayerMove(PlayerMoveEvent $event): void{
        
        $player = $event->getPlayer();
        $x = $event->getFrom()->getX() - $event->getTo()->getX();
        $y = $event->getFrom()->getY() - $event->getTo()->getY();
        //Checks if player is moving too fast in X Cords
        if(abs($x) >= 1) {
            if(count($player->getEffects()->all()) == 0){
                if($player->getAllowFlight() === true){
                    return;
                }
                $this->alert("Speed", $player->getName());
            } else {
                return;
            }
        }
        //Checks if player is moving too fast in Y Cords
        if(abs($y) >= 1) {
            if(count($player->getEffects()->all()) == 0){
                if($player->getAllowFlight() === true){
                    return;
                }
                $this->alert("Speed", $player->getName());
            } else {
                return;
            }
        }

    }
    private function alert(string $cheat, string $player): void {
        foreach(Server::getInstance()->getOnlinePlayers() as $staff) {
            if($staff->hasPermission("alert.ac")) {
                $staff->SendMessage("[Alerts] $player has been using $cheat");
            }
        }
    }
}