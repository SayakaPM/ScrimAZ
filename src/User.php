<?php

namespace OnlyJaiden\ScrimAS;

use OnlyJaiden\ScrimAS\Main;
use pocketmine\utils\Config;
use pocketmine\player\Player;
use pocketmine\entity\effect\VanillaEffects;
use pocketmine\entity\effect\EffectInstance;


class User{
    public $User = [];
    
    public function checkAlert(Player $player) : void {
        $config = new Config('plugin_data/ScrimAS/'."user.yml", Config::YAML);
        $new = Main::getInstance()->getConfig();
        if($config->get($player->getName()) == true) {
            $config->set($player->getName(), false);
            $player->SendMessage($new->get("AntiCheat.prefix")." Your alerts are now ENABLED!");
        } elseif($config->get($player->getName()) == false) {
            $config->set($player->getName(), true);
            $player->SendMessage($new->get("AntiCheat.prefix")." Your alerts are now DISABLED!");
        }
        $config->save();
        
    }
    
    public function getUser(Player $staff, string $cheat, Player $player) : void{
        $config = new Config('plugin_data/ScrimAS/'."user.yml", Config::YAML);
        $new = Main::getInstance()->getConfig();
        if($config->get($staff->getName()) == false) {
            $cheater = $player->getName();
            $staff->SendMessage($new->get("AntiCheat.prefix")." $cheater has been using $cheat.");
         }
        }

        public static function getMovementSpeed(Player $player) : float{
            $p = $player->getPlayer();
            $max = $p->isSprinting() ? 0.29 : 0.216;
            $max += self::getEffect($p, VanillaEffects::SPEED()) * 0.2;
    
            return $max;
        }

        public static function getEffect(Player $player, Effect $effect) : float{
           $peffect = $player->getEffects()->get($effect);
           $leveleffect = $peffect->getEffectLevel();
           if($leveleffect) {
            return $leveleffect;
           } 
           return 0;
        }
    
}