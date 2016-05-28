<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-02-20 05:07:20 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-20 05:15:15 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-20 05:15:24 --> 404 Page Not Found: Settings/index
ERROR - 2016-02-20 07:43:35 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-20 07:56:23 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT *
FROM `business_extra_master` `b`
LEFT JOIN `category` `c` ON `c`.`parentid`=`b`.`catid`
WHERE `id` not in(1)
AND `c`.`id` = '64'
ERROR - 2016-02-20 08:03:59 --> Severity: Parsing Error --> syntax error, unexpected '$catid' (T_VARIABLE) /home/xercextx/public_html/iservice/application/models/Businessextra_model.php 254
ERROR - 2016-02-20 08:04:02 --> Severity: Parsing Error --> syntax error, unexpected '$catid' (T_VARIABLE) /home/xercextx/public_html/iservice/application/models/Businessextra_model.php 254
ERROR - 2016-02-20 08:04:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '`catid`
WHERE `b`.`id` not in(1)
AND `b`.`catid` = 'c.parentid'' at line 3 - Invalid query: SELECT *
FROM `business_extra_master` `b`
JOIN `category` `c` ON `c`.`id`=$`catid`
WHERE `b`.`id` not in(1)
AND `b`.`catid` = 'c.parentid'
ERROR - 2016-02-20 08:11:10 --> Severity: Parsing Error --> syntax error, unexpected '(', expecting identifier (T_STRING) or variable (T_VARIABLE) or '{' or '$' /home/xercextx/public_html/iservice/application/models/Businessextra_model.php 249
ERROR - 2016-02-20 08:33:46 --> Severity: Notice --> Array to string conversion /home/xercextx/public_html/iservice/system/database/DB_query_builder.php 662
ERROR - 2016-02-20 08:33:46 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT `o`.`id`, `o`.`heading`, `o`.`expirydatetime`, `o`.`userid`, `o`.`content`, `o`.`publishdatetime`, `o`.`b_extra_master_id`, GROUP_CONCAT( oi.imageid SEPARATOR  '|' ) images
FROM `business_extra` `o`
JOIN `business_extra_images` `oi` ON `oi`.`business_extra_id` = `o`.`id`
WHERE `o`.`expirydatetime` >= '2016-02-20 08:33:46'
AND `o`.`b_extra_master_id` = '2'
AND `o`.`id` = `Array`
GROUP BY `o`.`id`
ORDER BY RAND()
ERROR - 2016-02-20 08:34:03 --> Severity: Notice --> Array to string conversion /home/xercextx/public_html/iservice/system/database/DB_query_builder.php 662
ERROR - 2016-02-20 08:34:03 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT `o`.`id`, `o`.`heading`, `o`.`expirydatetime`, `o`.`userid`, `o`.`content`, `o`.`publishdatetime`, `o`.`b_extra_master_id`, GROUP_CONCAT( oi.imageid SEPARATOR  '|' ) images
FROM `business_extra` `o`
JOIN `business_extra_images` `oi` ON `oi`.`business_extra_id` = `o`.`id`
WHERE `o`.`expirydatetime` >= '2016-02-20 08:34:03'
AND `o`.`b_extra_master_id` = '4'
AND `o`.`id` = `Array`
GROUP BY `o`.`id`
ORDER BY RAND()
ERROR - 2016-02-20 08:34:06 --> Severity: Notice --> Array to string conversion /home/xercextx/public_html/iservice/system/database/DB_query_builder.php 662
ERROR - 2016-02-20 08:34:06 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT `o`.`id`, `o`.`heading`, `o`.`expirydatetime`, `o`.`userid`, `o`.`content`, `o`.`publishdatetime`, `o`.`b_extra_master_id`, GROUP_CONCAT( oi.imageid SEPARATOR  '|' ) images
FROM `business_extra` `o`
JOIN `business_extra_images` `oi` ON `oi`.`business_extra_id` = `o`.`id`
WHERE `o`.`expirydatetime` >= '2016-02-20 08:34:06'
AND `o`.`b_extra_master_id` = '4'
AND `o`.`id` = `Array`
GROUP BY `o`.`id`
ORDER BY RAND()
ERROR - 2016-02-20 08:34:08 --> Severity: Notice --> Array to string conversion /home/xercextx/public_html/iservice/system/database/DB_query_builder.php 662
ERROR - 2016-02-20 08:34:08 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT `o`.`id`, `o`.`heading`, `o`.`expirydatetime`, `o`.`userid`, `o`.`content`, `o`.`publishdatetime`, `o`.`b_extra_master_id`, GROUP_CONCAT( oi.imageid SEPARATOR  '|' ) images
FROM `business_extra` `o`
JOIN `business_extra_images` `oi` ON `oi`.`business_extra_id` = `o`.`id`
WHERE `o`.`expirydatetime` >= '2016-02-20 08:34:08'
AND `o`.`b_extra_master_id` = '4'
AND `o`.`id` = `Array`
GROUP BY `o`.`id`
ORDER BY RAND()
ERROR - 2016-02-20 08:37:35 --> Severity: Notice --> Array to string conversion /home/xercextx/public_html/iservice/system/database/DB_query_builder.php 662
ERROR - 2016-02-20 08:37:35 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT `o`.`id`, `o`.`heading`, `o`.`expirydatetime`, `o`.`userid`, `o`.`content`, `o`.`publishdatetime`, `o`.`b_extra_master_id`, GROUP_CONCAT( oi.imageid SEPARATOR  '|' ) images
FROM `business_extra` `o`
JOIN `business_extra_images` `oi` ON `oi`.`business_extra_id` = `o`.`id`
WHERE `o`.`expirydatetime` >= '2016-02-20 08:37:35'
AND `o`.`b_extra_master_id` = '4'
AND `o`.`id` = `Array`
GROUP BY `o`.`id`
ORDER BY RAND()
ERROR - 2016-02-20 10:12:26 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-20 10:13:32 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-20 10:56:27 --> Severity: error --> Exception: /home/xercextx/public_html/iservice/application/models/Businessextra_model.php exists, but doesn't declare class Businessextra_model /home/xercextx/public_html/iservice/system/core/Loader.php 306
ERROR - 2016-02-20 10:58:17 --> Severity: error --> Exception: /home/xercextx/public_html/iservice/application/models/Businessextra_model.php exists, but doesn't declare class Businessextra_model /home/xercextx/public_html/iservice/system/core/Loader.php 306
ERROR - 2016-02-20 10:58:39 --> Severity: error --> Exception: /home/xercextx/public_html/iservice/application/models/Businessextra_model.php exists, but doesn't declare class Businessextra_model /home/xercextx/public_html/iservice/system/core/Loader.php 306
