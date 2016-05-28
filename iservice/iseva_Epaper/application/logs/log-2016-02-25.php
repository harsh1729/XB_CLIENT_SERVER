<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-02-25 05:17:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 8' at line 7 - Invalid query: SELECT *
FROM `business_extra` `o`
JOIN `business_extra_images` ON `o`.`id`=`business_extra_images`.`business_extra_id`
WHERE `expirydatetime` >= '2016-02-25 05:17:57'
AND `o`.`b_extra_master_id` = '1'
AND `isenable` = 1
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 8
ERROR - 2016-02-25 05:17:59 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 8' at line 8 - Invalid query: SELECT *
FROM `business_extra` `o`
JOIN `business_extra_images` ON `o`.`id`=`business_extra_images`.`business_extra_id`
WHERE `expirydatetime` >= '2016-02-25 05:17:59'
AND `o`.`b_extra_master_id` = '1'
AND `isenable` = 1
AND `o`.`catid` = '1'
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 8
ERROR - 2016-02-25 05:19:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 8' at line 8 - Invalid query: SELECT *
FROM `business_extra` `o`
JOIN `business_extra_images` ON `o`.`id`=`business_extra_images`.`business_extra_id`
WHERE `expirydatetime` >= '2016-02-25 05:19:15'
AND `o`.`b_extra_master_id` = '1'
AND `isenable` = 1
AND `o`.`catid` = '8'
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 8
ERROR - 2016-02-25 05:36:47 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-25 05:41:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()' at line 8 - Invalid query: SELECT `o`.`id`, `o`.`heading`, `o`.`expirydatetime`, `o`.`userid`, `o`.`content`, `o`.`publishdatetime`, `o`.`b_extra_master_id`, `u`.`isactive`, `u`.`firmname`, `u`.`firmcontact`, `u`.`email`, `u`.`address`, GROUP_CONCAT( oi.imageid SEPARATOR  '|' ) images
FROM `business_extra` `o`
JOIN `business_extra_images` `oi` ON `oi`.`business_extra_id` = `o`.`id`
JOIN `user` `u` ON `u`.`id` = `o`.`userid`
WHERE `o`.`expirydatetime` >= '2016-02-25 05:41:32'
AND `o`.`b_extra_master_id` = '2'
AND `o`.`isenable` = '1'
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
ERROR - 2016-02-25 05:41:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()' at line 8 - Invalid query: SELECT `o`.`id`, `o`.`heading`, `o`.`expirydatetime`, `o`.`userid`, `o`.`content`, `o`.`publishdatetime`, `o`.`b_extra_master_id`, `u`.`isactive`, `u`.`firmname`, `u`.`firmcontact`, `u`.`email`, `u`.`address`, GROUP_CONCAT( oi.imageid SEPARATOR  '|' ) images
FROM `business_extra` `o`
JOIN `business_extra_images` `oi` ON `oi`.`business_extra_id` = `o`.`id`
JOIN `user` `u` ON `u`.`id` = `o`.`userid`
WHERE `o`.`expirydatetime` >= '2016-02-25 05:41:37'
AND `o`.`b_extra_master_id` = '2'
AND `o`.`isenable` = '1'
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
ERROR - 2016-02-25 05:41:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()' at line 8 - Invalid query: SELECT `o`.`id`, `o`.`heading`, `o`.`expirydatetime`, `o`.`userid`, `o`.`content`, `o`.`publishdatetime`, `o`.`b_extra_master_id`, `u`.`isactive`, `u`.`firmname`, `u`.`firmcontact`, `u`.`email`, `u`.`address`, GROUP_CONCAT( oi.imageid SEPARATOR  '|' ) images
FROM `business_extra` `o`
JOIN `business_extra_images` `oi` ON `oi`.`business_extra_id` = `o`.`id`
JOIN `user` `u` ON `u`.`id` = `o`.`userid`
WHERE `o`.`expirydatetime` >= '2016-02-25 05:41:41'
AND `o`.`b_extra_master_id` = '2'
AND `o`.`isenable` = '1'
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
ERROR - 2016-02-25 05:49:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 8' at line 7 - Invalid query: SELECT *
FROM `business_extra` `o`
JOIN `business_extra_images` ON `o`.`id`=`business_extra_images`.`business_extra_id`
WHERE `expirydatetime` >= '2016-02-25 05:49:28'
AND `o`.`b_extra_master_id` = '1'
AND `isenable` = 1
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 8
ERROR - 2016-02-25 05:50:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 8' at line 7 - Invalid query: SELECT *
FROM `business_extra` `o`
JOIN `business_extra_images` ON `o`.`id`=`business_extra_images`.`business_extra_id`
WHERE `expirydatetime` >= '2016-02-25 05:50:40'
AND `o`.`b_extra_master_id` = '1'
AND `isenable` = 1
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 8
ERROR - 2016-02-25 05:50:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 8' at line 7 - Invalid query: SELECT *
FROM `business_extra` `o`
JOIN `business_extra_images` ON `o`.`id`=`business_extra_images`.`business_extra_id`
WHERE `expirydatetime` >= '2016-02-25 05:50:46'
AND `o`.`b_extra_master_id` = '1'
AND `isenable` = 1
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 8
ERROR - 2016-02-25 05:50:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 8' at line 7 - Invalid query: SELECT *
FROM `business_extra` `o`
JOIN `business_extra_images` ON `o`.`id`=`business_extra_images`.`business_extra_id`
WHERE `expirydatetime` >= '2016-02-25 05:50:52'
AND `o`.`b_extra_master_id` = '1'
AND `isenable` = 1
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 8
ERROR - 2016-02-25 06:03:44 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-25 07:49:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 8' at line 7 - Invalid query: SELECT *
FROM `business_extra` `o`
JOIN `business_extra_images` ON `o`.`id`=`business_extra_images`.`business_extra_id`
WHERE `expirydatetime` >= '2016-02-25 07:49:51'
AND `o`.`b_extra_master_id` = '1'
AND `isenable` = 1
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 8
ERROR - 2016-02-25 07:51:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 8' at line 7 - Invalid query: SELECT *
FROM `business_extra` `o`
JOIN `business_extra_images` ON `o`.`id`=`business_extra_images`.`business_extra_id`
WHERE `expirydatetime` >= '2016-02-25 07:51:27'
AND `o`.`b_extra_master_id` = '1'
AND `isenable` = 1
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 8
ERROR - 2016-02-25 08:18:41 --> 404 Page Not Found: Settings/index
ERROR - 2016-02-25 09:51:07 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-25 09:52:02 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-25 09:54:08 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-25 09:55:46 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-25 10:16:19 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-25 17:23:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 8' at line 7 - Invalid query: SELECT *
FROM `business_extra` `o`
JOIN `business_extra_images` ON `o`.`id`=`business_extra_images`.`business_extra_id`
WHERE `expirydatetime` >= '2016-02-25 17:23:09'
AND `o`.`b_extra_master_id` = '1'
AND `isenable` = 1
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 8
