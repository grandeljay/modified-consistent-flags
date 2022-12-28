<?php

/**
 * Consistent Flags
 *
 * @author  Jay Trees <consistent-flags@grandels.email>
 * @link    https://github.com/grandeljay/modified-consistent-flags
 * @package GrandelJayConsistentFlags
 */

$filename = 'grandeljay/consistent-flags/css/consistent-flags.css';
$version  = hash_file('crc32c', DIR_FS_EXTERNAL . $filename);
?>
<link rel="stylesheet" type="text/css" href="<?php echo DIR_WS_EXTERNAL . $filename ?>?v=<?php echo $version ?>" />
