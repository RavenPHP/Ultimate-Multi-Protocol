<?php

declare(strict_types=1);

namespace MultiProtocol;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Main extends PluginBase implements Listener {

    public ProtocolManager $protocolManager;
    public StatsManager $statsManager;

    public function onEnable(): void {
        $this->saveDefaultConfig();
        $this->protocolManager = new ProtocolManager($this);
        $this->statsManager = new StatsManager($this);
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("MultiProtocol Legendary Network Enabled!");
    }

    public function onLogin(PlayerLoginEvent $event): void {
        $this->protocolManager->handleLogin($event);
    }

    public function onJoin(PlayerJoinEvent $event): void {
        $player = $event->getPlayer();
        $config = $this->getConfig()->get("visual");

        if($config['title']['enabled'] ?? false){
            TitleHandler::sendJoinTitle($player, $config['title']);
        }

        if($config['bossbar']['enabled'] ?? false){
            BossBarHandler::sendBossBar($player, $config['bossbar']);
        }

        if($config['actionbar'] ?? false){
            $player->sendActionBarMessage("Protocol: " . $player->getNetworkSession()->getProtocolId());
        }

        if($this->getConfig()->getNested("gui.enabled")){
            GUIHandler::openMainMenu($player, $this->getConfig()->getNested("gui"));
        }

        if($this->getConfig()->getNested("stats.enabled")){
            $this->statsManager->incrementJoin($player);
        }

        if($this->getConfig()->getNested("discord.enabled")){
            $this->statsManager->sendDiscordJoin($player);
        }
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if($command->getName() === "protocol"){
            $perm = $this->getConfig()->getNested("permissions.command", "multiprotocol.perm");
            if(!$sender->hasPermission($perm)){
                $sender->sendMessage("§cYou do not have permission.");
                return true;
            }
            CommandHandler::handle($this, $sender, $args);
            return true;
        }
        return false;
    }
}