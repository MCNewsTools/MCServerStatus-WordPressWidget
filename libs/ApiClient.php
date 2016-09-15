<?php

class ApiClient
{
    private $host;
    private $port;

    /**
     * @param $host
     * @param int $port
     */
    public function __construct($host, $port = 25565)
    {
        // Setup host and port of minecraft server
        $this->host = $host;
        $this->port = $port;
    }


    /**
     * @return array|mixed|null
     */
    public function call()
    {
        $Query = new MinecraftQuery( );

        try
        {
            $Query->Connect( $this->host, $this->port );
            $info    = $Query->GetInfo();
            $players = $Query->GetPlayers();

            // Server info
            $data['server'] = array(
				'server_motd' => $info['HostName'],
                'host' => $this->host,
                'port' => $this->port,
				'server_platform' => $info['GameName'],
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
        }
        catch( MinecraftQueryException $e )
        {
            //echo $e->getMessage( );
            return null;
        }
    }

}
