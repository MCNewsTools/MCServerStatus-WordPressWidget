<?php
namespace GoneTone;

class ApiClient {
    private $host;
    private $serverPort;
    private $queryPort;

    /**
     * @param $host
     * @param int $serverPort
     * @param int $queryPort
     */
    public function __construct($host, $serverPort = 25565, $queryPort = 25565) {
        // Setup host and port of minecraft server
        $this->host = $host;
        $this->serverPort = $serverPort;
        $this->queryPort = $queryPort;
    }

    /**
     * @return array|mixed|null
     */
    public function queryCall() {
        require_once dirname(__FILE__) . '/minecraft_query/MinecraftQuery.php';
        require_once dirname(__FILE__) . '/minecraft_query/MinecraftQueryException.php';

        $Query = new xPaw\MinecraftQuery();

        try {
            $Query->Connect($this->host, $this->queryPort);
            $info = $Query->GetInfo();
            $players = $Query->GetPlayers();

            if ($info['GameName'] == "MINECRAFT") {
                $server_platform = "Minecraft: Java Edition";
            } else if ($info['GameName'] == "MINECRAFTPE") {
                $server_platform = "Minecraft: Bedrock Edition";
            } else {
                $server_platform = $info['GameName'];
            }

            // Server info
            $data['server'] = array(
				'server_motd' => $info['HostName'],
                'host' => $this->host,
                'port' => $this->serverPort,
				'server_platform' => $server_platform,
                'players_max'    => $info['MaxPlayers'],
                'players_online' => $info['Players'],
                'version' => array(
                    'version' => $info['Version'],
                    'software' => $info['Software']
                )
            );

            // Players
            $players_new = array();
            if (is_array($players)){
                foreach ($players as $player) {
                    $players_new[] = array('name' => $player);
                }
            }
            $data['players'] = $players_new;

            // Plugins
            $plugins_new = array();
            if (is_array($info['Plugins'])){
                foreach ($info['Plugins'] as $plugin) {
                    $plugins_new[] = array('name' => $plugin);
                }
            }
            $data['plugins'] = $plugins_new;

            return $data;
        } catch(xPaw\MinecraftQueryException $e) {
            //echo $e->getMessage();
            return null;
        }
    }

    /**
     * @return array|mixed|null
     */
    public function pingCall() {
        require_once dirname(__FILE__) . '/minecraft_query/MinecraftPing.php';
        require_once dirname(__FILE__) . '/minecraft_query/MinecraftPingException.php';

        $InfoPing = false;
        $QueryPing = null;

        try {
            $QueryPing = new xPaw\MinecraftPing($this->host, $this->serverPort, 1);

            $InfoPing = $QueryPing->Query();

            if ($InfoPing === false) {
                $QueryPing->Close();
                $QueryPing->Connect();

                $InfoPing = $QueryPing->QueryOldPre17();
            }

            $version = explode(" ", $InfoPing['version']['name'], 2);

            // Server info
            $data['server'] = array(
        		'server_motd' => $InfoPing['description']['text'],
                'host' => $this->host,
                'port' => $this->serverPort,
        		'server_platform' => "ping",
                'players_max'    => $InfoPing['players']['max'],
                'players_online' => $InfoPing['players']['online'],
                'version' => array(
                    'version' => $version[1],
                    'software' => $version[0]
                )
            );

            // Players
            $data['players'] = "ping";

            // Plugins
            $data['plugins'] = "ping";

            return $data;
        } catch(xPaw\MinecraftPingException $e) {
            //echo $e->getMessage();
            return null;
        }

        if ($QueryPing !== null) {
            $QueryPing->Close();
        }
    }
}
?>
