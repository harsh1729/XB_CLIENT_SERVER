<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-05-20 03:18:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
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
ERROR - 2016-05-20 03:18:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 10' at line 8 - Invalid query: SELECT *
FROM `business_extra` `o`
JOIN `business_extra_images` ON `o`.`id`=`business_extra_images`.`business_extra_id`
WHERE `o`.`b_extra_master_id` = '1'
AND `isenable` = 1
AND `isbusiness` = '1'
AND `o`.`catid` = '12'
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 10
ERROR - 2016-05-20 09:06:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
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
ERROR - 2016-05-20 09:06:12 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
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
ERROR - 2016-05-20 09:07:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 10' at line 8 - Invalid query: SELECT *
FROM `business_extra` `o`
JOIN `business_extra_images` ON `o`.`id`=`business_extra_images`.`business_extra_id`
WHERE `o`.`b_extra_master_id` = '1'
AND `isenable` = 1
AND `isbusiness` = '1'
AND `o`.`catid` = '4'
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 10
ERROR - 2016-05-20 09:07:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 10' at line 7 - Invalid query: SELECT *
FROM `business_extra` `o`
JOIN `business_extra_images` ON `o`.`id`=`business_extra_images`.`business_extra_id`
WHERE `o`.`b_extra_master_id` = '1'
AND `isenable` = 1
AND `o`.`catid` = '4'
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 10
ERROR - 2016-05-20 09:07:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY `o`.`id` DESC' at line 7 - Invalid query: SELECT `o`.`id`, `o`.`heading`, `o`.`expirydatetime`, `o`.`userid`, `o`.`content`, `o`.`publishdatetime`, `o`.`b_extra_master_id`, `u`.`isactive`, `u`.`firmname`, `u`.`firmcontact`, `u`.`email`, `u`.`address`, GROUP_CONCAT( oi.imageid SEPARATOR  '|' ) images
FROM `business_extra` `o`
JOIN `business_extra_images` `oi` ON `oi`.`business_extra_id` = `o`.`id`
JOIN `user` `u` ON `u`.`id` = `o`.`userid`
WHERE `o`.`b_extra_master_id` = '5'
AND `o`.`isenable` = '1'
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY `o`.`id` DESC
ERROR - 2016-05-20 11:25:26 --> 404 Page Not Found: Undefined/index
ERROR - 2016-05-20 14:02:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
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
ERROR - 2016-05-20 14:02:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 10' at line 8 - Invalid query: SELECT *
FROM `business_extra` `o`
JOIN `business_extra_images` ON `o`.`id`=`business_extra_images`.`business_extra_id`
WHERE `o`.`b_extra_master_id` = '1'
AND `isenable` = 1
AND `isbusiness` = '1'
AND `o`.`catid` = '1'
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 10
ERROR - 2016-05-20 14:10:16 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 234
ERROR - 2016-05-20 14:10:16 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 235
ERROR - 2016-05-20 14:10:16 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 236
ERROR - 2016-05-20 14:10:16 --> Severity: Warning --> getimagesize(): Filename cannot be empty /home/xercextx/public_html/iservice/application/models/Gallery_model.php 236
ERROR - 2016-05-20 14:10:16 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 240
ERROR - 2016-05-20 14:10:16 --> Query error: Column 'size' cannot be null - Invalid query: INSERT INTO `gallery` (`name`, `datetime`, `size`, `width`, `height`, `userid`) VALUES ('14637534161463753870.', '2016-05-20 14:10:16', NULL, NULL, NULL, -1)
ERROR - 2016-05-20 14:10:16 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/xercextx/public_html/iservice/system/core/Exceptions.php:272) /home/xercextx/public_html/iservice/system/core/Common.php 568
ERROR - 2016-05-20 14:10:48 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 234
ERROR - 2016-05-20 14:10:48 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 235
ERROR - 2016-05-20 14:10:48 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 236
ERROR - 2016-05-20 14:10:48 --> Severity: Warning --> getimagesize(): Filename cannot be empty /home/xercextx/public_html/iservice/application/models/Gallery_model.php 236
ERROR - 2016-05-20 14:10:48 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 240
ERROR - 2016-05-20 14:10:48 --> Query error: Column 'size' cannot be null - Invalid query: INSERT INTO `gallery` (`name`, `datetime`, `size`, `width`, `height`, `userid`) VALUES ('14637534481463753934.', '2016-05-20 14:10:48', NULL, NULL, NULL, -1)
ERROR - 2016-05-20 14:10:48 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/xercextx/public_html/iservice/system/core/Exceptions.php:272) /home/xercextx/public_html/iservice/system/core/Common.php 568
ERROR - 2016-05-20 14:11:01 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 234
ERROR - 2016-05-20 14:11:01 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 235
ERROR - 2016-05-20 14:11:01 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 236
ERROR - 2016-05-20 14:11:01 --> Severity: Warning --> getimagesize(): Filename cannot be empty /home/xercextx/public_html/iservice/application/models/Gallery_model.php 236
ERROR - 2016-05-20 14:11:01 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 240
ERROR - 2016-05-20 14:11:01 --> Query error: Column 'size' cannot be null - Invalid query: INSERT INTO `gallery` (`name`, `datetime`, `size`, `width`, `height`, `userid`) VALUES ('14637534611463753888.', '2016-05-20 14:11:01', NULL, NULL, NULL, -1)
ERROR - 2016-05-20 14:11:01 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/xercextx/public_html/iservice/system/core/Exceptions.php:272) /home/xercextx/public_html/iservice/system/core/Common.php 568
ERROR - 2016-05-20 14:11:09 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 234
ERROR - 2016-05-20 14:11:09 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 235
ERROR - 2016-05-20 14:11:09 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 236
ERROR - 2016-05-20 14:11:09 --> Severity: Warning --> getimagesize(): Filename cannot be empty /home/xercextx/public_html/iservice/application/models/Gallery_model.php 236
ERROR - 2016-05-20 14:11:09 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 240
ERROR - 2016-05-20 14:11:09 --> Query error: Column 'size' cannot be null - Invalid query: INSERT INTO `gallery` (`name`, `datetime`, `size`, `width`, `height`, `userid`) VALUES ('14637534691463753908.', '2016-05-20 14:11:09', NULL, NULL, NULL, -1)
ERROR - 2016-05-20 14:11:09 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/xercextx/public_html/iservice/system/core/Exceptions.php:272) /home/xercextx/public_html/iservice/system/core/Common.php 568
ERROR - 2016-05-20 14:11:12 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 234
ERROR - 2016-05-20 14:11:12 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 235
ERROR - 2016-05-20 14:11:12 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 236
ERROR - 2016-05-20 14:11:12 --> Severity: Warning --> getimagesize(): Filename cannot be empty /home/xercextx/public_html/iservice/application/models/Gallery_model.php 236
ERROR - 2016-05-20 14:11:12 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 240
ERROR - 2016-05-20 14:11:12 --> Query error: Column 'size' cannot be null - Invalid query: INSERT INTO `gallery` (`name`, `datetime`, `size`, `width`, `height`, `userid`) VALUES ('14637534721463753960.', '2016-05-20 14:11:12', NULL, NULL, NULL, -1)
ERROR - 2016-05-20 14:11:12 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/xercextx/public_html/iservice/system/core/Exceptions.php:272) /home/xercextx/public_html/iservice/system/core/Common.php 568
ERROR - 2016-05-20 16:29:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
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
ERROR - 2016-05-20 16:34:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
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
