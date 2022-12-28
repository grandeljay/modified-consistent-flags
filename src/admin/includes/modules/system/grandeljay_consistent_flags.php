<?php

/**
 * Consistent Flags
 *
 * A modified-shop Module which changes all of the flags for each language to a consistent style. Uses https://github.com/fonttools/region-flags.
 *
 * @author  Jay Trees <consistent-flags@grandels.email>
 * @link    https://github.com/grandeljay/modified-consistent-flags
 * @package GrandelJayConsistentFlags
 */

use RobinTheHood\ModifiedStdModule\Classes\StdModule;

require_once DIR_FS_DOCUMENT_ROOT . '/vendor-no-composer/autoload.php';

class grandeljay_consistent_flags extends StdModule
{
    public const VERSION = '0.3.0';

    public function __construct()
    {
        $this->init('MODULE_GRANDELJAY_CONSISTENT_FLAGS');
    }

    public function display()
    {
        return $this->displaySaveButton();
    }

    public function install()
    {
        parent::install();

        /**
         * Create placeholders for missing language flags
         */
        $languages_query = xtc_db_query(
            'SELECT *
               FROM ' . TABLE_LANGUAGES
        );

        while ($language = xtc_db_fetch_array($languages_query)) {
            $filepath_icon = DIR_FS_LANGUAGES . $language['directory'] . '/icon.gif';

            if (!file_exists($filepath_icon)) {
                file_put_contents($filepath_icon, '');
            }
        }

        /**
         * Create CSS for current template
         */
        $css_filepath_source = DIR_FS_EXTERNAL . 'grandeljay/consistent-flags/css/consistent-flags.css';
        $css_filepath_target = DIR_FS_CATALOG . 'templates/' . CURRENT_TEMPLATE . '/css/consistent-flags.css';
        $css_contents        = file_get_contents($css_filepath_source);

        file_put_contents($css_filepath_target, $css_contents);
    }

    public function remove()
    {
        parent::remove();
    }
}
