<?php
/*
 * Plugin Name: Server Status For Minecraft PC & PE (MCServerStatus)
 * Plugin URI: https://github.com/MCServerStatus/MCServerStatus-WordPressWidget
 * Description: Server Status For Minecraft PC & PE is a WordPress Widget, show Minecraft Java and Bedrock editions server data.
 * Version: 1.3.2
 * Author: 張文相 Zhang Wenxiang
 * Author URI: https://www.facebook.com/GoneToneDY/
 * Author email: p29022716@gmail.com
 * License: GPL 3
 * Donate URI: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=42GN624D7ZLUN
 * Text Domain: server-status-for-minecraft-pc-pe
 * Domain Path: /languages
 */
require dirname(__FILE__) . '/libs/Widgetize.php';
require dirname(__FILE__) . '/libs/ApiClient.php';

class MCServerStatus_Widget extends Widgetize {
    /**
     * Construct
     */
    public function __construct() {
        add_action('plugins_loaded', 'mcserverstatus_load_textdomain');

        parent::__construct('MCServerStatus', array(
            'title' => esc_html__('Minecraft Server Status', 'server-status-for-minecraft-pc-pe'),
            'host' => '127.0.0.1',
            'server_port' => '25565',
            'query_port' => '25565',
			'show_players_avatar' => 'on',
			'avatar_size' => '20',
			'show_server_motd' => 'on',
            'show_status' => 'on',
            'show_host' => 'on',
            'show_port' => 'on',
			'show_server_platform' => 'on',
			'show_server_software' => 'on',
			'show_game_version' => 'on',
            'show_players' => 'on',
            'show_auto_players' => '',
            'show_plugins' => '',
            'minotar_size' => '25',
			'auto_update_status' => '',
			'set_seconds' => '15',
			'show_donate_info' => ''
        ));
    }

    /*
     * Load plugin textdomain.
     */
    public function mcserverstatus_load_textdomain() {
        load_plugin_textdomain('server-status-for-minecraft-pc-pe', false, basename(dirname(__FILE__)) . '/languages');
    }

    /**
     * @param array $args
     * @param array $instance
     */
    public function widget(array $args, array $instance) {
        $instance = $this->hydrate($instance);

        // Get ip if localhost
        if (in_array($instance['host'], array('127.0.0.1', 'localhost'))) {
            $instance['host'] = $_SERVER['SERVER_ADDR'];
        }

        $client = new GoneTone\ApiClient($instance['host'], $instance['server_port'], $instance['query_port']);
        $queryServer = $client->queryCall();
        $pingServer = $client->pingCall();

        require dirname(__FILE__) . '/templates/widget.php';
    }

    /**
     * @param array $instance
     * @return string|void
     */
    public function form(array $instance) {
        $instance = $this->hydrate($instance);
        require dirname(__FILE__) . '/templates/form.php';
    }

    /**
     * @param $newInstance
     * @param $oldInstance
     * @return array
     */
    public function update($newInstance, $oldInstance) {
        $instance = array();
        foreach ($newInstance as $option => $value) {

            if((int) $value > 0 && !in_array($option, array('host'))) {
                $value = (int) $value;
            }
            $instance[$option] = strip_tags(trim($value));
        }
        return $instance;
    }
}

Widgetize::add('MCServerStatus_Widget');
?>
