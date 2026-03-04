<?php

declare(strict_types=1);

namespace MultiProtocol;

use pocketmine\player\Player;
use pocketmine\inventory\Inventory;
use pocketmine\item\ItemFactory;
use pocketmine\item\VanillaItems;

class GUIHandler {

    public static function openMainMenu(Player $player, array $config): void {
        $inventory = Inventory::create(9);

        foreach($config['items'] as $slot => $data){
            $item = ItemFactory::getInstance()->get(VanillaItems::PAPER());
            $item->setCustomName($data['name']);
            $inventory->setItem($slot, $item);
        }

        $player->addWindow($inventory);
    }
}