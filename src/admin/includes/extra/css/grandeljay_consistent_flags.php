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

$filename = 'includes/css/grandeljay_consistent_flags.css';
$version  = hash_file('crc32c', DIR_FS_ADMIN . $filename);
?>
<link rel="stylesheet" type="text/css" href="<?php echo DIR_WS_ADMIN . $filename ?>?v=<?php echo $version ?>" />
