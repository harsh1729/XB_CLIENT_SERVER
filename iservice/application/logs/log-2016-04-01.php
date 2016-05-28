<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-04-01 05:21:07 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-04-01 05:21:46 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-04-01 05:24:48 --> 404 Page Not Found: Undefined/index
ERROR - 2016-04-01 08:39:01 --> 404 Page Not Found: Undefined/index
ERROR - 2016-04-01 08:39:13 --> 404 Page Not Found: Undefined/index
ERROR - 2016-04-01 08:57:19 --> 404 Page Not Found: Undefined/index
ERROR - 2016-04-01 08:57:20 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-04-01 09:03:32 --> 404 Page Not Found: Undefined/index
ERROR - 2016-04-01 09:11:37 --> 404 Page Not Found: Publicuploads/2016
ERROR - 2016-04-01 09:11:38 --> 404 Page Not Found: Publicuploads/2016
ERROR - 2016-04-01 09:11:40 --> 404 Page Not Found: Publicuploads/2016
ERROR - 2016-04-01 09:16:17 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-04-01 11:35:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 10' at line 7 - Invalid query: SELECT *
FROM `business_extra` `o`
JOIN `business_extra_images` ON `o`.`id`=`business_extra_images`.`business_extra_id`
WHERE `o`.`b_extra_master_id` = '1'
AND `isenable` = 1
AND `catid` = '0'
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 10
ERROR - 2016-04-01 11:37:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()' at line 8 - Invalid query: SELECT `o`.`id`, `o`.`heading`, `o`.`expirydatetime`, `o`.`userid`, `o`.`content`, `o`.`publishdatetime`, `o`.`b_extra_master_id`, `u`.`isactive`, `u`.`firmname`, `u`.`firmcontact`, `u`.`email`, `u`.`address`, GROUP_CONCAT( oi.imageid SEPARATOR  '|' ) images
FROM `business_extra` `o`
JOIN `business_extra_images` `oi` ON `oi`.`business_extra_id` = `o`.`id`
JOIN `user` `u` ON `u`.`id` = `o`.`userid`
WHERE `o`.`expirydatetime` >= '2016-04-01 11:37:11'
AND `o`.`b_extra_master_id` = '10'
AND `o`.`isenable` = '1'
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
ERROR - 2016-04-01 13:43:16 --> 404 Page Not Found: Undefined/index
ERROR - 2016-04-01 13:51:23 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-04-01 13:54:03 --> 404 Page Not Found: Plugins/bootstrap-datepicker
