<?php

/**
 * Consistent Flags
 *
 * @author  Jay Trees <consistent-flags@grandels.email>
 * @link    https://github.com/grandeljay/modified-consistent-flags
 * @package GrandelJayConsistentFlags
 */

namespace Grandeljay\ConsistentFlags;

ob_start();

$shop_root = realpath('../../../..');

chdir($shop_root);

require_once $shop_root . '/includes/application_top.php';

ob_get_clean();

/**
 * Return original flag
 */
if (rth_is_module_disabled(Constants::MODULE_NAME)) {
    $languages      = [];
    $language_query = xtc_db_query(
        \sprintf(
            'SELECT *
            FROM `%s`',
            \TABLE_LANGUAGES
        )
    );

    while ($language = xtc_db_fetch_array($language_query)) {
        $key = $language['directory'];

        $languages[$key] = $language;
    }

    if (isset($_SERVER['REQUEST_URI'])) {
        $directory = \explode('/', $_SERVER['REQUEST_URI'])[2] ?? 'Unknown';
        $filepath  = rtrim($shop_root, '/') . \dirname($_SERVER['REQUEST_URI']) . '/' . $languages[$directory]['image'];

        if (file_exists($filepath)) {
            $icon = file_get_contents($filepath);
            $mime = mime_content_type($filepath);

            if (!empty($icon)) {
                http_response_code(302);
                header('Content-Type: ' . $mime);

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

$language_code      = $language['code'];
$language_flag      = \sprintf(DIR_FS_EXTERNAL . 'grandeljay/consistent_flags/flags/%s.png', $language_code);
$language_flag_mime = mime_content_type($language_flag);

header('Content-Type: ' . $language_flag_mime);
die(file_get_contents($language_flag));
