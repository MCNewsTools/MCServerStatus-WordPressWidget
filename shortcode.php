<?php



function widrick_minecraft_serverStats_shortcode($atts, $content = null)
{
	$instance = $atts;
	$instance['avatar_size'] = "20";
	$instance['show_server_motd'] = "on";
	$instance['show_status'] = "on";
	$instance['show_host'] = "on";
	$instance['show_port'] = "on";
	$instance['show_server_platform'] = "on";
	$instance['show_server_software'] = "on";
	$instance['show_game_version'] = "on";
	$instance['show_players'] = "on";
	$instance['show_players_avatar'] = "on";
	$instance['set_seconds'] = "15";

	$client = new GoneTone\ApiClient(
		$instance['host'],
		$instance['server_port'],
		$instance['query_port']);

	$queryServer = $client->queryCall();
	$pingServer = $client->pingCall();

	require dirname(__FILE__) . '/templates/widget.php';
}
add_shortcode('widrick_serverStats','widrick_minecraft_serverStats_shortcode');
