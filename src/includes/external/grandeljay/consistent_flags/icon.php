<?php

/**
 * Consistent Flags
 *
 * @author  Jay Trees <consistent-flags@grandels.email>
 * @link    https://github.com/grandeljay/modified-consistent-flags
 * @package GrandelJayConsistentFlags
 */

ob_start();

$shop_root = realpath('../../../..');

chdir($shop_root);

require_once $shop_root . '/includes/application_top.php';

ob_get_clean();

/**
 * Return original flag
 */
if (rth_is_module_disabled('MODULE_GRANDELJAY_CONSISTENT_FLAGS')) {
    if (isset($_SERVER['REQUEST_URI'])) {
        $filepath = rtrim($shop_root, '/') . '/' . ltrim($_SERVER['REQUEST_URI'], '/');

        if (file_exists($filepath)) {
            $icon = file_get_contents($filepath);
            $ext  = pathinfo($filepath, PATHINFO_EXTENSION);

            if (!empty($icon)) {
                http_response_code(302);
                header('Content-Type: image/' . $ext);

                die($icon);
            }
        }
    }

    http_response_code(404);
    die();
}

/**
 * Return consistent flag
 */
$language_directory = $_GET['icon'];
$language_query     = xtc_db_query(
    'SELECT *
       FROM ' . TABLE_LANGUAGES . '
      WHERE `directory` = "' . $language_directory . '"'
);
$language           = xtc_db_fetch_array($language_query);

if (null === $language) {
    http_response_code(404);
    die();
}

header('Content-Type: image/svg+xml');

$language_code = $language['code'];

if ('en' === $language_code) {
    $language_code = 'gb';
}

$language_flag = DIR_FS_EXTERNAL . 'grandeljay/consistent_flags/flags/' . strtoupper($language_code) . '.svg';

die(file_get_contents($language_flag));
