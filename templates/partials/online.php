<?php
$randomPlayerList = rand(0, 10000);
$randomPlugins = rand(0, 10000);
echo $args['before_widget'];
echo $args['before_title'] . $instance['title'] . $args['after_title']; ?>
<p>
	<?php if (isset($instance['show_server_motd']) && $instance['show_server_motd'] == 'on') : ?>
		<?php
        $cleanHostName = str_replace(array("§k", "§l", "§m", "§n", "§o", "§r", "§1", "§2", "§3", "§4", "§5", "§6", "§7", "§8", "§9", "§a", "§b", "§c", "§d", "§e", "§f"), "", $server['server']['server_motd']);
		?>
        <?php echo esc_html__('Server MOTD: ', 'mcserverstatus'); ?><strong><span style="color:green;font-weight:bold"><refresh class="motd"><?php echo $cleanHostName; ?></refresh></span></strong>
    <?php endif; ?>

	<?php if (isset($instance['show_status']) && $instance['show_status'] == 'on') : ?>
        <br>
		<?php echo esc_html__('Status: ', 'mcserverstatus'); ?><strong><span style="color:green;font-weight:bold"><?php echo esc_html__('Online', 'mcserverstatus'); ?></span></strong>
	<?php endif; ?>

    <?php if (isset($instance['show_host']) && $instance['show_host'] == 'on') : ?>
        <br>
        <?php echo esc_html__('Host: ', 'mcserverstatus'); ?><strong><font color="#008000"><?php echo $server['server']['host']; ?></font><?php if (isset($instance['show_port']) && $instance['show_port'] == 'on'): ?><?php echo ':<font color="#ff0000">' . $server['server']['port'] . '</font>'; ?><?php endif; ?></strong>
    <?php endif; ?>

	<?php if (isset($instance['show_server_platform']) && $instance['show_server_platform']) : ?>
        <br>
        <?php if ($server['server']['server_platform'] != "ping") : ?>
            <?php echo esc_html__('Server platform: ', 'mcserverstatus'); ?><strong><font color="#008000"><?php echo $server['server']['server_platform']; ?></font></strong>
        <?php else : ?>
            <?php echo esc_html__('Server platform: ', 'mcserverstatus'); ?><strong><font color="#ff0000"><?php echo esc_html__('Ping request cannot get data.', 'mcserverstatus'); ?></font></strong>
        <?php endif; ?>
    <?php endif; ?>

    <?php if (isset($instance['show_server_software']) && $instance['show_server_software']) : ?>
        <br>
        <?php echo esc_html__('Server software: ', 'mcserverstatus'); ?><strong><font color="#008000"><?php echo $server['server']['version']['software']; ?></font></strong>
    <?php endif; ?>

	<?php if (isset($instance['show_game_version']) && $instance['show_game_version']) : ?>
        <br>
        <?php echo esc_html__('Game version: ', 'mcserverstatus'); ?><strong><font color="#008000"><?php echo $server['server']['version']['version']; ?></font></strong>
    <?php endif; ?>

    <?php if (isset($instance['website']) && $instance['website']) : ?>
        <br>
        <a href="<?php echo $instance['website']; ?>" target="_blank"><?php echo esc_html__('Website', 'mcserverstatus'); ?></a>
    <?php endif; ?>

    <?php if (isset($instance['dynmap']) && $instance['dynmap']) : ?>
        <br>
        <a href="<?php echo $instance['dynmap']; ?>" target="_blank"><?php echo esc_html__('DynMap', 'mcserverstatus'); ?></a>
    <?php endif; ?>

    <?php if (isset($instance['show_plugins']) && $instance['show_plugins']) : ?>
        <br>
        <?php if (count($server['plugins']) > 0 || $server['plugins'] == "ping") : ?>
            <?php echo esc_html__('Plugins: ', 'mcserverstatus'); ?><strong><?php echo count($server['plugins']); ?></strong> (<a href="javascript:toggleMcsList(<?php echo $randomPlugins; ?>);"><?php echo esc_html__('Plugins list', 'mcserverstatus'); ?></a>)
        <?php else : ?>
            <?php echo esc_html__('Plugins: ', 'mcserverstatus'); ?><strong><?php echo esc_html__('Not found.', 'mcserverstatus'); ?></strong>
        <?php endif; ?>
    <?php endif; ?>

    <?php if (count($server['plugins']) > 0 && $server['plugins'] != "ping" && isset($instance['show_plugins']) && $instance['show_plugins']) : ?>
        <span id="mcs_list_<?php echo $randomPlugins; ?>" style="display:none">
            <?php foreach ($server['plugins'] as $plugin) : ?>
                <span>　- <?php echo $plugin['name']; ?></span><br>
            <?php endforeach; ?>
        </span>
    <?php elseif ($server['plugins'] == "ping" && isset($instance['show_plugins']) && $instance['show_plugins']) : ?>
        <span id="mcs_list_<?php echo $randomPlugins; ?>" style="display:none">
            <span>　- <font color="#ff0000"><?php echo esc_html__('Ping request cannot get data.', 'mcserverstatus'); ?></font></span>
        </span>
    <?php endif; ?>

    <?php if (isset($instance['show_players']) && $instance['show_players']) : ?>
        <br>
        <?php if (count($server['players']) > 0 || $server['players'] == "ping") : ?>
            <?php echo esc_html__('Players: ', 'mcserverstatus'); ?><strong><refresh class="players"><font color="#008000"><?php echo $server['server']['players_online']; ?></font>/<font color="#ff0000"><?php echo $server['server']['players_max']; ?></font></refresh></strong> (<a href="javascript:toggleMcsList(<?php echo $randomPlayerList; ?>);"><?php echo esc_html__('Players list', 'mcserverstatus'); ?></a>)
        <?php else : ?>
            <?php echo esc_html__('Players: ', 'mcserverstatus'); ?><strong><refresh class="players2"><font color="#008000"><?php echo $server['server']['players_online']; ?></font>/<font color="#ff0000"><?php echo $server['server']['players_max']; ?></font></refresh></strong>
        <?php endif; ?>
    <?php endif; ?>

    <?php if (count($server['players']) > 0 && $server['players'] != "ping" && isset($instance['show_players']) && $instance['show_players']) : ?>
        <span id="mcs_list_<?php echo $randomPlayerList; ?>" style="margin-top:5px;<?php echo (isset($instance['show_auto_players']) && $instance['show_auto_players'] == 'on') ? 'display:block' : 'display:none'; ?> ">
            <refresh class="playerslist">
                <?php foreach ($server['players'] as $player) : ?>
                    <?php if (isset($instance['show_players_avatar']) && $instance['show_players_avatar']) : ?>
                        <?php if ($server['server']['server_platform'] == 'Minecraft: Java Edition') : ?>
                            <?php echo '　<img src="https://cravatar.eu/helmhead/' . $player['name'] . '/' . $instance['avatar_size'] . '.png"> ' . $player['name']; ?>
                        <?php else : ?>
                            <?php echo '　<img src="https://cravatar.eu/helmhead/steve/' . $instance['avatar_size'] . '.png"> ' . $player['name']; ?>
                        <?php endif; ?>
                    <?php else : ?>
                        <?php echo '<span>　- ' . $player['name'] . '</span><br>'; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </refresh>
        </span>
    <?php elseif ($server['players'] == "ping" && isset($instance['show_players']) && $instance['show_players']) : ?>
        <span id="mcs_list_<?php echo $randomPlayerList; ?>" style="margin-top:5px;<?php echo (isset($instance['show_auto_players']) && $instance['show_auto_players'] == 'on') ? 'display:block' : 'display:none'; ?> ">
            <span>　- <font color="#ff0000"><?php echo esc_html__('Ping request cannot get data.', 'mcserverstatus'); ?></font></span>
        </span>
    <?php endif; ?>

	<?php if (isset($instance['show_donate_info']) && $instance['show_donate_info']) : ?>
        <br><br>
		<font color="red"><?php echo esc_html__('Download this plugin: ', 'mcserverstatus'); ?></font><a href="https://wordpress.org/plugins/server-status-for-minecraft-pc-pe" target="_blank"><?php echo esc_html__('Server Status For Minecraft PC & PE', 'mcserverstatus'); ?></a><br>
		<font color="red"><?php echo esc_html__('Donate this plugin: ', 'mcserverstatus'); ?></font><a href="https://qr.allpay.com.tw/ffSH4" target="_blank"><?php echo esc_html__("O'Pay", 'mcserverstatus'); ?></a> | <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=42GN624D7ZLUN" target="_blank"><?php echo esc_html__('PayPal', 'mcserverstatus'); ?></a><br>
	<?php endif; ?>
</p>

<?php echo $args['after_widget']; ?>

<script type="text/javascript">
    function toggleMcsList(random) {
        if (document.getElementById('mcs_list_' + random).style.display == 'none') {
            document.getElementById('mcs_list_' + random).style.display = 'block';
        } else {
            document.getElementById('mcs_list_' + random).style.display = 'none';
        }
    }
</script>

<?php if (isset($instance['auto_update_status']) && $instance['auto_update_status']) : ?>
    <script type="text/javascript">
        $(function(){
            setInterval(function () {
                $(".players").load(location.href + " .players");
                $(".playerslist").load(location.href + " .playerslist");
                $(".motd").load(location.href + " .motd");
                $(".players2").load(location.href + " .players2");
            }, <?php if ($instance['set_seconds'] < '5') {echo '5000';} else {echo $instance['set_seconds'] . '000';} ?>);
        })
    </script>
<?php endif; ?>
