<?php

declare(strict_types=1);

namespace MultiProtocol;

use pocketmine\player\Player;

class BossBarHandler {

    public static function sendBossBar(Player $player, array $config): void {
        $message = $config['message'] ?? "Playing on MultiProtocol Server";
        $player->sendActionBarMessage($message);
    }
}