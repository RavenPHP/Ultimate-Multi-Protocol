<?php

declare(strict_types=1);

namespace MultiProtocol;

use pocketmine\command\CommandSender;

class CommandHandler {

    public static function handle(Main $plugin, CommandSender $sender, array $args): void {

        if(empty($args)){
            $sender->sendMessage("§eUsage: /protocol info | auto | manual | strict | range | stats");
            return;
        }

        switch($args[0]){
            case "info":
                $sender->sendMessage("§aServer Protocol: " . \pocketmine\network\mcpe\protocol\ProtocolInfo::CURRENT_PROTOCOL);
                break;

            case "auto":
            case "manual":
            case "range":
            case "strict":
                $plugin->getConfig()->set("mode", $args[0]);
                $plugin->getConfig()->save();
                $sender->sendMessage("§aMode set to " . strtoupper($args[0]));
                break;

            case "stats":
                $stats = $plugin->statsManager->getAllStats();
                foreach($stats as $player => $data){
                    $sender->sendMessage("§b$player §aJoins: {$data['joins']}");
                }
                break;

            default:
                $sender->sendMessage("§cUnknown command.");
        }
    }
}