<?php
class Widgetize extends WP_Widget {
    /**
     * @var array|null
     */
    private $defaults;

    public function __construct($name, $defaults = null) {
        parent::__construct(
            strtolower($name),
            esc_html__('Minecraft Server Status', 'server-status-for-minecraft-pc-pe'),
            array(
                'description' => esc_html__('Show Minecraft server data, common for Java and Bedrock editions.', 'server-status-for-minecraft-pc-pe')
            )
        );

        $this->defaults = $defaults;
    }

    /**
     * Add widget as action to the wordpress core
     * @param string $class
     */
    public static function add($class) {
        add_action('widgets_init', create_function('', 'return register_widget("' . $class . '");'));
    }

    /**
     * Hydrate instance when necessary , using the defaults
     * @param array $instance
     * @return array|null
     */
    protected function hydrate(array $instance) {
        if (empty($instance)) {
            return $this->defaults;
        }
        return $instance;
    }

    /**
     * Get the default parameters
     * @return array|null
     */
    public function getDefaults() {
        return $this->defaults;
    }
}
