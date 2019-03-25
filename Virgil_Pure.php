<?php

/**
 * Plugin Name:       Virgil Pure
 * Plugin URI:        http://virgilsecurity.com/
 * Description:  Free tool that protects user passwords from data breaches and both online and offline attacks, and renders stolen passwords useless even if your database has been compromised.  The Pure based on <a href="#" target="_blank">powerful and revolutionary cryptographic technology</a> that provides stronger and more modern security and can be used within any database or login system that uses a password, so it's accessible for business of any industry or size.
 * Version:           0.1.0
 * Author:            Virgil Security
 * Author URI:        http://virgilsecurity.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       virgil-pure
 * Domain Path:       /languages
 */

use Dotenv\Dotenv;

require plugin_dir_path(__FILE__) . 'admin/core/vendor/autoload.php';

if (!defined('PLUGIN_PURE_CORE')) {
    define('PLUGIN_PURE_CORE', __DIR__ . DIRECTORY_SEPARATOR .'admin'. DIRECTORY_SEPARATOR. 'core');
}

if (!defined('PLUGIN_PURE_CORE_ENV_FILE')) {
    define('PLUGIN_PURE_CORE_ENV_FILE', PLUGIN_PURE_CORE . DIRECTORY_SEPARATOR .'.env');
}

(new Dotenv(PLUGIN_PURE_CORE))->overload();

if (!defined('WPINC')) {
    die;
}

define('VIRGIL_PURE_VERSION', '0.1.0');

function activate_Virgil_Pure()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-virgil-pure-activator.php';
    Virgil_Pure_Activator::activate();
}

function deactivate_Virgil_Pure()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-virgil-pure-deactivator.php';
    Virgil_Pure_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_Virgil_Pure');
register_deactivation_hook(__FILE__, 'deactivate_Virgil_Pure');

require plugin_dir_path(__FILE__) . 'includes/class-virgil-pure.php';

function run_Virgil_Pure()
{
    $plugin = new Virgil_Pure();
    $plugin->run();
}

run_Virgil_Pure();