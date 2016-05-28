<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-02-23 04:53:30 --> 404 Page Not Found: Undefined/index
ERROR - 2016-02-23 08:41:55 --> Severity: error --> Exception: /home/xercextx/public_html/iservice/application/models/User_model.php exists, but doesn't declare class User_model /home/xercextx/public_html/iservice/system/core/Loader.php 306
ERROR - 2016-02-23 09:46:36 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `u`.*, GROUP_CONCAT( uimg.imageid SEPARATOR  '|' ) images
FROM `user` `u`
JOIN `user_image` `uimg` ON `uimg`.`userid`=`u`.`id`
WHERE `id` = '42'
ERROR - 2016-02-23 09:48:06 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `u`.*, GROUP_CONCAT( uimg.imageid SEPARATOR  '|' ) images
FROM `user` `u`
JOIN `user_image` `uimg` ON `uimg`.`userid`=`u`.`id`
WHERE `id` = '42'
ERROR - 2016-02-23 09:49:35 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `u`.*, GROUP_CONCAT( uimg.imageid SEPARATOR  '|' ) images
FROM `user` `u`
JOIN `user_image` `uimg` ON `uimg`.`userid`=`u`.`id`
WHERE `id` = '42'
ERROR - 2016-02-23 09:51:24 --> Query error: Column 'id' in where clause is ambiguous - Invalid query: SELECT `u`.*, GROUP_CONCAT( uimg.imageid SEPARATOR  '|' ) images
FROM `user` `u`
JOIN `user_image` `uimg` ON `uimg`.`userid`=`u`.`id`
WHERE `id` = '42'
ERROR - 2016-02-23 10:20:11 --> Query error: Unknown column 'c.city' in 'field list' - Invalid query: SELECT `u`.*, `c`.`city`, `c`.`pincode`, GROUP_CONCAT( uimg.imageid SEPARATOR  '|' ) images
FROM `user` `u`
LEFT JOIN `user_image` `uimg` ON `uimg`.`userid`=`u`.`id`
LEFT JOIN `city` `c` ON `c`.`id` = `u`.`cityid`
WHERE `u`.`id` = '42'
ERROR - 2016-02-23 10:21:54 --> Severity: error --> Exception: /home/xercextx/public_html/iservice/application/models/User_model.php exists, but doesn't declare class User_model /home/xercextx/public_html/iservice/system/core/Loader.php 306
ERROR - 2016-02-23 12:02:03 --> Query error: Unknown column 'sevices' in 'field list' - Invalid query: UPDATE `user` SET `catid` = '16', `firmname` = 'jwnsbhs', `firmcontact` = '6194946945', `imageid` = '521', `address` = 'hsbsbsbbshshbd sbsbsnsbsbbsb', `cityid` = '1', `ismerchant` = '1', `sevices` = 'nannansbdbhsbdbbxbsbsnbsnsjs\nhshsbdnhdnsbdjd\nnshsnhdhcnanabhdhdmbsbbsbsbsbbsnsnsna\nnsnnsnsnnsnsbbsbsbana\nnsbsbbsnnsbbsns'
WHERE `id` = '46'
ERROR - 2016-02-23 12:03:31 --> Query error: Unknown column 'sevices' in 'field list' - Invalid query: UPDATE `user` SET `catid` = '28', `firmname` = NULL, `firmcontact` = NULL, `imageid` = NULL, `address` = NULL, `cityid` = NULL, `ismerchant` = NULL, `sevices` = NULL
WHERE `id` = '5'
ERROR - 2016-02-23 12:03:55 --> Query error: Unknown column 'sevices' in 'field list' - Invalid query: UPDATE `user` SET `catid` = NULL, `firmname` = NULL, `firmcontact` = NULL, `imageid` = NULL, `address` = NULL, `cityid` = NULL, `ismerchant` = NULL, `sevices` = 'nannansbdbhsbdbbxbsbsnbsnsjs 02-23 17:32:05.260 31024-31024/com.example.xb_sushil.iservice I/SUSHIL: hshsbdnhdnsbdjd 02-23 17:32:05.260 31024-31024/com.example.xb_sushil.iservice I/SUSHIL: nshsnhdhcnanabhdhdmbsbbsbsbsbbsnsnsna 02-23 17:32:05.260 31024-31024/com.example.xb_sushil.iservice I/SUSHIL: nsnnsnsnnsnsbbsbsbana 02-23 17:32:05.260 31024-31024/com.example.xb_sushil.iservice I/SUSHIL: nsbsbbsnnsbbsns, address=hsbsbsbbshshbd sbsbsnsbsbbsb, profile_image=521, name=jwnsbhs, userid=46, images=[530, 529, 528], ismerchant=1, contact=6194946945, catid=16, cityid=1'
WHERE `id` IS NULL
ERROR - 2016-02-23 12:05:52 --> Query error: Unknown column 'sevices' in 'field list' - Invalid query: UPDATE `user` SET `catid` = '16', `firmname` = 'jwnsbhs', `firmcontact` = '6194946945', `imageid` = '521', `address` = 'hsbsbjhgdf', `cityid` = '1', `ismerchant` = '1', `sevices` = 'nannansbdbhsbdbbxbsbsnbsnsjs 02-23 17:32:05.260 31024-31024/com.example.xb_sushil.iservice I/SUSHIL: hshsbdnhdnsbdjd 02-23 17:32:05.260 31024-31024/com.example.xb_sushil.iservice I/SUSHIL: nshsnhdhcnanabhdhdmbsbbsbsbsbbsnsnsna 02-23 17:32:05.260 31024-31024/com.example.xb_sushil.iservice I/SUSHIL: nsnnsnsnnsnsbbsbsbana 02-23 17:32:05.260 31024-31024/com.example.xb_sushil.iservice I/SUSHIL: nsbsbbsnnsbbsns'
WHERE `id` = '46'
ERROR - 2016-02-23 12:06:32 --> Query error: Unknown column 'sevices' in 'field list' - Invalid query: UPDATE `user` SET `catid` = '16', `firmname` = 'jwnsbhs', `firmcontact` = '6194946945', `imageid` = '521', `address` = 'hsbsbjhgdf', `cityid` = '1', `ismerchant` = '1', `sevices` = 'nannansbdbhsbdbbxbsbsnbsnsjsnnsbbsns'
WHERE `id` = '46'
ERROR - 2016-02-23 12:09:55 --> Severity: Notice --> Undefined variable: bextraid /home/xercextx/public_html/iservice/application/models/User_model.php 421
ERROR - 2016-02-23 12:09:55 --> Query error: Column 'userid' cannot be null - Invalid query: INSERT INTO `user_image` (`userid`, `imageid`, `sort_order`) VALUES (NULL, 530, 1)
ERROR - 2016-02-23 12:13:53 --> Severity: Notice --> Undefined variable: bextraid /home/xercextx/public_html/iservice/application/models/User_model.php 421
ERROR - 2016-02-23 12:13:53 --> Query error: Column 'userid' cannot be null - Invalid query: INSERT INTO `user_image` (`userid`, `imageid`, `sort_order`) VALUES (NULL, 530, 1)
