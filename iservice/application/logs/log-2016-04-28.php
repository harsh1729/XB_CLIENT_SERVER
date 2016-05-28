<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-04-28 03:59:17 --> 404 Page Not Found: Undefined/index
ERROR - 2016-04-28 03:59:41 --> 404 Page Not Found: Undefined/index
ERROR - 2016-04-28 05:07:46 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-04-28 05:23:50 --> 404 Page Not Found: Publicuploads/2016
ERROR - 2016-04-28 05:23:51 --> 404 Page Not Found: Publicuploads/2016
ERROR - 2016-04-28 07:33:12 --> 404 Page Not Found: Undefined/index
ERROR - 2016-04-28 07:33:17 --> 404 Page Not Found: Undefined/index
ERROR - 2016-04-28 07:33:33 --> 404 Page Not Found: Undefined/index
ERROR - 2016-04-28 07:39:44 --> 404 Page Not Found: Publicuploads/2016
ERROR - 2016-04-28 07:39:45 --> 404 Page Not Found: Publicuploads/2016
ERROR - 2016-04-28 07:42:53 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-04-28 08:01:30 --> 404 Page Not Found: Undefined/index
ERROR - 2016-04-28 08:01:37 --> 404 Page Not Found: Undefined/index
ERROR - 2016-04-28 12:50:45 --> 404 Page Not Found: Undefined/index
ERROR - 2016-04-28 16:55:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
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
ERROR - 2016-04-28 16:55:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 10' at line 8 - Invalid query: SELECT *
FROM `business_extra` `o`
JOIN `business_extra_images` ON `o`.`id`=`business_extra_images`.`business_extra_id`
WHERE `o`.`b_extra_master_id` = '1'
AND `isenable` = 1
AND `isbusiness` = '1'
AND `o`.`catid` = '2'
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 10
