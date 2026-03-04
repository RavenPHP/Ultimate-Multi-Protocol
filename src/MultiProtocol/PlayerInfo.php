<?php

declare(strict_types=1);

namespace MultiProtocol;

use pocketmine\player\Player;

class PlayerInfo {

    public static function getInfo(Player $player): array {
        return [
            'name' => $player->getName(),
            'protocol' => $player->getNetworkSession()->getProtocolId(),
            'ip' => $player->getNetworkSession()->getIp(),
            'os' => $player->getNetworkSession()->getPlayerDevice(),
        ];
    }
}