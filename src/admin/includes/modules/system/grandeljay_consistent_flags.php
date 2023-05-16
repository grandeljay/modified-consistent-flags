<?php

/**
 * Consistent Flags
 *
 * A modified-shop Module which changes all of the flags for each language to a
 * consistent style. Uses https://github.com/fonttools/region-flags.
 *
 * @author  Jay Trees <consistent-flags@grandels.email>
 * @link    https://github.com/grandeljay/modified-consistent-flags
 * @package GrandelJayConsistentFlags
 *
 * @phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
 * @phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
 */

use RobinTheHood\ModifiedStdModule\Classes\StdModule;

class grandeljay_consistent_flags extends StdModule
{
    public const VERSION = '0.5.2';

    public function __construct()
    {
        parent::__construct();

        $this->checkForUpdate(true);
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
        $css_filepath_source = DIR_FS_EXTERNAL . 'grandeljay/consistent_flags/css/grandeljay_consistent_flags.css';
        $css_filepath_target = DIR_FS_CATALOG . 'templates/' . CURRENT_TEMPLATE . '/css/grandeljay_consistent_flags.css';
        $css_contents        = file_get_contents($css_filepath_source);

        file_put_contents($css_filepath_target, $css_contents);
    }

    protected function updateSteps()
    {
        if (version_compare($this->getVersion(), self::VERSION, '<')) {
            $this->setVersion(self::VERSION);

            return self::UPDATE_SUCCESS;
        }

        return self::UPDATE_NOTHING;
    }

    public function remove()
    {
        parent::remove();
    }
}
