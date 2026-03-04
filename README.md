Ultimate multi-protocol management system for Minecraft servers.  
Supports all Minecraft versions on *API 5.0.0*, with GUI, BossBar, Proxy support, Stats tracking, and Discord integration.  

---

## 🌟 Features

- *MultiProtocol Support*  
  Supports Auto, Manual, Range, and Strict protocol modes.  
  Kick message configurable for unsupported versions.

- *GUI Control Panel*  
  Main Menu GUI for protocol management.  
  Interactive items allow changing modes in-game.

- *BossBar / Title / ActionBar*  
  Join Title messages configurable (true/false).  
  BossBar messages configurable (true/false).  
  ActionBar shows current player protocol.  
  Fully configurable in config.yml.

- *Proxy Support*  
  Full support for Waterdog and WaterdogPE.  
  Detects players connecting via proxies.

- *Stats Manager*  
  Tracks player statistics (joins).  
  Supports YAML and MySQL storage.  
  Database ready for advanced stats tracking.

- *Discord Logging*  
  Sends messages to Discord when players join.  
  Webhook URL configurable in config.yml.

- *Command System*  
  /protocol command for managing server protocols.  
  Command permission configurable: multiprotocol.perm.

- *Security Features*  
  Anti-fake protocol.  
  Connection limit per IP.

- *Modular & Extensible*  
  Fully modular architecture, ready for future features like Live Leaderboards.

- *Fully English*  
  All messages, commands, and interface are in English.

---

## ⚙️ Installation

1. Download the latest *MultiProtocol.jar* and place it in your plugins folder.  
2. Start the server once to generate default config.yml.  
3. Edit config.yml to configure:
   - Protocol modes (auto, manual, range, strict)
   - BossBar / Title / ActionBar messages  
   - Proxy support options  
   - Stats storage (yaml or mysql)  
   - Discord webhook  
   - Command permissions  

4. Restart or reload your server to apply changes.

---

## 📝 Commands

| Command        | Permission             | Description                               |
|----------------|----------------------|-------------------------------------------|
| /protocol info   | multiprotocol.perm | Show current server protocol              |
| /protocol auto   | multiprotocol.perm | Set mode to Auto                           |
| /protocol manual | multiprotocol.perm | Set mode to Manual                         |
| /protocol strict | multiprotocol.perm | Set mode to Strict                         |
| /protocol range  | multiprotocol.perm | Set mode to Range                           |
| /protocol stats  | multiprotocol.perm | Show player stats (joins)                  |

---

## 💾 Config Options

- mode – Protocol mode (auto, manual, range, strict)  
- kick-message – Message shown to unsupported protocol players  
- visual.title.enabled – Enable/disable join title  
- visual.title.message – Join title message  
- visual.bossbar.enabled – Enable/disable bossbar  
- visual.bossbar.message – Bossbar message  
- visual.actionbar – Enable/disable ActionBar  
- proxy-support.auto-detect – Auto-detect proxy players  
- proxy-support.trust-proxy – Trust proxy IP for real address  
- stats.enabled – Enable stats tracking  
- stats.type – yaml or mysql  
- discord.enabled – Enable Discord webhook  
- discord.webhook – Discord webhook URL  
- permissions.command – Permission required to use /protocol command  

---

## 💻 Requirements

- PocketMine-MP *API 5.0.0*  
- PHP 8.1+  
- Optional: MySQL server for stats  
- Optional: Discord Webhook for logging  

---

## ⚡ Support

If you encounter bugs or have feature requests, open an issue on the repository or contact Discord DevRaven.  

---

## 📜 License

All rights reserved by *DevRaven*. Redistribution or modification without permission is not allowed.
