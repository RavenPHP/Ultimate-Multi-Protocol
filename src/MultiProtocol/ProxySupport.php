<?php

declare(strict_types=1);

namespace MultiProtocol;

use pocketmine\player\Player;

class ProxySupport {

    private Main $plugin;

    public function __construct(Main $plugin){
        $this->plugin = $plugin;
    }

    public function isProxyPlayer(Player $player): bool {
        return $player->getNetworkSession()->getIp() !== $player->getAddress();
    }
}