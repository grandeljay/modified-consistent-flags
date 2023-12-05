<?php

/**
 * Consistent Flags
 *
 * @author  Jay Trees <consistent-flags@grandels.email>
 * @link    https://github.com/grandeljay/modified-consistent-flags
 * @package GrandelJayConsistentFlags
 */

namespace Grandeljay\ConsistentFlags;

if (\rth_is_module_disabled(Constants::MODULE_NAME)) {
    return;
}

$filename = 'grandeljay/consistent_flags/css/grandeljay_consistent_flags.css';
$version  = hash_file('crc32c', DIR_FS_EXTERNAL . $filename);
?>
<link rel="stylesheet" type="text/css" href="<?php echo DIR_WS_EXTERNAL . $filename ?>?v=<?php echo $version ?>" />
