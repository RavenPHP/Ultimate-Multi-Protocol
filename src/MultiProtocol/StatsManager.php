<?php

declare(strict_types=1);

namespace MultiProtocol;

use pocketmine\player\Player;

class StatsManager {

    private Main $plugin;
    private array $stats = [];

    public function __construct(Main $plugin){
        $this->plugin = $plugin;
        if($this->plugin->getConfig()->getNested("stats.type") === "yaml"){
            $this->stats = $this->plugin->getConfig()->get("stats_data", []);
        } else {
            // MySQL connection placeholder
        }
    }

    public function incrementJoin(Player $player): void{
        $name = $player->getName();
        $this->stats[$name]['joins'] = ($this->stats[$name]['joins'] ?? 0) + 1;
        // Save back to YAML if needed
    }

    public function sendDiscordJoin(Player $player): void{
        $webhook = $this->plugin->getConfig()->getNested("discord.webhook");
        if(empty($webhook)) return;
        $msg = json_encode(["content"=>"Player {$player->getName()} joined the server!"]);
        @file_get_contents($webhook, false, stream_context_create([
            'http'=>[
                'method'=>"POST",
                'header'=>"Content-type: application/json\r\n",
                'content'=>$msg
            ]
        ]));
    }
}