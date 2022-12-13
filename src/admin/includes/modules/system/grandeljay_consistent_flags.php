<?php

/**
 * Consistent Flags
 *
 * A modified-shop Module which changes all of the flags for each language to a consistent style.
 *
 * @author Jay Trees <j.trees@hybridsupply.de>
 */

use RobinTheHood\ModifiedStdModule\Classes\StdModule;

require_once DIR_FS_DOCUMENT_ROOT . '/vendor-no-composer/autoload.php';

class grandeljay_consistent_flags extends StdModule
{
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
    }

    public function remove()
    {
        parent::remove();
    }
}
