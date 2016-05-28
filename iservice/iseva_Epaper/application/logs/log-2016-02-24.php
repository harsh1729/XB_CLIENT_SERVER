<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-02-24 05:26:58 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-24 05:48:09 --> Severity: Notice --> Undefined variable: cateiddb /home/xercextx/public_html/iservice/application/models/Businessextra_model.php 327
ERROR - 2016-02-24 05:56:20 --> Severity: Notice --> Undefined variable: cateiddb /home/xercextx/public_html/iservice/application/models/Businessextra_model.php 327
ERROR - 2016-02-24 07:34:27 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-24 07:36:44 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-24 07:37:05 --> 404 Page Not Found: Settings/index
ERROR - 2016-02-24 07:37:08 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-24 07:48:50 --> Severity: Notice --> Undefined variable: userid /home/xercextx/public_html/iservice/application/models/User_model.php 318
ERROR - 2016-02-24 07:49:29 --> Severity: Notice --> Undefined variable: userid /home/xercextx/public_html/iservice/application/models/User_model.php 318
ERROR - 2016-02-24 07:52:27 --> Severity: Notice --> Undefined variable: userid /home/xercextx/public_html/iservice/application/models/User_model.php 318
ERROR - 2016-02-24 07:54:51 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-24 07:58:16 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-24 08:47:33 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-24 08:57:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 8' at line 7 - Invalid query: SELECT *
FROM `business_extra` `o`
JOIN `business_extra_images` ON `o`.`id`=`business_extra_images`.`business_extra_id`
WHERE `expirydatetime` >= '2016-02-24 08:57:09'
AND `o`.`b_extra_master_id` = '1'
AND `isenable` = 1
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 8
ERROR - 2016-02-24 09:32:13 --> Severity: Parsing Error --> syntax error, unexpected end of file, expecting function (T_FUNCTION) /home/xercextx/public_html/iservice/application/controllers/client_requests/User.php 188
ERROR - 2016-02-24 09:32:38 --> Severity: Parsing Error --> syntax error, unexpected end of file, expecting function (T_FUNCTION) /home/xercextx/public_html/iservice/application/controllers/client_requests/User.php 188
ERROR - 2016-02-24 10:29:45 --> Query error: Unknown column 'u.city' in 'on clause' - Invalid query: SELECT `o`.`id`, `o`.`heading`, `o`.`expirydatetime`, `o`.`userid`, `o`.`content`, `o`.`publishdatetime`, `o`.`b_extra_master_id`, `u`.`isactive`, `u`.`firmname`, `u`.`address`, `u`.`firmcontact`, `u`.`email`, `u`.`cityid` as `city`, `c`.`name` as `cityname`, `c`.`pincode`, GROUP_CONCAT( oi.imageid SEPARATOR  '|' ) images
FROM `business_extra` `o`
JOIN `business_extra_images` `oi` ON `oi`.`business_extra_id` = `o`.`id`
JOIN `user` `u` ON `u`.`id` = `o`.`userid`
LEFT JOIN `city` `c` ON `c`.`id`=`u`.`city`
WHERE `o`.`expirydatetime` >= '2016-02-24 10:29:45'
AND `o`.`b_extra_master_id` = '2'
AND `o`.`isenable` = '1'
AND `o`.`cityid` IN('3', '2', '1')
GROUP BY `o`.`id`
ORDER BY RAND()
ERROR - 2016-02-24 10:29:55 --> Query error: Unknown column 'u.city' in 'on clause' - Invalid query: SELECT `o`.`id`, `o`.`heading`, `o`.`expirydatetime`, `o`.`userid`, `o`.`content`, `o`.`publishdatetime`, `o`.`b_extra_master_id`, `u`.`isactive`, `u`.`firmname`, `u`.`address`, `u`.`firmcontact`, `u`.`email`, `u`.`cityid` as `city`, `c`.`name` as `cityname`, `c`.`pincode`, GROUP_CONCAT( oi.imageid SEPARATOR  '|' ) images
FROM `business_extra` `o`
JOIN `business_extra_images` `oi` ON `oi`.`business_extra_id` = `o`.`id`
JOIN `user` `u` ON `u`.`id` = `o`.`userid`
LEFT JOIN `city` `c` ON `c`.`id`=`u`.`city`
WHERE `o`.`expirydatetime` >= '2016-02-24 10:29:55'
AND `o`.`b_extra_master_id` = '2'
AND `o`.`isenable` = '1'
AND `o`.`cityid` IN('3', '2', '1')
GROUP BY `o`.`id`
ORDER BY RAND()
ERROR - 2016-02-24 10:32:13 --> Severity: Error --> Cannot use object of type stdClass as array /home/xercextx/public_html/iservice/application/models/Businessextra_model.php 282
ERROR - 2016-02-24 10:32:40 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()' at line 8 - Invalid query: SELECT `o`.`id`, `o`.`heading`, `o`.`expirydatetime`, `o`.`userid`, `o`.`content`, `o`.`publishdatetime`, `o`.`b_extra_master_id`, `u`.`isactive`, `u`.`firmname`, `u`.`address`, `u`.`firmcontact`, `u`.`email`, GROUP_CONCAT( oi.imageid SEPARATOR  '|' ) images
FROM `business_extra` `o`
JOIN `business_extra_images` `oi` ON `oi`.`business_extra_id` = `o`.`id`
JOIN `user` `u` ON `u`.`id` = `o`.`userid`
WHERE `o`.`expirydatetime` >= '2016-02-24 10:32:40'
AND `o`.`b_extra_master_id` = '2'
AND `o`.`isenable` = '1'
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
ERROR - 2016-02-24 10:36:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()' at line 8 - Invalid query: SELECT `o`.`id`, `o`.`heading`, `o`.`expirydatetime`, `o`.`userid`, `o`.`content`, `o`.`publishdatetime`, `o`.`b_extra_master_id`, `u`.`isactive`, `u`.`firmname`, `u`.`address`, `u`.`firmcontact`, `u`.`email`, GROUP_CONCAT( oi.imageid SEPARATOR  '|' ) images
FROM `business_extra` `o`
JOIN `business_extra_images` `oi` ON `oi`.`business_extra_id` = `o`.`id`
JOIN `user` `u` ON `u`.`id` = `o`.`userid`
WHERE `o`.`expirydatetime` >= '2016-02-24 10:36:01'
AND `o`.`b_extra_master_id` = '2'
AND `o`.`isenable` = '1'
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
ERROR - 2016-02-24 10:37:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()' at line 8 - Invalid query: SELECT `o`.`id`, `o`.`heading`, `o`.`expirydatetime`, `o`.`userid`, `o`.`content`, `o`.`publishdatetime`, `o`.`b_extra_master_id`, `u`.`isactive`, `u`.`firmname`, `u`.`address`, `u`.`firmcontact`, `u`.`email`, GROUP_CONCAT( oi.imageid SEPARATOR  '|' ) images
FROM `business_extra` `o`
JOIN `business_extra_images` `oi` ON `oi`.`business_extra_id` = `o`.`id`
LEFT JOIN `user` `u` ON `u`.`id` = `o`.`userid`
WHERE `o`.`expirydatetime` >= '2016-02-24 10:37:16'
AND `o`.`b_extra_master_id` = '2'
AND `o`.`isenable` = '1'
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
ERROR - 2016-02-24 10:38:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()' at line 8 - Invalid query: SELECT `o`.`id`, `o`.`heading`, `o`.`expirydatetime`, `o`.`userid`, `o`.`content`, `o`.`publishdatetime`, `o`.`b_extra_master_id`, `u`.`isactive`, GROUP_CONCAT( oi.imageid SEPARATOR  '|' ) images
FROM `business_extra` `o`
JOIN `business_extra_images` `oi` ON `oi`.`business_extra_id` = `o`.`id`
LEFT JOIN `user` `u` ON `u`.`id` = `o`.`userid`
WHERE `o`.`expirydatetime` >= '2016-02-24 10:38:24'
AND `o`.`b_extra_master_id` = '2'
AND `o`.`isenable` = '1'
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
ERROR - 2016-02-24 10:41:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()' at line 8 - Invalid query: SELECT `o`.`id`, `o`.`heading`, `o`.`expirydatetime`, `o`.`userid`, `o`.`content`, `o`.`publishdatetime`, `o`.`b_extra_master_id`, `u`.`isactive`, `u`.`firmname`, `u`.`firmcontact`, `u`.`email`, `u`.`address`, GROUP_CONCAT( oi.imageid SEPARATOR  '|' ) images
FROM `business_extra` `o`
JOIN `business_extra_images` `oi` ON `oi`.`business_extra_id` = `o`.`id`
JOIN `user` `u` ON `u`.`id` = `o`.`userid`
WHERE `o`.`expirydatetime` >= '2016-02-24 10:41:14'
AND `o`.`b_extra_master_id` = '2'
AND `o`.`isenable` = '1'
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
ERROR - 2016-02-24 10:43:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()' at line 8 - Invalid query: SELECT `o`.`id`, `o`.`heading`, `o`.`expirydatetime`, `o`.`userid`, `o`.`content`, `o`.`publishdatetime`, `o`.`b_extra_master_id`, `u`.`isactive`, GROUP_CONCAT( oi.imageid SEPARATOR  '|' ) images
FROM `business_extra` `o`
JOIN `business_extra_images` `oi` ON `oi`.`business_extra_id` = `o`.`id`
JOIN `user` `u` ON `u`.`id` = `o`.`userid`
WHERE `o`.`expirydatetime` >= '2016-02-24 10:43:18'
AND `o`.`b_extra_master_id` = '2'
AND `o`.`isenable` = '1'
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
ERROR - 2016-02-24 11:08:37 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-24 11:14:39 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-24 11:21:13 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-24 11:27:14 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-24 11:31:11 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-24 11:31:23 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-24 11:33:35 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-24 11:43:21 --> Severity: Parsing Error --> syntax error, unexpected 'public' (T_PUBLIC) /home/xercextx/public_html/iservice/application/models/User_model.php 369
ERROR - 2016-02-24 11:44:38 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-24 11:44:52 --> Severity: Notice --> Undefined variable: userid /home/xercextx/public_html/iservice/application/models/User_model.php 288
ERROR - 2016-02-24 11:45:06 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-24 11:48:37 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-24 11:49:08 --> Severity: Notice --> Undefined variable: userid /home/xercextx/public_html/iservice/application/models/User_model.php 288
ERROR - 2016-02-24 11:49:50 --> Severity: Notice --> Undefined variable: userid /home/xercextx/public_html/iservice/application/models/User_model.php 288
ERROR - 2016-02-24 11:50:04 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-24 11:50:28 --> Severity: Notice --> Undefined variable: userid /home/xercextx/public_html/iservice/application/models/User_model.php 288
ERROR - 2016-02-24 11:51:44 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-24 11:52:42 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-24 12:09:00 --> 404 Page Not Found: Undefined/index
