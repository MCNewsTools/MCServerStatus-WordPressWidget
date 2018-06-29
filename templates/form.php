<table width="100%">
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
	<tr>
        <td colspan="2"><strong><?php echo esc_html__('Precautions', 'mcserverstatus'); ?></strong></td>
    </tr>
    <tr>
        <td colspan="2"><hr class="minestatus"></td>
    </tr>
	<tr>
		<td>
			<?php echo esc_html__('This method use GameSpy4 protocol, and requires enabling query listener in your server.properties like this:', 'mcserverstatus'); ?><br>
			- <font color="#ff0000">enable-query=true</font><br>
			- <font color="#ff0000">query.port=25565</font><br><br>
            <?php echo sprintf(esc_html__("Enabled query listener, can't get server data, it may be that your website hosting provider doesn't allow requests, you can try setting query port to 25565 (%s) in %s file and then testing it.", "mcserverstatus"), '<font color="#ff0000">query.port=25565</font>', '<font color="#ff0000">server.properties</font>'); ?><br><br>
            <?php echo esc_html__("If you still can't, please contact your website hosting provider.", "mcserverstatus"); ?>
		</td>
	</tr>
    <tr>
        <td colspan="2"><hr class="minestatus"></td>
    </tr>
    <tr>
		<td>
            <?php echo esc_html__("If query listener cannot be used, it automatically switches to ping.", "mcserverstatus"); ?>
		</td>
	</tr>
	<tr>
        <td colspan="2"><hr class="minestatus"></td>
    </tr>
	<tr>
        <td colspan="2">&nbsp;</td>
    </tr>
</table>

<table width="100%">
    <tr>
        <td colspan="2"><strong><?php echo esc_html__('General options', 'mcserverstatus'); ?></strong></td>
    </tr>
    <tr>
        <td colspan="2"><hr class="minestatus"></td>
    </tr>
    <tr>
        <td width="20%"><?php echo esc_html__('Title', 'mcserverstatus'); ?></td>
        <td>
            <input class="widefat" id="minestatus_title" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>">
        </td>
    </tr>
    <tr>
        <td width="20%"><?php echo esc_html__('Host', 'mcserverstatus'); ?></td>
        <td>
            <input class="widefat" id="minestatus_host" name="<?php echo $this->get_field_name('host'); ?>" type="text" value="<?php echo $instance['host']; ?>">
        </td>
    </tr>
    <tr>
        <td width="20%"><?php echo esc_html__('Server Port', 'mcserverstatus'); ?></td>
        <td>
            <input class="widefat" id="minestatus_port" name="<?php echo $this->get_field_name('server_port'); ?>" type="text" value="<?php echo $instance['server_port']; ?>">
        </td>
    </tr>
    <tr>
        <td width="20%"><?php echo esc_html__('Query Port', 'mcserverstatus'); ?></td>
        <td>
            <input class="widefat" id="minestatus_query_port" name="<?php echo $this->get_field_name('query_port'); ?>" type="text" value="<?php echo $instance['query_port']; ?>">
        </td>
    </tr>
	<tr>
        <td width="20%"><?php echo esc_html__('Player Avatar size', 'mcserverstatus'); ?></td>
        <td>
            <input class="widefat" id="minestatus_avatar_size" name="<?php echo $this->get_field_name('avatar_size'); ?>" type="text" value="<?php echo $instance['avatar_size']; ?>">
        </td>
    </tr>
    <tr>
        <td width="20%"><?php echo esc_html__('Web Site', 'mcserverstatus'); ?></td>
        <td>
            <input class="widefat" id="minestatus_website" name="<?php echo $this->get_field_name('website'); ?>" type="text" value="<?php echo $instance['website']; ?>">
        </td>
    </tr>
    <tr>
        <td width="20%"><?php echo esc_html__('DynMap', 'mcserverstatus'); ?></td>
        <td>
            <input class="widefat" id="minestatus_dynmap" name="<?php echo $this->get_field_name('dynmap'); ?>" type="text" value="<?php echo $instance['dynmap']; ?>">
        </td>
    </tr>
    <tr>
        <td colspan="2"><hr class="minestatus"></td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
</table>

<table width="100%">
    <tr>
        <td colspan="2"><strong><?php echo esc_html__('Display options', 'mcserverstatus'); ?></strong></td>
    </tr>
    <tr>
        <td colspan="2"><hr class="minestatus"></td>
    </tr>
	<tr>
        <td><?php echo esc_html__('Show Server MOTD', 'mcserverstatus'); ?></td>
        <td style="text-align:right;">
            <input id="minestatus_show_server_motd" name="<?php echo $this->get_field_name('show_server_motd'); ?>" type="checkbox" value="on" <?php echo ($instance['show_server_motd'] == 'on') ? 'checked="checked"' : ''; ?>>
        </td>
    </tr>
    <tr>
        <td><?php echo esc_html__('Show status', 'mcserverstatus'); ?></td>
        <td style="text-align:right;">
            <input id="minestatus_show_status" name="<?php echo $this->get_field_name('show_status'); ?>" type="checkbox" value="on" <?php echo ($instance['show_status'] == 'on') ? 'checked="checked"' : ''; ?>>
        </td>
    </tr>
    <tr>
        <td><?php echo esc_html__('Show host', 'mcserverstatus'); ?></td>
        <td style="text-align:right;">
            <input id="minestatus_show_host" name="<?php echo $this->get_field_name('show_host'); ?>" type="checkbox" value="on" <?php echo ($instance['show_host'] == 'on') ? 'checked="checked"' : ''; ?>>
        </td>
    </tr>
    <tr>
        <td><?php echo esc_html__('Show port', 'mcserverstatus'); ?></td>
        <td style="text-align:right;">
            <input id="minestatus_show_port" name="<?php echo $this->get_field_name('show_port'); ?>" type="checkbox" value="on" <?php echo ($instance['show_port'] == 'on') ? 'checked="checked"' : ''; ?>>
        </td>
    </tr>
	<tr>
        <td><?php echo esc_html__('Show server platform', 'mcserverstatus'); ?></td>
        <td style="text-align:right;">
            <input id="minestatus_show_server_software" name="<?php echo $this->get_field_name('show_server_platform'); ?>" type="checkbox" value="on" <?php echo ($instance['show_server_platform'] == 'on') ? 'checked="checked"' : ''; ?>>
        </td>
    </tr>
	<tr>
        <td><?php echo esc_html__('Show server software', 'mcserverstatus'); ?></td>
        <td style="text-align:right;">
            <input id="minestatus_show_server_software" name="<?php echo $this->get_field_name('show_server_software'); ?>" type="checkbox" value="on" <?php echo ($instance['show_server_software'] == 'on') ? 'checked="checked"' : ''; ?>>
        </td>
    </tr>
    <tr>
        <td><?php echo esc_html__('Show game version', 'mcserverstatus'); ?></td>
        <td style="text-align:right;">
            <input id="minestatus_show_game_version" name="<?php echo $this->get_field_name('show_game_version'); ?>" type="checkbox" value="on" <?php echo ($instance['show_game_version'] == 'on') ? 'checked="checked"' : ''; ?>>
        </td>
    </tr>
    <tr>
        <td><?php echo esc_html__('Show plugins', 'mcserverstatus'); ?></td>
        <td style="text-align:right;">
            <input id="minestatus_show_plugins" name="<?php echo $this->get_field_name('show_plugins'); ?>" type="checkbox" value="on" <?php echo ($instance['show_plugins'] == 'on') ? 'checked="checked"' : ''; ?>>
        </td>
    </tr>
    <tr>
        <td colspan="2"><hr class="minestatus"></td>
    </tr>
    <tr>
        <td><?php echo esc_html__('Show players', 'mcserverstatus'); ?></td>
        <td style="text-align:right;">
            <input id="minestatus_show_players" name="<?php echo $this->get_field_name('show_players'); ?>" type="checkbox" value="on" <?php echo ($instance['show_players'] == 'on') ? 'checked="checked"' : ''; ?>>
        </td>
    </tr>
	<tr>
        <td><?php echo esc_html__('Show players avatar', 'mcserverstatus'); ?> (<font color="#ff0000"><?php echo esc_html__('MCPE will show Steve avatar', 'mcserverstatus'); ?></font>)</td>
        <td style="text-align:right;">
            <input id="minestatus_show_players" name="<?php echo $this->get_field_name('show_players_avatar'); ?>" type="checkbox" value="on" <?php echo ($instance['show_players_avatar'] == 'on') ? 'checked="checked"' : ''; ?>>
        </td>
    </tr>
    <tr>
        <td><?php echo esc_html__('Show player list automatically', 'mcserverstatus'); ?></td>
        <td style="text-align:right;">
            <input id="minestatus_show_auto_players" name="<?php echo $this->get_field_name('show_auto_players'); ?>" type="checkbox" value="on" <?php echo ($instance['show_auto_players'] == 'on') ? 'checked="checked"' : ''; ?>>
        </td>
    </tr>
    <tr>
        <td colspan="2"><hr class="minestatus"></td>
    </tr>
</table>

<table width="100%">
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
	<tr>
        <td colspan="2"><strong><?php echo esc_html__('Advanced options', 'mcserverstatus'); ?></strong></td>
    </tr>
    <tr>
        <td colspan="2"><hr class="minestatus"></td>
    </tr>
	<tr>
        <td><?php echo esc_html__('Auto update status', 'mcserverstatus'); ?> (<font color="#ff0000">Beta</font>)</td>
        <td style="text-align:right;">
            <input id="minestatus_auto_update_status" name="<?php echo $this->get_field_name('auto_update_status'); ?>" type="checkbox" value="on" <?php echo ($instance['auto_update_status'] == 'on') ? 'checked="checked"' : ''; ?>>
        </td>
    </tr>
	<tr>
        <td width="80%"><?php echo esc_html__('Set seconds', 'mcserverstatus'); ?> (<font color="#ff0000"><?php echo esc_html__('The minimum can be set to 5 second', 'mcserverstatus'); ?></font>)</td>
        <td>
            <input class="widefat" id="minestatus_set_seconds" name="<?php echo $this->get_field_name('set_seconds'); ?>" type="text" value="<?php echo $instance['set_seconds']; ?>">
        </td>
    </tr>
	<tr>
        <td colspan="2"><hr class="minestatus"></td>
    </tr>
</table>

<table width="100%">
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
	<tr>
        <td colspan="2"><strong><?php echo esc_html__('About', 'mcserverstatus'); ?></strong></td>
    </tr>
    <tr>
        <td colspan="2"><hr class="minestatus"></td>
    </tr>
	<tr>
		<td>
            <?php echo esc_html__('Developer Website: ', 'mcserverstatus'); ?><a href="https://blog.reh.tw/" target="_blank">https://blog.reh.tw/</a><br>
			<?php echo esc_html__('Developer Facebook: ', 'mcserverstatus'); ?><a href="https://www.facebook.com/TPGoneTone/" target="_blank">https://www.facebook.com/TPGoneTone/</a><br>
			<?php echo esc_html__('Developer Twitter: ', 'mcserverstatus'); ?><a href="https://twitter.com/TPGoneTone/" target="_blank">https://twitter.com/TPGoneTone/</a><br>
			<?php echo esc_html__('Developer GitHub: ', 'mcserverstatus'); ?><a href="https://github.com/GoneTone/" target="_blank">https://github.com/GoneTone/</a><br><br>
			<?php echo esc_html__('Plugin GitHub: ', 'mcserverstatus'); ?><a href="https://github.com/MCNewsTools/MCServerStatus-WordPressWidget" target="_blank">https://github.com/MCNewsTools/MCServerStatus-WordPressWidget</a>
		</td>
	</tr>
	<tr>
        <td colspan="2"><hr class="minestatus"></td>
    </tr>
	<tr>
	       <td><strong><?php echo esc_html__('Donate:', 'mcserverstatus'); ?></strong></td>
	</tr>
	<tr>
	       <td><font color="#ff0000"><?php echo esc_html__('Your Donate is our motivation!', 'mcserverstatus'); ?></font></td>
	</tr>
	<tr>
		<td>
			<a href="https://qr.allpay.com.tw/ffSH4" target="_blank"><img src="https://payment.allpay.com.tw/Content/themes/WebStyle201404/images/allpay.png" /></a>
			<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=42GN624D7ZLUN" target="_blank"><img src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" /></a>
		</td>
	</tr>
	<tr>
        <td><font color="#0000FF"><?php echo esc_html__('Show donate info', 'mcserverstatus'); ?></font> (<font color="#ff0000"><?php echo esc_html__('This option does not force checked, check it and we will be grateful that you', 'mcserverstatus'); ?></font>)</td>
        <td style="text-align:right;">
            <input id="minestatus_show_donate_info" name="<?php echo $this->get_field_name('show_donate_info'); ?>" type="checkbox" value="on" <?php echo ($instance['show_donate_info'] == 'on') ? 'checked="checked"' : ''; ?>>
        </td>
    </tr>
	<tr>
        <td colspan="2"><hr class="minestatus"></td>
    </tr>
	<tr>
        <td colspan="2">&nbsp;</td>
    </tr>
</table>

<style>
    hr.minestatus {
        border:0;
        color:#D7D7D7;
        background:#D7D7D7;
        height:1px;
    }
</style>
