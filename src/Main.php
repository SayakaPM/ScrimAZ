<?php

declare(strict_types=1);

namespace OnlyJaiden\ScrimAS;

use OnlyJaiden\ScrimAS\Checks\Movement\Speed;
use OnlyJaiden\ScrimAS\Checks\Movement\Fly;
use OnlyJaiden\ScrimAS\User;
use pocketmine\utils\SingletonTrait;
use pocketmine\player\Player;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Main extends PluginBase{
    use SingletonTrait;
    
    public function onLoad(): void {
        self::setInstance($this);
        $config = Main::getInstance()->getConfig();
        $this->saveDefaultConfig();
        $githubv = curl_init();
        curl_setopt($githubv, CURLOPT_URL, 'https://raw.githubusercontent.com/SayakaPM/PM-AntiCheat/main/README.md');
        curl_setopt($githubv, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($githubv, CURLOPT_RETURNTRANSFER, 1);
        $version = curl_exec($githubv);
        curl_close($githubv);
        if(0.6.0 !==  $version) {
            $this->getLogger()->info("ScrimAS is outdated. https://poggit.pmmp.io/p/ScrimAS/");
        }
    }
    
    public function onEnable(): void {
        // Movement checks
        $this->registerEvents(new Speed());
        $this->registerEvents(new Fly());
    }
    
    private function registerEvents(Listener $listener): void {
        $this->getServer()->getPluginManager()->registerEvents($listener, $this);
    }
    
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
    switch($command->getName()){
        case "alerts":
            if($sender->hasPermission("ScrimAS.alerts")){
                $config = Main::getInstance()->getConfig();
                $user = new User;
                $user->checkAlert($sender);
            } else {
                $sender->sendMessage("You don't have permission to run this command!");
            }
            return true;
    }
      return true;
}

}
