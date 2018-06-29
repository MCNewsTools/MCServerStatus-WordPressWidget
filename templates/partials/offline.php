<?php
$randomPlayerList = rand(0, 10000);
$randomPlugins = rand(0, 10000);
echo $args['before_widget'];
echo $args['before_title'] . $instance['title'] . $args['after_title'];
?>
<p>
	<?php if (isset($instance['show_status']) && $instance['show_status'] == 'on') : ?>
		<?php echo esc_html__('Status: ', 'mcserverstatus'); ?><span style="color:red;font-weight:bold"><?php echo esc_html__('Offline', 'mcserverstatus'); ?></span>
	<?php endif; ?>

	<?php if (isset($instance['show_host']) && $instance['show_host'] == 'on') : ?>
        <br>
		<?php echo esc_html__('Host: ', 'mcserverstatus'); ?><strong><?php echo '<font color="#008000">' . $instance['host'] . '</font>:<font color="#ff0000">' . $instance['server_port'] . '</font>'; ?></strong>
	<?php endif; ?>

	<?php if (isset($instance['website']) && $instance['website']) : ?>
        <br>
		<a href="<?php echo $instance['website']; ?>" target="_blank"><?php echo esc_html__('Website', 'mcserverstatus'); ?></a>
	<?php endif; ?>

	<?php if (isset($instance['show_donate_info']) && $instance['show_donate_info']) : ?>
        <br><br>
		<font color="red"><?php echo esc_html__('Download this plugin: ', 'mcserverstatus'); ?></font><a href="https://wordpress.org/plugins/server-status-for-minecraft-pc-pe" target="_blank"><?php echo esc_html__('Server Status For Minecraft PC & PE', 'mcserverstatus'); ?></a><br>
		<font color="red"><?php echo esc_html__('Donate this plugin: ', 'mcserverstatus'); ?></font><a href="https://qr.allpay.com.tw/ffSH4" target="_blank"><?php echo esc_html__("O'Pay", "mcserverstatus"); ?></a> | <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=42GN624D7ZLUN" target="_blank"><?php echo esc_html__('PayPal', 'mcserverstatus'); ?></a>
	<?php endif; ?>
</p>

<?php echo $args['after_widget']; ?>
