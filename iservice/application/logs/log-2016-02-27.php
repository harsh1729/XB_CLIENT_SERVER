<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-02-27 04:49:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 8' at line 7 - Invalid query: SELECT *
FROM `business_extra` `o`
JOIN `business_extra_images` ON `o`.`id`=`business_extra_images`.`business_extra_id`
WHERE `expirydatetime` >= '2016-02-27 04:49:31'
AND `o`.`b_extra_master_id` = '1'
AND `isenable` = 1
AND o.cityid IN()
GROUP BY `o`.`id`
ORDER BY RAND()
 LIMIT 8
ERROR - 2016-02-27 05:11:19 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-27 05:26:29 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-27 05:26:47 --> Severity: Notice --> Undefined variable: categories /home/xercextx/public_html/iservice/application/models/Category_model.php 207
ERROR - 2016-02-27 05:27:57 --> Severity: Notice --> Undefined variable: categories /home/xercextx/public_html/iservice/application/models/Category_model.php 207
ERROR - 2016-02-27 05:34:44 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `bx`.*, `g`.`name` `imgname`, `g`.`datetime` `imgdatetime`, `g`.`size` `imgsize`, `g`.`width` `imgwidth`, `g`.`height` `imgheight`, `g`.`userid` `imguserid`
FROM `business_extra_master` `bx`
INNER JOIN `gallery` `g` ON `bx`.`imageid` = `g`.`id`
WHERE `catid` =0
AND `id` != 1
ERROR - 2016-02-27 05:34:53 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `bx`.*, `g`.`name` `imgname`, `g`.`datetime` `imgdatetime`, `g`.`size` `imgsize`, `g`.`width` `imgwidth`, `g`.`height` `imgheight`, `g`.`userid` `imguserid`
FROM `business_extra_master` `bx`
INNER JOIN `gallery` `g` ON `bx`.`imageid` = `g`.`id`
WHERE `catid` =0
AND `id` != 1
ERROR - 2016-02-27 05:35:47 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `bx`.*, `g`.`name` `imgname`, `g`.`datetime` `imgdatetime`, `g`.`size` `imgsize`, `g`.`width` `imgwidth`, `g`.`height` `imgheight`, `g`.`userid` `imguserid`
FROM `business_extra_master` `bx`
INNER JOIN `gallery` `g` ON `bx`.`imageid` = `g`.`id`
WHERE `catid` =0
AND `id` != 1
ERROR - 2016-02-27 05:37:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'notin(1)' at line 5 - Invalid query: SELECT `bx`.*, `g`.`name` `imgname`, `g`.`datetime` `imgdatetime`, `g`.`size` `imgsize`, `g`.`width` `imgwidth`, `g`.`height` `imgheight`, `g`.`userid` `imguserid`
FROM `business_extra_master` `bx`
INNER JOIN `gallery` `g` ON `bx`.`imageid` = `g`.`id`
WHERE `catid` =0
AND id notin(1)
ERROR - 2016-02-27 05:42:45 --> Severity: Error --> Call to a member function format() on a non-object /home/xercextx/public_html/iservice/application/models/Category_model.php 183
ERROR - 2016-02-27 05:42:51 --> Severity: Error --> Call to a member function format() on a non-object /home/xercextx/public_html/iservice/application/models/Category_model.php 183
ERROR - 2016-02-27 06:33:05 --> Severity: Compile Error --> Cannot redeclare Businessextra_model::getrandomAdvercat() /home/xercextx/public_html/iservice/application/models/Businessextra_model.php 172
ERROR - 2016-02-27 06:33:21 --> Severity: Compile Error --> Cannot redeclare Businessextra_model::getrandomAdvercat() /home/xercextx/public_html/iservice/application/models/Businessextra_model.php 172
ERROR - 2016-02-27 06:33:34 --> Severity: Compile Error --> Cannot redeclare Businessextra_model::getrandomAdvercat() /home/xercextx/public_html/iservice/application/models/Businessextra_model.php 172
ERROR - 2016-02-27 06:34:06 --> Severity: Compile Error --> Cannot redeclare Businessextra_model::getrandomAdvercat() /home/xercextx/public_html/iservice/application/models/Businessextra_model.php 172
ERROR - 2016-02-27 06:34:09 --> Severity: Compile Error --> Cannot redeclare Businessextra_model::getrandomAdvercat() /home/xercextx/public_html/iservice/application/models/Businessextra_model.php 172
ERROR - 2016-02-27 06:34:13 --> Severity: Compile Error --> Cannot redeclare Businessextra_model::getrandomAdvercat() /home/xercextx/public_html/iservice/application/models/Businessextra_model.php 172
ERROR - 2016-02-27 06:36:21 --> Severity: Compile Error --> Cannot redeclare Businessextra_model::getrandomAdvercat() /home/xercextx/public_html/iservice/application/models/Businessextra_model.php 172
ERROR - 2016-02-27 06:39:00 --> Severity: Warning --> Missing argument 4 for Businessextra_model::getaddver(), called in /home/xercextx/public_html/iservice/application/controllers/admin_requests/Businessextra.php on line 69 and defined /home/xercextx/public_html/iservice/application/models/Businessextra_model.php 36
ERROR - 2016-02-27 06:39:13 --> Severity: Warning --> Missing argument 4 for Businessextra_model::getaddver(), called in /home/xercextx/public_html/iservice/application/controllers/admin_requests/Businessextra.php on line 69 and defined /home/xercextx/public_html/iservice/application/models/Businessextra_model.php 36
