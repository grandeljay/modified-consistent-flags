<?php

/**
 * Consistent Flags
 *
 * @author  Jay Trees <consistent-flags@grandels.email>
 * @link    https://github.com/grandeljay/modified-consistent-flags
 * @package GrandelJayConsistentFlags
 */

chdir($_SERVER['DOCUMENT_ROOT']);

require_once 'includes/application_top.php';

$language_directory = $_GET['icon'];
$language           = xtc_db_fetch_array(
    xtc_db_query(
        'SELECT *
           FROM ' . TABLE_LANGUAGES . '
          WHERE `directory` = "' . $language_directory . '"'
    )
);

if (null === $language) {
    http_response_code(404);
    die();
}

header('Content-Type: image/svg+xml');

$language_code = $language['code'];

if ('en' === $language_code) {
    $language_code = 'gb';
}

$language_flag = DIR_FS_EXTERNAL . 'grandeljay/consistent-flags/flags/' . strtoupper($language_code) . '.svg';

die(file_get_contents($language_flag));
