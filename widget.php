<?php

/*
Plugin Name: Server Status For Minecraft PC & PE (MCServerStatus)
Plugin URI: https://github.com/MCServerStatus/MCServerStatus-WordPressWidget
Description: Server Status For Minecraft PC & PE is a WordPress Widget, show Minecraft PC & PE server data.
Version: 1.1.2
Author: 旋風之音 GoneTone
Author URI: https://www.facebook.com/TPGoneTone/
Author email: p29022716@gmail.com
License: GPL 2
Donate URI: https://qr.allpay.com.tw/ffSH4
Text Domain: mcserverstatus
Domain Path: /lang
*/

/*  Copyright 2016 GoneTone (email: p29022716@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// load localization
load_plugin_textdomain('mcserverstatus', false, dirname( plugin_basename( __FILE__ ) ) . '/lang');

require dirname(__FILE__) . '/libs/Widgetize.php';
require dirname(__FILE__) . '/libs/ApiClient.php';
require dirname(__FILE__) . '/libs/MinecraftQuery.php';

class MCServerStatus_Widget extends Widgetize
{
    /**
     * Construct
     */
    public function __construct()
    {
        parent::__construct('MCServerStatus', array(
            'title' => 'MCServerStatus',
            'host' => '127.0.0.1',
            'port' => '25565',
			'show_players_avatar' => 'on',
			'avatar-size' => '20',
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
    

    /**
     * @param array $args
     * @param array $instance
     */
    public function widget(array $args, array $instance)
    {
        $instance = $this->hydrate($instance);

        // Get ip if localhost
        if (in_array($instance['host'], array('127.0.0.1', 'localhost'))) {
            $instance['host'] = $_SERVER['SERVER_ADDR'];
        }

        $client = new ApiClient($instance['host'], $instance['port']);
        $server = $client->call();

        require dirname(__FILE__) . '/templates/widget.phtml';
    }

    /**
     * @param array $instance
     * @return string|void
     */
    public function form(array $instance)
    {
        $instance = $this->hydrate($instance);
        require dirname(__FILE__) . '/templates/form.phtml';
    }

    /**
     * @param $newInstance
     * @param $oldInstance
     * @return array
     */
    public function update($newInstance, $oldInstance)
    {
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

