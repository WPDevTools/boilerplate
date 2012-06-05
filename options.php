<?php
/**
 * Theme settings for the REPLACE_ME theme
 *
 * @package REPLACE_ME Theme
 * @author Christopher Frazier (chris@wpdevtools.com), David Sutoyo (david@wpdevtools.com)
 **/

require_once(THEME_DIR . '/lib/wpdt-core/options.php');

class Theme_Options
{

	/**
	 * Register theme settings, with an optional validation callback
	 *
	 **/
	public function admin_init () {
		// Set up theme settings handling through WordPress, with validation.
		//register_setting( THEME_NAME, THEME_OPTIONS, array('Theme_Options', 'validate_options') );
		
		// Set up theme settings handling through WordPress, no validation.
		register_setting( THEME_NAME, THEME_OPTIONS );
		
	}

	/**
	 * Add menu pages for theme settings
	 *
	 **/
	public function create_menu() {
		//create new top-level menu
		add_theme_page(__(THEME_NAME .' Theme Options'), __( 'Theme Options', THEME_NAME ), 'edit_theme_options', THEME_OPTIONS, array('Theme_Options', 'display_options'));
	}

	/**
	 * Sets up the default settings for the theme
	 *
	 **/
	public function default_options () {
		$options = array(
			'colorpicker-id' => '#ffffff',
		);
		$options = apply_filters( 'default_options', $options );

		return $options;
	}

	/**
	 * Generate header markup with styling and scripting based on option values
	 *
	 **/
	public function display_head () {

		// Load the options data
		$options = get_option( THEME_OPTIONS );
		
		// Do something to the options data here

?>
<style type="text/css">
	body {
		background: top left url('<?php echo( $options['upload-id'] ) ?>');
	}
</style>
<?php	
	}

	/**
	 * Generate the HTML output for the theme's option page
	 *
	 **/
	public function display_options () {

?>
<div class="wrap">
	<div id="content-type-label">
		<div id="icon-themes" class="icon32"><br></div>
		<h2><?php _e(THEME_NAME .' Theme Options'); ?></h2>
	</div>

	<form method="post" action="options.php">
		<?php settings_fields( THEME_NAME ); ?>
		<?php do_settings_sections( THEME_OPTIONS ); ?>
		<p class="submit"><input type="submit" class="button-primary" value="<?php _e( 'Save Changes', THEME_NAME ) ?>" /></p>
	</form>
</div>
<?php		

	}

	/**
	 * Enqueues required JS and CSS scripts with WordPress
	 *
	 **/

	public function enqueue_scripts () {
		if ( is_admin() ) {
		
			// General option page styling
			wp_enqueue_style( THEME_PREFIX . '-options', THEME_URL . 'assets/css/options.css' );

			// For media upload elements
			wp_enqueue_style( 'thickbox' );
			wp_enqueue_script( 'thickbox' );
			wp_enqueue_script( 'media-upload' );
			wp_enqueue_script( THEME_PREFIX . '-upload', THEME_URL . 'assets/js/admin.js', array( 'jquery', 'media-upload', 'thickbox' ) );

			// For Color Picker option elements
			wp_enqueue_style( 'jquery-colorpicker', THEME_URL . 'lib/jQuery-ColorPicker/css/colorpicker.min.css' );
			wp_enqueue_script( 'jquery-colorpicker', THEME_URL . 'lib/jQuery-ColorPicker/colorpicker.min.js', array( 'jquery' ) );
		}
	}

	/**
	 * Add settings sections and fields for display
	 *
	 */
	public function register_options () {
		
		/* Theme Options Placeholders / Examples */
		// Define the section
		add_settings_section( 'general', __( 'General', THEME_NAME ), array('WPDT_Options', 'section'), THEME_OPTIONS);

		// Checkbox
		add_settings_field( 'checkbox-id', __( 'Checkbox Title', THEME_NAME ), array('WPDT_Options', 'checkbox'), THEME_OPTIONS, 'general', array( 'label_for' => 'checkbox-id', 'description' => __( 'Test description', THEME_NAME ), 'theme_options' => THEME_OPTIONS) );

		// Colorpicker
		add_settings_field( 'colorpicker-id', __( 'Colorpicker Title', THEME_NAME ), array('WPDT_Options', 'colorpicker'), THEME_OPTIONS, 'general', array( 'label_for' => 'colorpicker-id', 'description' => __( 'Test description', THEME_NAME ), 'theme_options' => THEME_OPTIONS) );

		// Select
		add_settings_field( 'select-id', __( 'Select Title', THEME_NAME ), array('WPDT_Options', 'select'), THEME_OPTIONS, 'general', array( 'label_for' => 'select-id', 'description' => __( 'Test description', THEME_NAME ), 'options' => array( __( 'Option 1', THEME_NAME ), __( 'Option 2', THEME_NAME )), 'theme_options' => THEME_OPTIONS ) );

		// Textarea
		add_settings_field( 'textarea-id', __( 'Textarea Title', THEME_NAME ), array('WPDT_Options', 'textarea'), THEME_OPTIONS, 'general', array( 'label_for' => 'textarea-id', 'description' => __( 'Test description', THEME_NAME ), 'theme_options' => THEME_OPTIONS) );

		// Text field
		add_settings_field( 'textfield-id', __( 'Textfield title', THEME_NAME ), array('WPDT_Options', 'textfield'), THEME_OPTIONS, 'general', array( 'label_for' => 'textfield-id', 'placeholder' => __( 'Some Text', THEME_NAME ), 'description' => __( 'Test description', THEME_NAME ), 'theme_options' => THEME_OPTIONS) );

		// Media upload
		add_settings_field( 'upload-id', __( 'Upload title', THEME_NAME ), array('WPDT_Options', 'upload'), THEME_OPTIONS, 'general', array( 'label_for' => 'upload-id', 'description' => __( 'Test description', THEME_NAME ), 'theme_options' => THEME_OPTIONS) );
	}

	/**
	 * Validate/Whitelist User-Input Data Before Updating Theme Options
	 * Codex Reference: http://codex.wordpress.org/Data_Validation
	 *
	 */
	public function validate_options ( $input ) {
		// get HTML tags allowed by WP
		global $allowedtags;

		// get our saved settings
		$options = get_option( THEME_OPTIONS );
		$valid_input = $options;
		
		// get our default settings
		$default_options = self::default_options();
		
		/* Setting Validation Placeholders/Examples */
		// Validate hex colors, returns default if not valid
		$valid_input['colorpicker-id'] = WPDT_Options::sanitize_hex( $input['colorpicker-id'], $default_options['colorpicker-id'] );
		
		return $valid_input;
	}

}

// Options Actions
add_action( 'admin_init', array('Theme_Options', 'admin_init') );
add_action( 'admin_init', array('Theme_Options', 'register_options') );
add_action( 'admin_menu', array('Theme_Options', 'create_menu') );
add_action( 'admin_print_scripts-appearance_page_' . THEME_OPTIONS, array('Theme_Options', 'enqueue_scripts') );
add_action( 'wp_head',  array('Theme_Options', 'display_head') );