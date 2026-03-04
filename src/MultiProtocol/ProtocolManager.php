<?php

declare(strict_types=1);

namespace MultiProtocol;

use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\network\mcpe\protocol\ProtocolInfo;

class ProtocolManager {

    private Main $plugin;

    public function __construct(Main $plugin){
        $this->plugin = $plugin;
    }

    /**
     * Handle player login and enforce protocol rules
     */
    public function handleLogin(PlayerLoginEvent $event): void {
        $config = $this->plugin->getConfig();
        $player = $event->getPlayer();
        $protocol = $player->getNetworkSession()->getProtocolId();

        $mode = $config->get("mode", "auto");

        switch($mode){
            case "auto":
                // Accept only current server protocol
                if($protocol !== ProtocolInfo::CURRENT_PROTOCOL){
                    $event->setKickMessage($config->get("kick-message"));
                    $event->cancel();
                }
                break;

            case "manual":
                $allowed = $config->get("allowed-protocols", []);
                if(!in_array($protocol, $allowed)){
                    $event->setKickMessage($config->get("kick-message"));
                    $event->cancel();
                }
                break;

            case "range":
                $min = $config->getNested("range.min", 0);
                $max = $config->getNested("range.max", 9999);
                if($protocol < $min || $protocol > $max){
                    $event->setKickMessage($config->get("kick-message"));
                    $event->cancel();
                }
                break;

            case "strict":
                if($protocol !== ProtocolInfo::CURRENT_PROTOCOL){
                    $event->setKickMessage($config->get("kick-message"));
                    $event->cancel();
                }
                break;

            default:
                // fallback to auto if mode is invalid
                if($protocol !== ProtocolInfo::CURRENT_PROTOCOL){
                    $event->setKickMessage($config->get("kick-message"));
                    $event->cancel();
                }
                break;
        }
    }
}