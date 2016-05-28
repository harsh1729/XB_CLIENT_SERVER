<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-02-13 04:05:31 --> Severity: Notice --> Undefined variable: catid /home/xercextx/public_html/iservice/application/models/Controls_model.php 50
ERROR - 2016-02-13 04:05:31 --> Severity: Notice --> Undefined variable: screenid /home/xercextx/public_html/iservice/application/models/Controls_model.php 51
ERROR - 2016-02-13 04:05:31 --> Query error: Unknown column 'sortorder' in 'field list' - Invalid query: UPDATE `catcontrolmapping` SET `catid` = NULL, `screenid` = NULL, `sortorder` = 1
WHERE `id` = '3'
ERROR - 2016-02-13 04:08:22 --> Query error: Table 'xercextx_iservice.catcontrolmapping as a, controls' doesn't exist - Invalid query: UPDATE `catcontrolmapping as a, controls` as `b` SET `b`.`label` = 'abc', `b`.`sortorder` = 1, `b`.`placeholder` = 'def', `b`.`isrequired` = '1'
WHERE `a`.`id` = '3'
AND `a`.`controlsid` = `b`.`id`
ERROR - 2016-02-13 05:23:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `u`.`id`' at line 15 - Invalid query: SELECT group_concat( DISTINCT concat( p.id, ', ', `p`.`assetid`, ', ', `p`.`txntypeid`, ', ', `p`.`txnid`, ', ', `p`.`amount`, ', ', `mtxntyp`.`shortname`, ', ', mast.name ) ORDER BY p.txnid DESC, p.id SEPARATOR '|' ) as payments, group_concat( DISTINCT concat(t.id, ', ', `t`.`date`, ', ', t.description ) ORDER BY t.date DESC SEPARATOR '|' ) as transactions, group_concat( DISTINCT concat( gm.cityid, ', ', `c`.`name`, ', ', c.pincode ) SEPARATOR '|' ) as cities, group_concat( DISTINCT concat( cu.id, ', ', `cu`.`name`, ', ', cu.pincode ) SEPARATOR '|' ) as usercity, group_concat( DISTINCT concat( g.id, ', ', `g`.`name`, ', ', `g`.`datetime`, ', ', `g`.`size`, ', ', `g`.`width`, ', ', g.height ) SEPARATOR '|' ) as imagedata, `gu`.`gcmtextid` `gcmtextid`, `gu`.`imei`, `u`.`id` `userid`, `u`.`name`, `u`.`contact`, `u`.`email`, `u`.`username`, `u`.`address`, `u`.`datetime`, `u`.`catid`, `u`.`cityid`, `u`.`isactive`, `u`.`ispublished`, `u`.`ismerchant`, `u`.`firmname`, `u`.`firmcontact`, round(avg(r.rating), 1) rating
FROM `user` `u`
JOIN `gcmuser` `gu` ON `u`.`id` = `gu`.`userid`
LEFT JOIN `gcmusercitymapping` `gm` ON `gm`.`gcmid` = `gu`.`id`
LEFT JOIN `city` `c` ON `c`.`id` = `gm`.`cityid`
LEFT JOIN `city` `cu` ON `cu`.`id` = `u`.`cityid`
JOIN `transaction` `t` ON `t`.`userid` = `u`.`id`
JOIN `payment` `p` ON `p`.`txnid` = `t`.`id`
JOIN `master_txntype` `mtxntyp` ON `mtxntyp`.`id` = `p`.`txntypeid`
JOIN `master_asset` `mast` ON `mast`.`id` = `p`.`assetid`
LEFT JOIN `gallery` `g` ON `g`.`id` = `u`.`imageid`
JOIN `userrating` `r` ON `r`.`userid` = `u`.`id`
WHERE `p`.`assetid` = 2
AND `u`.`catid` = '14'
AND u.cityid IN()
GROUP BY `u`.`id`
ERROR - 2016-02-13 05:25:16 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-13 06:09:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `u`.`id`' at line 15 - Invalid query: SELECT group_concat( DISTINCT concat( p.id, ', ', `p`.`assetid`, ', ', `p`.`txntypeid`, ', ', `p`.`txnid`, ', ', `p`.`amount`, ', ', `mtxntyp`.`shortname`, ', ', mast.name ) ORDER BY p.txnid DESC, p.id SEPARATOR '|' ) as payments, group_concat( DISTINCT concat(t.id, ', ', `t`.`date`, ', ', t.description ) ORDER BY t.date DESC SEPARATOR '|' ) as transactions, group_concat( DISTINCT concat( gm.cityid, ', ', `c`.`name`, ', ', c.pincode ) SEPARATOR '|' ) as cities, group_concat( DISTINCT concat( cu.id, ', ', `cu`.`name`, ', ', cu.pincode ) SEPARATOR '|' ) as usercity, group_concat( DISTINCT concat( g.id, ', ', `g`.`name`, ', ', `g`.`datetime`, ', ', `g`.`size`, ', ', `g`.`width`, ', ', g.height ) SEPARATOR '|' ) as imagedata, `gu`.`gcmtextid` `gcmtextid`, `gu`.`imei`, `u`.`id` `userid`, `u`.`name`, `u`.`contact`, `u`.`email`, `u`.`username`, `u`.`address`, `u`.`datetime`, `u`.`catid`, `u`.`cityid`, `u`.`isactive`, `u`.`ispublished`, `u`.`ismerchant`, `u`.`firmname`, `u`.`firmcontact`, round(avg(r.rating), 1) rating
FROM `user` `u`
JOIN `gcmuser` `gu` ON `u`.`id` = `gu`.`userid`
LEFT JOIN `gcmusercitymapping` `gm` ON `gm`.`gcmid` = `gu`.`id`
LEFT JOIN `city` `c` ON `c`.`id` = `gm`.`cityid`
LEFT JOIN `city` `cu` ON `cu`.`id` = `u`.`cityid`
JOIN `transaction` `t` ON `t`.`userid` = `u`.`id`
JOIN `payment` `p` ON `p`.`txnid` = `t`.`id`
JOIN `master_txntype` `mtxntyp` ON `mtxntyp`.`id` = `p`.`txntypeid`
JOIN `master_asset` `mast` ON `mast`.`id` = `p`.`assetid`
LEFT JOIN `gallery` `g` ON `g`.`id` = `u`.`imageid`
JOIN `userrating` `r` ON `r`.`userid` = `u`.`id`
WHERE `p`.`assetid` = 2
AND `u`.`catid` = '14'
AND u.cityid IN()
GROUP BY `u`.`id`
ERROR - 2016-02-13 06:10:39 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-13 06:19:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `u`.`id`' at line 15 - Invalid query: SELECT group_concat( DISTINCT concat( p.id, ', ', `p`.`assetid`, ', ', `p`.`txntypeid`, ', ', `p`.`txnid`, ', ', `p`.`amount`, ', ', `mtxntyp`.`shortname`, ', ', mast.name ) ORDER BY p.txnid DESC, p.id SEPARATOR '|' ) as payments, group_concat( DISTINCT concat(t.id, ', ', `t`.`date`, ', ', t.description ) ORDER BY t.date DESC SEPARATOR '|' ) as transactions, group_concat( DISTINCT concat( gm.cityid, ', ', `c`.`name`, ', ', c.pincode ) SEPARATOR '|' ) as cities, group_concat( DISTINCT concat( cu.id, ', ', `cu`.`name`, ', ', cu.pincode ) SEPARATOR '|' ) as usercity, group_concat( DISTINCT concat( g.id, ', ', `g`.`name`, ', ', `g`.`datetime`, ', ', `g`.`size`, ', ', `g`.`width`, ', ', g.height ) SEPARATOR '|' ) as imagedata, `gu`.`gcmtextid` `gcmtextid`, `gu`.`imei`, `u`.`id` `userid`, `u`.`name`, `u`.`contact`, `u`.`email`, `u`.`username`, `u`.`address`, `u`.`datetime`, `u`.`catid`, `u`.`cityid`, `u`.`isactive`, `u`.`ispublished`, `u`.`ismerchant`, `u`.`firmname`, `u`.`firmcontact`, round(avg(r.rating), 1) rating
FROM `user` `u`
JOIN `gcmuser` `gu` ON `u`.`id` = `gu`.`userid`
LEFT JOIN `gcmusercitymapping` `gm` ON `gm`.`gcmid` = `gu`.`id`
LEFT JOIN `city` `c` ON `c`.`id` = `gm`.`cityid`
LEFT JOIN `city` `cu` ON `cu`.`id` = `u`.`cityid`
JOIN `transaction` `t` ON `t`.`userid` = `u`.`id`
JOIN `payment` `p` ON `p`.`txnid` = `t`.`id`
JOIN `master_txntype` `mtxntyp` ON `mtxntyp`.`id` = `p`.`txntypeid`
JOIN `master_asset` `mast` ON `mast`.`id` = `p`.`assetid`
LEFT JOIN `gallery` `g` ON `g`.`id` = `u`.`imageid`
JOIN `userrating` `r` ON `r`.`userid` = `u`.`id`
WHERE `p`.`assetid` = 2
AND `u`.`catid` = '12'
AND u.cityid IN()
GROUP BY `u`.`id`
ERROR - 2016-02-13 06:20:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `u`.`id`' at line 15 - Invalid query: SELECT group_concat( DISTINCT concat( p.id, ', ', `p`.`assetid`, ', ', `p`.`txntypeid`, ', ', `p`.`txnid`, ', ', `p`.`amount`, ', ', `mtxntyp`.`shortname`, ', ', mast.name ) ORDER BY p.txnid DESC, p.id SEPARATOR '|' ) as payments, group_concat( DISTINCT concat(t.id, ', ', `t`.`date`, ', ', t.description ) ORDER BY t.date DESC SEPARATOR '|' ) as transactions, group_concat( DISTINCT concat( gm.cityid, ', ', `c`.`name`, ', ', c.pincode ) SEPARATOR '|' ) as cities, group_concat( DISTINCT concat( cu.id, ', ', `cu`.`name`, ', ', cu.pincode ) SEPARATOR '|' ) as usercity, group_concat( DISTINCT concat( g.id, ', ', `g`.`name`, ', ', `g`.`datetime`, ', ', `g`.`size`, ', ', `g`.`width`, ', ', g.height ) SEPARATOR '|' ) as imagedata, `gu`.`gcmtextid` `gcmtextid`, `gu`.`imei`, `u`.`id` `userid`, `u`.`name`, `u`.`contact`, `u`.`email`, `u`.`username`, `u`.`address`, `u`.`datetime`, `u`.`catid`, `u`.`cityid`, `u`.`isactive`, `u`.`ispublished`, `u`.`ismerchant`, `u`.`firmname`, `u`.`firmcontact`, round(avg(r.rating), 1) rating
FROM `user` `u`
JOIN `gcmuser` `gu` ON `u`.`id` = `gu`.`userid`
LEFT JOIN `gcmusercitymapping` `gm` ON `gm`.`gcmid` = `gu`.`id`
LEFT JOIN `city` `c` ON `c`.`id` = `gm`.`cityid`
LEFT JOIN `city` `cu` ON `cu`.`id` = `u`.`cityid`
JOIN `transaction` `t` ON `t`.`userid` = `u`.`id`
JOIN `payment` `p` ON `p`.`txnid` = `t`.`id`
JOIN `master_txntype` `mtxntyp` ON `mtxntyp`.`id` = `p`.`txntypeid`
JOIN `master_asset` `mast` ON `mast`.`id` = `p`.`assetid`
LEFT JOIN `gallery` `g` ON `g`.`id` = `u`.`imageid`
JOIN `userrating` `r` ON `r`.`userid` = `u`.`id`
WHERE `p`.`assetid` = 2
AND `u`.`catid` = '14'
AND u.cityid IN()
GROUP BY `u`.`id`
ERROR - 2016-02-13 06:21:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `u`.`id`' at line 15 - Invalid query: SELECT group_concat( DISTINCT concat( p.id, ', ', `p`.`assetid`, ', ', `p`.`txntypeid`, ', ', `p`.`txnid`, ', ', `p`.`amount`, ', ', `mtxntyp`.`shortname`, ', ', mast.name ) ORDER BY p.txnid DESC, p.id SEPARATOR '|' ) as payments, group_concat( DISTINCT concat(t.id, ', ', `t`.`date`, ', ', t.description ) ORDER BY t.date DESC SEPARATOR '|' ) as transactions, group_concat( DISTINCT concat( gm.cityid, ', ', `c`.`name`, ', ', c.pincode ) SEPARATOR '|' ) as cities, group_concat( DISTINCT concat( cu.id, ', ', `cu`.`name`, ', ', cu.pincode ) SEPARATOR '|' ) as usercity, group_concat( DISTINCT concat( g.id, ', ', `g`.`name`, ', ', `g`.`datetime`, ', ', `g`.`size`, ', ', `g`.`width`, ', ', g.height ) SEPARATOR '|' ) as imagedata, `gu`.`gcmtextid` `gcmtextid`, `gu`.`imei`, `u`.`id` `userid`, `u`.`name`, `u`.`contact`, `u`.`email`, `u`.`username`, `u`.`address`, `u`.`datetime`, `u`.`catid`, `u`.`cityid`, `u`.`isactive`, `u`.`ispublished`, `u`.`ismerchant`, `u`.`firmname`, `u`.`firmcontact`, round(avg(r.rating), 1) rating
FROM `user` `u`
JOIN `gcmuser` `gu` ON `u`.`id` = `gu`.`userid`
LEFT JOIN `gcmusercitymapping` `gm` ON `gm`.`gcmid` = `gu`.`id`
LEFT JOIN `city` `c` ON `c`.`id` = `gm`.`cityid`
LEFT JOIN `city` `cu` ON `cu`.`id` = `u`.`cityid`
JOIN `transaction` `t` ON `t`.`userid` = `u`.`id`
JOIN `payment` `p` ON `p`.`txnid` = `t`.`id`
JOIN `master_txntype` `mtxntyp` ON `mtxntyp`.`id` = `p`.`txntypeid`
JOIN `master_asset` `mast` ON `mast`.`id` = `p`.`assetid`
LEFT JOIN `gallery` `g` ON `g`.`id` = `u`.`imageid`
JOIN `userrating` `r` ON `r`.`userid` = `u`.`id`
WHERE `p`.`assetid` = 2
AND `u`.`catid` = '14'
AND u.cityid IN()
GROUP BY `u`.`id`
ERROR - 2016-02-13 06:21:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `u`.`id`' at line 15 - Invalid query: SELECT group_concat( DISTINCT concat( p.id, ', ', `p`.`assetid`, ', ', `p`.`txntypeid`, ', ', `p`.`txnid`, ', ', `p`.`amount`, ', ', `mtxntyp`.`shortname`, ', ', mast.name ) ORDER BY p.txnid DESC, p.id SEPARATOR '|' ) as payments, group_concat( DISTINCT concat(t.id, ', ', `t`.`date`, ', ', t.description ) ORDER BY t.date DESC SEPARATOR '|' ) as transactions, group_concat( DISTINCT concat( gm.cityid, ', ', `c`.`name`, ', ', c.pincode ) SEPARATOR '|' ) as cities, group_concat( DISTINCT concat( cu.id, ', ', `cu`.`name`, ', ', cu.pincode ) SEPARATOR '|' ) as usercity, group_concat( DISTINCT concat( g.id, ', ', `g`.`name`, ', ', `g`.`datetime`, ', ', `g`.`size`, ', ', `g`.`width`, ', ', g.height ) SEPARATOR '|' ) as imagedata, `gu`.`gcmtextid` `gcmtextid`, `gu`.`imei`, `u`.`id` `userid`, `u`.`name`, `u`.`contact`, `u`.`email`, `u`.`username`, `u`.`address`, `u`.`datetime`, `u`.`catid`, `u`.`cityid`, `u`.`isactive`, `u`.`ispublished`, `u`.`ismerchant`, `u`.`firmname`, `u`.`firmcontact`, round(avg(r.rating), 1) rating
FROM `user` `u`
JOIN `gcmuser` `gu` ON `u`.`id` = `gu`.`userid`
LEFT JOIN `gcmusercitymapping` `gm` ON `gm`.`gcmid` = `gu`.`id`
LEFT JOIN `city` `c` ON `c`.`id` = `gm`.`cityid`
LEFT JOIN `city` `cu` ON `cu`.`id` = `u`.`cityid`
JOIN `transaction` `t` ON `t`.`userid` = `u`.`id`
JOIN `payment` `p` ON `p`.`txnid` = `t`.`id`
JOIN `master_txntype` `mtxntyp` ON `mtxntyp`.`id` = `p`.`txntypeid`
JOIN `master_asset` `mast` ON `mast`.`id` = `p`.`assetid`
LEFT JOIN `gallery` `g` ON `g`.`id` = `u`.`imageid`
JOIN `userrating` `r` ON `r`.`userid` = `u`.`id`
WHERE `p`.`assetid` = 2
AND `u`.`catid` = '15'
AND u.cityid IN()
GROUP BY `u`.`id`
ERROR - 2016-02-13 06:26:03 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '5'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 06:29:21 --> Query error: Duplicate entry 'sushil.solanki8' for key 'promocode' - Invalid query: INSERT INTO `user` (`name`, `contact`, `email`, `username`, `password`, `referredbyuserid`, `promocode`) VALUES ('sushil', '8875897798', 'susjshsh@gmail.com', 'sushil.solanki886', '6113e47408275abfbd5a75f0981ed1bd', 0, 'sushil.solanki88642b78')
ERROR - 2016-02-13 06:29:38 --> Query error: Duplicate entry 'sushil.solanki8' for key 'promocode' - Invalid query: INSERT INTO `user` (`name`, `contact`, `email`, `username`, `password`, `referredbyuserid`, `promocode`) VALUES ('sushil', '8875897798', 'susjshsh@gmail.com', 'sushil.solanki886', '6113e47408275abfbd5a75f0981ed1bd', 0, 'sushil.solanki88642b78')
ERROR - 2016-02-13 06:33:40 --> Severity: Parsing Error --> syntax error, unexpected '=' /home/xercextx/public_html/iservice/application/controllers/client_requests/User.php 54
ERROR - 2016-02-13 06:34:15 --> Severity: Parsing Error --> syntax error, unexpected '=' /home/xercextx/public_html/iservice/application/controllers/client_requests/User.php 54
ERROR - 2016-02-13 06:37:47 --> Severity: Parsing Error --> syntax error, unexpected '=' /home/xercextx/public_html/iservice/application/controllers/client_requests/User.php 54
ERROR - 2016-02-13 06:40:01 --> Severity: Parsing Error --> syntax error, unexpected '=' /home/xercextx/public_html/iservice/application/controllers/client_requests/User.php 54
ERROR - 2016-02-13 06:56:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `u`.`id`' at line 15 - Invalid query: SELECT group_concat( DISTINCT concat( p.id, ', ', `p`.`assetid`, ', ', `p`.`txntypeid`, ', ', `p`.`txnid`, ', ', `p`.`amount`, ', ', `mtxntyp`.`shortname`, ', ', mast.name ) ORDER BY p.txnid DESC, p.id SEPARATOR '|' ) as payments, group_concat( DISTINCT concat(t.id, ', ', `t`.`date`, ', ', t.description ) ORDER BY t.date DESC SEPARATOR '|' ) as transactions, group_concat( DISTINCT concat( gm.cityid, ', ', `c`.`name`, ', ', c.pincode ) SEPARATOR '|' ) as cities, group_concat( DISTINCT concat( cu.id, ', ', `cu`.`name`, ', ', cu.pincode ) SEPARATOR '|' ) as usercity, group_concat( DISTINCT concat( g.id, ', ', `g`.`name`, ', ', `g`.`datetime`, ', ', `g`.`size`, ', ', `g`.`width`, ', ', g.height ) SEPARATOR '|' ) as imagedata, `gu`.`gcmtextid` `gcmtextid`, `gu`.`imei`, `u`.`id` `userid`, `u`.`name`, `u`.`contact`, `u`.`email`, `u`.`username`, `u`.`address`, `u`.`datetime`, `u`.`catid`, `u`.`cityid`, `u`.`isactive`, `u`.`ispublished`, `u`.`ismerchant`, `u`.`firmname`, `u`.`firmcontact`, round(avg(r.rating), 1) rating
FROM `user` `u`
JOIN `gcmuser` `gu` ON `u`.`id` = `gu`.`userid`
LEFT JOIN `gcmusercitymapping` `gm` ON `gm`.`gcmid` = `gu`.`id`
LEFT JOIN `city` `c` ON `c`.`id` = `gm`.`cityid`
LEFT JOIN `city` `cu` ON `cu`.`id` = `u`.`cityid`
JOIN `transaction` `t` ON `t`.`userid` = `u`.`id`
JOIN `payment` `p` ON `p`.`txnid` = `t`.`id`
JOIN `master_txntype` `mtxntyp` ON `mtxntyp`.`id` = `p`.`txntypeid`
JOIN `master_asset` `mast` ON `mast`.`id` = `p`.`assetid`
LEFT JOIN `gallery` `g` ON `g`.`id` = `u`.`imageid`
JOIN `userrating` `r` ON `r`.`userid` = `u`.`id`
WHERE `p`.`assetid` = 2
AND `u`.`catid` = '12'
AND u.cityid IN()
GROUP BY `u`.`id`
ERROR - 2016-02-13 06:57:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `u`.`id`' at line 15 - Invalid query: SELECT group_concat( DISTINCT concat( p.id, ', ', `p`.`assetid`, ', ', `p`.`txntypeid`, ', ', `p`.`txnid`, ', ', `p`.`amount`, ', ', `mtxntyp`.`shortname`, ', ', mast.name ) ORDER BY p.txnid DESC, p.id SEPARATOR '|' ) as payments, group_concat( DISTINCT concat(t.id, ', ', `t`.`date`, ', ', t.description ) ORDER BY t.date DESC SEPARATOR '|' ) as transactions, group_concat( DISTINCT concat( gm.cityid, ', ', `c`.`name`, ', ', c.pincode ) SEPARATOR '|' ) as cities, group_concat( DISTINCT concat( cu.id, ', ', `cu`.`name`, ', ', cu.pincode ) SEPARATOR '|' ) as usercity, group_concat( DISTINCT concat( g.id, ', ', `g`.`name`, ', ', `g`.`datetime`, ', ', `g`.`size`, ', ', `g`.`width`, ', ', g.height ) SEPARATOR '|' ) as imagedata, `gu`.`gcmtextid` `gcmtextid`, `gu`.`imei`, `u`.`id` `userid`, `u`.`name`, `u`.`contact`, `u`.`email`, `u`.`username`, `u`.`address`, `u`.`datetime`, `u`.`catid`, `u`.`cityid`, `u`.`isactive`, `u`.`ispublished`, `u`.`ismerchant`, `u`.`firmname`, `u`.`firmcontact`, round(avg(r.rating), 1) rating
FROM `user` `u`
JOIN `gcmuser` `gu` ON `u`.`id` = `gu`.`userid`
LEFT JOIN `gcmusercitymapping` `gm` ON `gm`.`gcmid` = `gu`.`id`
LEFT JOIN `city` `c` ON `c`.`id` = `gm`.`cityid`
LEFT JOIN `city` `cu` ON `cu`.`id` = `u`.`cityid`
JOIN `transaction` `t` ON `t`.`userid` = `u`.`id`
JOIN `payment` `p` ON `p`.`txnid` = `t`.`id`
JOIN `master_txntype` `mtxntyp` ON `mtxntyp`.`id` = `p`.`txntypeid`
JOIN `master_asset` `mast` ON `mast`.`id` = `p`.`assetid`
LEFT JOIN `gallery` `g` ON `g`.`id` = `u`.`imageid`
JOIN `userrating` `r` ON `r`.`userid` = `u`.`id`
WHERE `p`.`assetid` = 2
AND `u`.`catid` = '12'
AND u.cityid IN()
GROUP BY `u`.`id`
ERROR - 2016-02-13 08:01:31 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 08:14:52 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 08:15:32 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 08:16:04 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 08:16:08 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 08:16:16 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 08:19:42 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 234
ERROR - 2016-02-13 08:19:42 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 235
ERROR - 2016-02-13 08:19:42 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 236
ERROR - 2016-02-13 08:19:42 --> Severity: Warning --> getimagesize(): Filename cannot be empty /home/xercextx/public_html/iservice/application/models/Gallery_model.php 236
ERROR - 2016-02-13 08:19:42 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 240
ERROR - 2016-02-13 08:19:42 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 245
ERROR - 2016-02-13 08:19:42 --> Severity: Notice --> Undefined index:  /home/xercextx/public_html/iservice/application/models/Gallery_model.php 258
ERROR - 2016-02-13 08:19:42 --> Severity: Warning --> imagecreatefromgif(): Filename cannot be empty /home/xercextx/public_html/iservice/application/models/Gallery_model.php 258
ERROR - 2016-02-13 08:19:42 --> Severity: Warning --> Division by zero /home/xercextx/public_html/iservice/application/models/Gallery_model.php 264
ERROR - 2016-02-13 08:19:42 --> Severity: Warning --> imagecreatetruecolor(): Invalid image dimensions /home/xercextx/public_html/iservice/application/models/Gallery_model.php 265
ERROR - 2016-02-13 08:19:42 --> Severity: Warning --> imagealphablending() expects parameter 1 to be resource, boolean given /home/xercextx/public_html/iservice/application/models/Gallery_model.php 267
ERROR - 2016-02-13 08:19:42 --> Severity: Warning --> imagesavealpha() expects parameter 1 to be resource, boolean given /home/xercextx/public_html/iservice/application/models/Gallery_model.php 268
ERROR - 2016-02-13 08:19:42 --> Severity: Warning --> imagecopyresampled() expects parameter 1 to be resource, boolean given /home/xercextx/public_html/iservice/application/models/Gallery_model.php 271
ERROR - 2016-02-13 08:19:42 --> Severity: Warning --> imagealphablending() expects parameter 1 to be resource, boolean given /home/xercextx/public_html/iservice/application/models/Gallery_model.php 277
ERROR - 2016-02-13 08:19:42 --> Severity: Warning --> imagepng() expects parameter 1 to be resource, boolean given /home/xercextx/public_html/iservice/application/models/Gallery_model.php 284
ERROR - 2016-02-13 08:19:42 --> Severity: Warning --> imagedestroy() expects parameter 1 to be resource, boolean given /home/xercextx/public_html/iservice/application/models/Gallery_model.php 286
ERROR - 2016-02-13 08:19:42 --> Severity: Warning --> imagedestroy() expects parameter 1 to be resource, boolean given /home/xercextx/public_html/iservice/application/models/Gallery_model.php 287
ERROR - 2016-02-13 08:19:42 --> Query error: Column 'size' cannot be null - Invalid query: INSERT INTO `gallery` (`name`, `datetime`, `size`, `width`, `height`, `userid`) VALUES ('14553515821455351730.', '2016-02-13 08:19:42', NULL, NULL, NULL, -1)
ERROR - 2016-02-13 08:19:42 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /home/xercextx/public_html/iservice/system/core/Exceptions.php:272) /home/xercextx/public_html/iservice/system/core/Common.php 568
ERROR - 2016-02-13 08:21:04 --> Query error: Unknown column 'catcontrolmappingid' in 'where clause' - Invalid query: SELECT *
FROM `catcontroluservalue`
WHERE `userid` = '32'
AND `catcontrolmappingid` = '3'
ERROR - 2016-02-13 08:37:14 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 08:37:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `u`.`id`' at line 15 - Invalid query: SELECT group_concat( DISTINCT concat( p.id, ', ', `p`.`assetid`, ', ', `p`.`txntypeid`, ', ', `p`.`txnid`, ', ', `p`.`amount`, ', ', `mtxntyp`.`shortname`, ', ', mast.name ) ORDER BY p.txnid DESC, p.id SEPARATOR '|' ) as payments, group_concat( DISTINCT concat(t.id, ', ', `t`.`date`, ', ', t.description ) ORDER BY t.date DESC SEPARATOR '|' ) as transactions, group_concat( DISTINCT concat( gm.cityid, ', ', `c`.`name`, ', ', c.pincode ) SEPARATOR '|' ) as cities, group_concat( DISTINCT concat( cu.id, ', ', `cu`.`name`, ', ', cu.pincode ) SEPARATOR '|' ) as usercity, group_concat( DISTINCT concat( g.id, ', ', `g`.`name`, ', ', `g`.`datetime`, ', ', `g`.`size`, ', ', `g`.`width`, ', ', g.height ) SEPARATOR '|' ) as imagedata, `gu`.`gcmtextid` `gcmtextid`, `gu`.`imei`, `u`.`id` `userid`, `u`.`name`, `u`.`contact`, `u`.`email`, `u`.`username`, `u`.`address`, `u`.`datetime`, `u`.`catid`, `u`.`cityid`, `u`.`isactive`, `u`.`ispublished`, `u`.`ismerchant`, `u`.`firmname`, `u`.`firmcontact`, round(avg(r.rating), 1) rating
FROM `user` `u`
JOIN `gcmuser` `gu` ON `u`.`id` = `gu`.`userid`
LEFT JOIN `gcmusercitymapping` `gm` ON `gm`.`gcmid` = `gu`.`id`
LEFT JOIN `city` `c` ON `c`.`id` = `gm`.`cityid`
LEFT JOIN `city` `cu` ON `cu`.`id` = `u`.`cityid`
JOIN `transaction` `t` ON `t`.`userid` = `u`.`id`
JOIN `payment` `p` ON `p`.`txnid` = `t`.`id`
JOIN `master_txntype` `mtxntyp` ON `mtxntyp`.`id` = `p`.`txntypeid`
JOIN `master_asset` `mast` ON `mast`.`id` = `p`.`assetid`
LEFT JOIN `gallery` `g` ON `g`.`id` = `u`.`imageid`
JOIN `userrating` `r` ON `r`.`userid` = `u`.`id`
WHERE `p`.`assetid` = 2
AND `u`.`catid` = '15'
AND u.cityid IN()
GROUP BY `u`.`id`
ERROR - 2016-02-13 08:37:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `u`.`id`' at line 15 - Invalid query: SELECT group_concat( DISTINCT concat( p.id, ', ', `p`.`assetid`, ', ', `p`.`txntypeid`, ', ', `p`.`txnid`, ', ', `p`.`amount`, ', ', `mtxntyp`.`shortname`, ', ', mast.name ) ORDER BY p.txnid DESC, p.id SEPARATOR '|' ) as payments, group_concat( DISTINCT concat(t.id, ', ', `t`.`date`, ', ', t.description ) ORDER BY t.date DESC SEPARATOR '|' ) as transactions, group_concat( DISTINCT concat( gm.cityid, ', ', `c`.`name`, ', ', c.pincode ) SEPARATOR '|' ) as cities, group_concat( DISTINCT concat( cu.id, ', ', `cu`.`name`, ', ', cu.pincode ) SEPARATOR '|' ) as usercity, group_concat( DISTINCT concat( g.id, ', ', `g`.`name`, ', ', `g`.`datetime`, ', ', `g`.`size`, ', ', `g`.`width`, ', ', g.height ) SEPARATOR '|' ) as imagedata, `gu`.`gcmtextid` `gcmtextid`, `gu`.`imei`, `u`.`id` `userid`, `u`.`name`, `u`.`contact`, `u`.`email`, `u`.`username`, `u`.`address`, `u`.`datetime`, `u`.`catid`, `u`.`cityid`, `u`.`isactive`, `u`.`ispublished`, `u`.`ismerchant`, `u`.`firmname`, `u`.`firmcontact`, round(avg(r.rating), 1) rating
FROM `user` `u`
JOIN `gcmuser` `gu` ON `u`.`id` = `gu`.`userid`
LEFT JOIN `gcmusercitymapping` `gm` ON `gm`.`gcmid` = `gu`.`id`
LEFT JOIN `city` `c` ON `c`.`id` = `gm`.`cityid`
LEFT JOIN `city` `cu` ON `cu`.`id` = `u`.`cityid`
JOIN `transaction` `t` ON `t`.`userid` = `u`.`id`
JOIN `payment` `p` ON `p`.`txnid` = `t`.`id`
JOIN `master_txntype` `mtxntyp` ON `mtxntyp`.`id` = `p`.`txntypeid`
JOIN `master_asset` `mast` ON `mast`.`id` = `p`.`assetid`
LEFT JOIN `gallery` `g` ON `g`.`id` = `u`.`imageid`
JOIN `userrating` `r` ON `r`.`userid` = `u`.`id`
WHERE `p`.`assetid` = 2
AND `u`.`catid` = '15'
AND u.cityid IN()
GROUP BY `u`.`id`
ERROR - 2016-02-13 08:37:29 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 08:38:52 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 08:42:25 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 08:42:43 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 08:42:58 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 08:43:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `u`.`id`' at line 15 - Invalid query: SELECT group_concat( DISTINCT concat( p.id, ', ', `p`.`assetid`, ', ', `p`.`txntypeid`, ', ', `p`.`txnid`, ', ', `p`.`amount`, ', ', `mtxntyp`.`shortname`, ', ', mast.name ) ORDER BY p.txnid DESC, p.id SEPARATOR '|' ) as payments, group_concat( DISTINCT concat(t.id, ', ', `t`.`date`, ', ', t.description ) ORDER BY t.date DESC SEPARATOR '|' ) as transactions, group_concat( DISTINCT concat( gm.cityid, ', ', `c`.`name`, ', ', c.pincode ) SEPARATOR '|' ) as cities, group_concat( DISTINCT concat( cu.id, ', ', `cu`.`name`, ', ', cu.pincode ) SEPARATOR '|' ) as usercity, group_concat( DISTINCT concat( g.id, ', ', `g`.`name`, ', ', `g`.`datetime`, ', ', `g`.`size`, ', ', `g`.`width`, ', ', g.height ) SEPARATOR '|' ) as imagedata, `gu`.`gcmtextid` `gcmtextid`, `gu`.`imei`, `u`.`id` `userid`, `u`.`name`, `u`.`contact`, `u`.`email`, `u`.`username`, `u`.`address`, `u`.`datetime`, `u`.`catid`, `u`.`cityid`, `u`.`isactive`, `u`.`ispublished`, `u`.`ismerchant`, `u`.`firmname`, `u`.`firmcontact`, round(avg(r.rating), 1) rating
FROM `user` `u`
JOIN `gcmuser` `gu` ON `u`.`id` = `gu`.`userid`
LEFT JOIN `gcmusercitymapping` `gm` ON `gm`.`gcmid` = `gu`.`id`
LEFT JOIN `city` `c` ON `c`.`id` = `gm`.`cityid`
LEFT JOIN `city` `cu` ON `cu`.`id` = `u`.`cityid`
JOIN `transaction` `t` ON `t`.`userid` = `u`.`id`
JOIN `payment` `p` ON `p`.`txnid` = `t`.`id`
JOIN `master_txntype` `mtxntyp` ON `mtxntyp`.`id` = `p`.`txntypeid`
JOIN `master_asset` `mast` ON `mast`.`id` = `p`.`assetid`
LEFT JOIN `gallery` `g` ON `g`.`id` = `u`.`imageid`
JOIN `userrating` `r` ON `r`.`userid` = `u`.`id`
WHERE `p`.`assetid` = 2
AND `u`.`catid` = '29'
AND u.cityid IN()
GROUP BY `u`.`id`
ERROR - 2016-02-13 08:43:22 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 08:43:26 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `u`.`id`' at line 15 - Invalid query: SELECT group_concat( DISTINCT concat( p.id, ', ', `p`.`assetid`, ', ', `p`.`txntypeid`, ', ', `p`.`txnid`, ', ', `p`.`amount`, ', ', `mtxntyp`.`shortname`, ', ', mast.name ) ORDER BY p.txnid DESC, p.id SEPARATOR '|' ) as payments, group_concat( DISTINCT concat(t.id, ', ', `t`.`date`, ', ', t.description ) ORDER BY t.date DESC SEPARATOR '|' ) as transactions, group_concat( DISTINCT concat( gm.cityid, ', ', `c`.`name`, ', ', c.pincode ) SEPARATOR '|' ) as cities, group_concat( DISTINCT concat( cu.id, ', ', `cu`.`name`, ', ', cu.pincode ) SEPARATOR '|' ) as usercity, group_concat( DISTINCT concat( g.id, ', ', `g`.`name`, ', ', `g`.`datetime`, ', ', `g`.`size`, ', ', `g`.`width`, ', ', g.height ) SEPARATOR '|' ) as imagedata, `gu`.`gcmtextid` `gcmtextid`, `gu`.`imei`, `u`.`id` `userid`, `u`.`name`, `u`.`contact`, `u`.`email`, `u`.`username`, `u`.`address`, `u`.`datetime`, `u`.`catid`, `u`.`cityid`, `u`.`isactive`, `u`.`ispublished`, `u`.`ismerchant`, `u`.`firmname`, `u`.`firmcontact`, round(avg(r.rating), 1) rating
FROM `user` `u`
JOIN `gcmuser` `gu` ON `u`.`id` = `gu`.`userid`
LEFT JOIN `gcmusercitymapping` `gm` ON `gm`.`gcmid` = `gu`.`id`
LEFT JOIN `city` `c` ON `c`.`id` = `gm`.`cityid`
LEFT JOIN `city` `cu` ON `cu`.`id` = `u`.`cityid`
JOIN `transaction` `t` ON `t`.`userid` = `u`.`id`
JOIN `payment` `p` ON `p`.`txnid` = `t`.`id`
JOIN `master_txntype` `mtxntyp` ON `mtxntyp`.`id` = `p`.`txntypeid`
JOIN `master_asset` `mast` ON `mast`.`id` = `p`.`assetid`
LEFT JOIN `gallery` `g` ON `g`.`id` = `u`.`imageid`
JOIN `userrating` `r` ON `r`.`userid` = `u`.`id`
WHERE `p`.`assetid` = 2
AND `u`.`catid` = '15'
AND u.cityid IN()
GROUP BY `u`.`id`
ERROR - 2016-02-13 08:43:40 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 08:43:53 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 08:44:03 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 08:44:17 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 08:44:20 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 08:44:22 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 08:44:25 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 08:44:27 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 08:44:35 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 08:44:39 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 08:44:48 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 08:44:53 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 08:44:56 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:40:29 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:40:36 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `u`.`id`' at line 15 - Invalid query: SELECT group_concat( DISTINCT concat( p.id, ', ', `p`.`assetid`, ', ', `p`.`txntypeid`, ', ', `p`.`txnid`, ', ', `p`.`amount`, ', ', `mtxntyp`.`shortname`, ', ', mast.name ) ORDER BY p.txnid DESC, p.id SEPARATOR '|' ) as payments, group_concat( DISTINCT concat(t.id, ', ', `t`.`date`, ', ', t.description ) ORDER BY t.date DESC SEPARATOR '|' ) as transactions, group_concat( DISTINCT concat( gm.cityid, ', ', `c`.`name`, ', ', c.pincode ) SEPARATOR '|' ) as cities, group_concat( DISTINCT concat( cu.id, ', ', `cu`.`name`, ', ', cu.pincode ) SEPARATOR '|' ) as usercity, group_concat( DISTINCT concat( g.id, ', ', `g`.`name`, ', ', `g`.`datetime`, ', ', `g`.`size`, ', ', `g`.`width`, ', ', g.height ) SEPARATOR '|' ) as imagedata, `gu`.`gcmtextid` `gcmtextid`, `gu`.`imei`, `u`.`id` `userid`, `u`.`name`, `u`.`contact`, `u`.`email`, `u`.`username`, `u`.`address`, `u`.`datetime`, `u`.`catid`, `u`.`cityid`, `u`.`isactive`, `u`.`ispublished`, `u`.`ismerchant`, `u`.`firmname`, `u`.`firmcontact`, round(avg(r.rating), 1) rating
FROM `user` `u`
JOIN `gcmuser` `gu` ON `u`.`id` = `gu`.`userid`
LEFT JOIN `gcmusercitymapping` `gm` ON `gm`.`gcmid` = `gu`.`id`
LEFT JOIN `city` `c` ON `c`.`id` = `gm`.`cityid`
LEFT JOIN `city` `cu` ON `cu`.`id` = `u`.`cityid`
JOIN `transaction` `t` ON `t`.`userid` = `u`.`id`
JOIN `payment` `p` ON `p`.`txnid` = `t`.`id`
JOIN `master_txntype` `mtxntyp` ON `mtxntyp`.`id` = `p`.`txntypeid`
JOIN `master_asset` `mast` ON `mast`.`id` = `p`.`assetid`
LEFT JOIN `gallery` `g` ON `g`.`id` = `u`.`imageid`
JOIN `userrating` `r` ON `r`.`userid` = `u`.`id`
WHERE `p`.`assetid` = 2
AND `u`.`catid` = '15'
AND u.cityid IN()
GROUP BY `u`.`id`
ERROR - 2016-02-13 10:40:41 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:41:05 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:41:09 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:41:14 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:41:32 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:41:40 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:41:52 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:42:01 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:42:23 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:42:36 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:42:45 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:42:53 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:42:58 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:43:04 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:43:10 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:43:10 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:44:16 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:46:55 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:47:10 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:47:23 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:47:28 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:47:45 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:51:38 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:55:02 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:55:21 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:55:51 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:56:03 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:56:09 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:59:27 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 10:59:35 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 11:00:00 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 11:00:07 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 11:00:17 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 11:01:23 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '26'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 11:01:31 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 11:03:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `u`.`id`' at line 15 - Invalid query: SELECT group_concat( DISTINCT concat( p.id, ', ', `p`.`assetid`, ', ', `p`.`txntypeid`, ', ', `p`.`txnid`, ', ', `p`.`amount`, ', ', `mtxntyp`.`shortname`, ', ', mast.name ) ORDER BY p.txnid DESC, p.id SEPARATOR '|' ) as payments, group_concat( DISTINCT concat(t.id, ', ', `t`.`date`, ', ', t.description ) ORDER BY t.date DESC SEPARATOR '|' ) as transactions, group_concat( DISTINCT concat( gm.cityid, ', ', `c`.`name`, ', ', c.pincode ) SEPARATOR '|' ) as cities, group_concat( DISTINCT concat( cu.id, ', ', `cu`.`name`, ', ', cu.pincode ) SEPARATOR '|' ) as usercity, group_concat( DISTINCT concat( g.id, ', ', `g`.`name`, ', ', `g`.`datetime`, ', ', `g`.`size`, ', ', `g`.`width`, ', ', g.height ) SEPARATOR '|' ) as imagedata, `gu`.`gcmtextid` `gcmtextid`, `gu`.`imei`, `u`.`id` `userid`, `u`.`name`, `u`.`contact`, `u`.`email`, `u`.`username`, `u`.`address`, `u`.`datetime`, `u`.`catid`, `u`.`cityid`, `u`.`isactive`, `u`.`ispublished`, `u`.`ismerchant`, `u`.`firmname`, `u`.`firmcontact`, round(avg(r.rating), 1) rating
FROM `user` `u`
JOIN `gcmuser` `gu` ON `u`.`id` = `gu`.`userid`
LEFT JOIN `gcmusercitymapping` `gm` ON `gm`.`gcmid` = `gu`.`id`
LEFT JOIN `city` `c` ON `c`.`id` = `gm`.`cityid`
LEFT JOIN `city` `cu` ON `cu`.`id` = `u`.`cityid`
JOIN `transaction` `t` ON `t`.`userid` = `u`.`id`
JOIN `payment` `p` ON `p`.`txnid` = `t`.`id`
JOIN `master_txntype` `mtxntyp` ON `mtxntyp`.`id` = `p`.`txntypeid`
JOIN `master_asset` `mast` ON `mast`.`id` = `p`.`assetid`
LEFT JOIN `gallery` `g` ON `g`.`id` = `u`.`imageid`
JOIN `userrating` `r` ON `r`.`userid` = `u`.`id`
WHERE `p`.`assetid` = 2
AND `u`.`catid` = '2'
AND u.cityid IN()
GROUP BY `u`.`id`
ERROR - 2016-02-13 11:03:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `u`.`id`' at line 15 - Invalid query: SELECT group_concat( DISTINCT concat( p.id, ', ', `p`.`assetid`, ', ', `p`.`txntypeid`, ', ', `p`.`txnid`, ', ', `p`.`amount`, ', ', `mtxntyp`.`shortname`, ', ', mast.name ) ORDER BY p.txnid DESC, p.id SEPARATOR '|' ) as payments, group_concat( DISTINCT concat(t.id, ', ', `t`.`date`, ', ', t.description ) ORDER BY t.date DESC SEPARATOR '|' ) as transactions, group_concat( DISTINCT concat( gm.cityid, ', ', `c`.`name`, ', ', c.pincode ) SEPARATOR '|' ) as cities, group_concat( DISTINCT concat( cu.id, ', ', `cu`.`name`, ', ', cu.pincode ) SEPARATOR '|' ) as usercity, group_concat( DISTINCT concat( g.id, ', ', `g`.`name`, ', ', `g`.`datetime`, ', ', `g`.`size`, ', ', `g`.`width`, ', ', g.height ) SEPARATOR '|' ) as imagedata, `gu`.`gcmtextid` `gcmtextid`, `gu`.`imei`, `u`.`id` `userid`, `u`.`name`, `u`.`contact`, `u`.`email`, `u`.`username`, `u`.`address`, `u`.`datetime`, `u`.`catid`, `u`.`cityid`, `u`.`isactive`, `u`.`ispublished`, `u`.`ismerchant`, `u`.`firmname`, `u`.`firmcontact`, round(avg(r.rating), 1) rating
FROM `user` `u`
JOIN `gcmuser` `gu` ON `u`.`id` = `gu`.`userid`
LEFT JOIN `gcmusercitymapping` `gm` ON `gm`.`gcmid` = `gu`.`id`
LEFT JOIN `city` `c` ON `c`.`id` = `gm`.`cityid`
LEFT JOIN `city` `cu` ON `cu`.`id` = `u`.`cityid`
JOIN `transaction` `t` ON `t`.`userid` = `u`.`id`
JOIN `payment` `p` ON `p`.`txnid` = `t`.`id`
JOIN `master_txntype` `mtxntyp` ON `mtxntyp`.`id` = `p`.`txntypeid`
JOIN `master_asset` `mast` ON `mast`.`id` = `p`.`assetid`
LEFT JOIN `gallery` `g` ON `g`.`id` = `u`.`imageid`
JOIN `userrating` `r` ON `r`.`userid` = `u`.`id`
WHERE `p`.`assetid` = 2
AND `u`.`catid` = '15'
AND u.cityid IN()
GROUP BY `u`.`id`
ERROR - 2016-02-13 11:12:42 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 11:21:49 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 11:22:06 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 11:24:18 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 11:43:28 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 11:45:07 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 11:45:35 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 11:45:52 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 11:46:55 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 11:47:40 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 12:11:25 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 12:12:38 --> Severity: Warning --> Missing argument 8 for Businessextra_model::add(), called in /home/xercextx/public_html/iservice/application/controllers/admin_requests/Businessextra.php on line 37 and defined /home/xercextx/public_html/iservice/application/models/Businessextra_model.php 6
ERROR - 2016-02-13 12:12:38 --> Severity: Notice --> Undefined variable: cityid /home/xercextx/public_html/iservice/application/models/Businessextra_model.php 17
ERROR - 2016-02-13 12:12:38 --> Query error: Column 'cityid' cannot be null - Invalid query: INSERT INTO `business_extra` (`userid`, `b_extra_master_id`, `heading`, `content`, `catid`, `publishdatetime`, `expirydatetime`, `cityid`) VALUES ('1', '1', '', 'cfdghdfg', '2', '2016-02-13 12:12:38', '2016-02-23 12:12:38', NULL)
ERROR - 2016-02-13 12:14:10 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 12:14:11 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 12:14:24 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 12:14:32 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 12:15:12 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 12:15:28 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 12:16:31 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 12:16:35 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 12:16:52 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 12:18:05 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 12:47:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
AND `ismerchant` = '1'
AND `isadmin` = '0'' at line 4 - Invalid query: SELECT *
FROM `user`
WHERE `catid` = '28'
AND u.cityid IN()
AND `ismerchant` = '1'
AND `isadmin` = '0'
ERROR - 2016-02-13 12:49:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
AND `ismerchant` = '1'
AND `isadmin` = '0'' at line 4 - Invalid query: SELECT *
FROM `user`
WHERE `catid` = '15'
AND cityid IN()
AND `ismerchant` = '1'
AND `isadmin` = '0'
ERROR - 2016-02-13 12:52:20 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:05:55 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:06:00 --> Severity: Notice --> Undefined property: Category::$gcmuser_model /home/xercextx/public_html/iservice/application/controllers/client_requests/Category.php 59
ERROR - 2016-02-13 13:06:00 --> Severity: Error --> Call to a member function getgcmuserid() on a non-object /home/xercextx/public_html/iservice/application/controllers/client_requests/Category.php 59
ERROR - 2016-02-13 13:06:15 --> Severity: Notice --> Undefined property: Category::$gcmuser_model /home/xercextx/public_html/iservice/application/controllers/client_requests/Category.php 59
ERROR - 2016-02-13 13:06:15 --> Severity: Error --> Call to a member function getgcmuserid() on a non-object /home/xercextx/public_html/iservice/application/controllers/client_requests/Category.php 59
ERROR - 2016-02-13 13:06:22 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:06:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')
GROUP BY `u`.`id`' at line 15 - Invalid query: SELECT group_concat( DISTINCT concat( p.id, ', ', `p`.`assetid`, ', ', `p`.`txntypeid`, ', ', `p`.`txnid`, ', ', `p`.`amount`, ', ', `mtxntyp`.`shortname`, ', ', mast.name ) ORDER BY p.txnid DESC, p.id SEPARATOR '|' ) as payments, group_concat( DISTINCT concat(t.id, ', ', `t`.`date`, ', ', t.description ) ORDER BY t.date DESC SEPARATOR '|' ) as transactions, group_concat( DISTINCT concat( gm.cityid, ', ', `c`.`name`, ', ', c.pincode ) SEPARATOR '|' ) as cities, group_concat( DISTINCT concat( cu.id, ', ', `cu`.`name`, ', ', cu.pincode ) SEPARATOR '|' ) as usercity, group_concat( DISTINCT concat( g.id, ', ', `g`.`name`, ', ', `g`.`datetime`, ', ', `g`.`size`, ', ', `g`.`width`, ', ', g.height ) SEPARATOR '|' ) as imagedata, `gu`.`gcmtextid` `gcmtextid`, `gu`.`imei`, `u`.`id` `userid`, `u`.`name`, `u`.`contact`, `u`.`email`, `u`.`username`, `u`.`address`, `u`.`datetime`, `u`.`catid`, `u`.`cityid`, `u`.`isactive`, `u`.`ispublished`, `u`.`ismerchant`, `u`.`firmname`, `u`.`firmcontact`, round(avg(r.rating), 1) rating
FROM `user` `u`
JOIN `gcmuser` `gu` ON `u`.`id` = `gu`.`userid`
LEFT JOIN `gcmusercitymapping` `gm` ON `gm`.`gcmid` = `gu`.`id`
LEFT JOIN `city` `c` ON `c`.`id` = `gm`.`cityid`
LEFT JOIN `city` `cu` ON `cu`.`id` = `u`.`cityid`
JOIN `transaction` `t` ON `t`.`userid` = `u`.`id`
JOIN `payment` `p` ON `p`.`txnid` = `t`.`id`
JOIN `master_txntype` `mtxntyp` ON `mtxntyp`.`id` = `p`.`txntypeid`
JOIN `master_asset` `mast` ON `mast`.`id` = `p`.`assetid`
LEFT JOIN `gallery` `g` ON `g`.`id` = `u`.`imageid`
JOIN `userrating` `r` ON `r`.`userid` = `u`.`id`
WHERE `p`.`assetid` = 2
AND `u`.`catid` = '12'
AND u.cityid IN()
GROUP BY `u`.`id`
ERROR - 2016-02-13 13:07:35 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '5'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:07:37 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '5'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:07:57 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:08:01 --> Severity: Notice --> Undefined property: Category::$gcmuser_model /home/xercextx/public_html/iservice/application/controllers/client_requests/Category.php 59
ERROR - 2016-02-13 13:08:01 --> Severity: Error --> Call to a member function getgcmuserid() on a non-object /home/xercextx/public_html/iservice/application/controllers/client_requests/Category.php 59
ERROR - 2016-02-13 13:08:53 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:09:55 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:14:13 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE) /home/xercextx/public_html/iservice/application/models/City_model.php 80
ERROR - 2016-02-13 13:14:18 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE) /home/xercextx/public_html/iservice/application/models/City_model.php 80
ERROR - 2016-02-13 13:15:28 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE) /home/xercextx/public_html/iservice/application/models/City_model.php 80
ERROR - 2016-02-13 13:15:31 --> Severity: Parsing Error --> syntax error, unexpected '$this' (T_VARIABLE) /home/xercextx/public_html/iservice/application/models/City_model.php 80
ERROR - 2016-02-13 13:16:54 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:16:56 --> Severity: Notice --> Undefined property: Category::$gcmuser_model /home/xercextx/public_html/iservice/application/controllers/client_requests/Category.php 59
ERROR - 2016-02-13 13:16:56 --> Severity: Error --> Call to a member function getgcmuserid() on a non-object /home/xercextx/public_html/iservice/application/controllers/client_requests/Category.php 59
ERROR - 2016-02-13 13:17:40 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:18:35 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:18:45 --> Severity: Notice --> Undefined property: Category::$city_model /home/xercextx/public_html/iservice/application/controllers/client_requests/Category.php 60
ERROR - 2016-02-13 13:18:45 --> Severity: Error --> Call to a member function getcityidsby_imei() on a non-object /home/xercextx/public_html/iservice/application/controllers/client_requests/Category.php 60
ERROR - 2016-02-13 13:19:34 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:19:56 --> Severity: Notice --> Undefined property: Category::$city_model /home/xercextx/public_html/iservice/application/controllers/client_requests/Category.php 60
ERROR - 2016-02-13 13:19:56 --> Severity: Error --> Call to a member function getcityidsby_imei() on a non-object /home/xercextx/public_html/iservice/application/controllers/client_requests/Category.php 60
ERROR - 2016-02-13 13:20:17 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:20:23 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '5'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:20:32 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:21:33 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:23:17 --> Severity: Notice --> Array to string conversion /home/xercextx/public_html/iservice/system/database/DB_query_builder.php 662
ERROR - 2016-02-13 13:23:17 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT `o`.`id`, `o`.`heading`, `o`.`expirydatetime`, `o`.`userid`, `o`.`content`, `o`.`publishdatetime`, `o`.`b_extra_master_id`, GROUP_CONCAT( oi.imageid SEPARATOR  '|' ) images
FROM `business_extra` `o`
JOIN `business_extra_images` `oi` ON `oi`.`business_extra_id` = `o`.`id`
WHERE `o`.`expirydatetime` >= '2016-02-13 13:23:17'
AND `o`.`b_extra_master_id` = '2'
AND `o`.`id` = `Array`
GROUP BY `o`.`id`
ORDER BY RAND()
ERROR - 2016-02-13 13:23:32 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:28:15 --> Severity: Notice --> Undefined variable: cityid /home/xercextx/public_html/iservice/application/models/Businessextra_model.php 173
ERROR - 2016-02-13 13:28:15 --> Severity: Notice --> Array to string conversion /home/xercextx/public_html/iservice/system/database/DB_query_builder.php 662
ERROR - 2016-02-13 13:28:15 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT `o`.`id`, `o`.`heading`, `o`.`expirydatetime`, `o`.`userid`, `o`.`content`, `o`.`publishdatetime`, `o`.`b_extra_master_id`, GROUP_CONCAT( oi.imageid SEPARATOR  '|' ) images
FROM `business_extra` `o`
JOIN `business_extra_images` `oi` ON `oi`.`business_extra_id` = `o`.`id`
WHERE `o`.`expirydatetime` >= '2016-02-13 13:28:15'
AND `o`.`b_extra_master_id` = '2'
AND `o`.`cityid` = `Array`
GROUP BY `o`.`id`
ORDER BY RAND()
ERROR - 2016-02-13 13:30:22 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:30:34 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:30:34 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:31:11 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:31:17 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:31:23 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:31:32 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:31:38 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:31:48 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:31:52 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:31:58 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:32:36 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '5'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:32:39 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '5'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:32:44 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '5'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:32:53 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:38:20 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:40:18 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:40:38 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:40:42 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:40:44 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:40:46 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:40:47 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:40:56 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:41:17 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:41:30 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 13:46:01 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-13 14:05:36 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 14:05:48 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 14:06:02 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 14:06:06 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 14:06:24 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 15:13:27 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '32'
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 15:14:24 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` IS NULL
GROUP BY `ccm`.`id`
ERROR - 2016-02-13 15:14:35 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmapid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '2'
GROUP BY `ccm`.`id`
