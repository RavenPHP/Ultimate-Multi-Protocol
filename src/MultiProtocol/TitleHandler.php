<?php

declare(strict_types=1);

namespace MultiProtocol;

use pocketmine\player\Player;

class TitleHandler {

    public static function sendJoinTitle(Player $player, array $config): void {
        $message = $config['message'] ?? "Welcome!";
        $player->sendTitle($message, "Protocol: " . $player->getNetworkSession()->getProtocolId(), 10, 60, 10);
    }
}