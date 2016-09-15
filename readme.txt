=== Minecraft PC & PE Server Status (MCServerStatus) ===
Contributors: GoneTone
Donate link: https://qr.allpay.com.tw/ffSH4
Tags: MCServerStatus, Status, Minecraft, Minecraft PE, Minecraft PC, Minecraft Server Status, Minecraft PC & PE Server Status, Minecraft Server, MinecraftQuery, Query
Requires at least: 3.5
Tested up to: 4.6.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Minecraft PC & PE Server Status is a WordPress Widget, show Minecraft PC & PE server data.

== Description ==
Minecraft PC & PE Server Status is a WordPress Widget, show Minecraft PC & PE server data.

You can display / hide these information:

 * Server name (MOTD)
 * Status (online/offline)
 * IP address / hostname
 * Port
 * Server platform
 * Server software
 * Game version
 * Website
 * DynMap
 * Plugins count
 * Plugins list
 * Player count (current / maximum)
 * Player list
 * Player skin avatar
 
and more features are planned.

Other functions:

 * Display web site link
 * DynMap
 * Set player avatar size
 * Auto update status

== Installation ==
1. Upload all files to the `/wp-content/plugins/` directory
2. Activate the plugin through the \'Plugins\' menu in WordPress

== Screenshots ==
1. Runtime Photos
2. Setting Options 1
3. Setting Options 2


== Frequently Asked Questions ==
= Why can not I get server data? =
This method uses GameSpy4 protocol, and requires enabling query listener in your server.properties like this:

- enable-query=true

- query.port=25565

== Changelog ==
= 1.0.0 =
* First release