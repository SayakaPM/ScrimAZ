<?php

declare(strict_types=1);

namespace OnlyJaiden\ScrimAS;

use OnlyJaiden\ScrimAS\libs\CortexPE\DiscordWebhookAPI\Embed;
use OnlyJaiden\ScrimAS\libs\CortexPE\DiscordWebhookAPI\Message;
use OnlyJaiden\ScrimAS\libs\CortexPE\DiscordWebhookAPI\Webhook;
use OnlyJaiden\ScrimAS\User;
use OnlyJaiden\ScrimAS\Main;
use pocketmine\Server;
use pocketmine\player\Player;

class Alert {
  public function alert(string $cheat, string $player): void {
    $config = Main::getInstance()->getConfig();
    $user = new User;
    foreach(Server::getInstance()->getOnlinePlayers() as $staff) {
      if($staff->hasPermission("ScrimAS.alerts")) {
        if($user->getUser($staff) == "false") {
          $this->DiscordAlerts($cheat, $player);
        }
      }     
    }  
  }
  private function DiscordAlerts(string $cheat, string $player): void {
    $config = Main::getInstance()->getConfig();
    if(!$config->get("webhook.enable")) {
        return;
    }

    $embed = new Embed();
    $embed->setColor(1252377); 
    $embed->setTitle("AntiCheat Alerts");
    $embed->addField("Player", $player);
    $embed->addField("Detection", $cheat);

    $message = new Message();
    $message->addEmbed($embed);

    $webhook = new Webhook($config->get("webhook.url"));
    $webhook->send($message);
  }
}
