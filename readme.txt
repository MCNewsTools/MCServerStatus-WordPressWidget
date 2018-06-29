=== Server Status For Minecraft PC & PE (MCServerStatus) ===
Contributors: GoneTone
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=42GN624D7ZLUN
Tags: MCServerStatus, Status, Minecraft, Minecraft PE, Minecraft PC, Minecraft: Java Edition, Minecraft: Bedrock Edition, MCPE, MCBE, Minecraft Server Status, Minecraft PC & PE Server Status, Minecraft Server, MinecraftQuery, MinecraftPing, Query, Ping
Requires at least: 3.5
Tested up to: 4.9.6
Stable tag: trunk
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Server Status For Minecraft PC & PE is a WordPress Widget, show Minecraft Java and Bedrock editions server data.

== Description ==
Server Status For Minecraft PC & PE is a WordPress Widget, show Minecraft Java and Bedrock editions server data.

GitHub: [https://github.com/MCNewsTools/MCServerStatus-WordPressWidget](https://github.com/MCNewsTools/MCServerStatus-WordPressWidget)

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
 * Auto update status (Beta)

Precautions:

 * This method use GameSpy4 protocol, and requires enabling query listener in your server.properties like this: `enable-query=true` and `query.port=25565`.
 * Enabled query listener, can't get server data, it may be that your website hosting provider doesn't allow requests, you can try setting query port to 25565 (`query.port=25565`) in `server.properties` file and then testing it.
 * If you still can't, please contact your website hosting provider.

If query listener cannot be used, it automatically switches to ping.

== Installation ==
1. Upload all files to the `/wp-content/plugins/` directory
2. Activate the plugin through the `Plugins` menu in WordPress
3. Enabling query listener in your Minecraft server `server.properties` file, add `enable-query=true` and `query.port=25565`

== Screenshots ==
1. Runtime Photos
2. Setting Options 1
3. Setting Options 2

== Frequently Asked Questions ==
= Why can't get server data? =
This method use GameSpy4 protocol, and requires enabling `query` listener in your `server.properties` like this:

> *enable-query=true*<br>
> *query.port=25565*

= I have enabled query listener, can't get server data. =
It may be that your website hosting provider doesn't allow requests, you can try setting query port to 25565 (`query.port=25565`) in `server.properties` file and then testing it.

If you still can't, please contact your website hosting provider.

= Fatal error: Cannot redeclare class xxxxx in xxxxxx on line xx =
Please close plugins with the same function, this plugin use `xPaw/PHP-Minecraft-Query`.

== Changelog ==
= 1.3.0 =
* Solve some problems and add Ping query server.
* Need to reset Widget after updating!

= 1.2.0 =
* Update part of the code.

= 1.1.2 =
* Add German translation, By koyuawsmbrtn.

= 1.1.1 =
* Add Russian Translation, Thanks vvzar.

= 1.1.0 =
* Some fine-tuning

= 1.0.0 =
* First release
