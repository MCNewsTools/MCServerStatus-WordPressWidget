# Server Status For Minecraft PC & PE (MCServerStatus)
Server Status For Minecraft PC & PE is a WordPress Widget, show Minecraft Java and Bedrock editions server data.

[Download this plugin](https://wordpress.org/plugins/server-status-for-minecraft-pc-pe)

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

### Precautions
* This method use GameSpy4 protocol, and requires enabling query listener in your server.properties like this: `enable-query=true` and `query.port=25565`.
* Enabled query listener, can't get server data, it may be that your website hosting provider doesn't allow requests, you can try setting query port to 25565 (`query.port=25565`) in `server.properties` file and then testing it.
* If you still can't, please contact your website hosting provider.

If query listener cannot be used, it automatically switches to ping.
