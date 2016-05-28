<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-02-12 01:54:43 --> Query error: Unknown column 'c.sortorder' in 'field list' - Invalid query: SELECT `s`.`id`, `s`.`name`, `s`.`catid`, `s`.`sortorder`, `s`.`description`, group_concat( DISTINCT concat( cm.id, ', ', `cm`.`catid`, ', ', `cm`.`controlsid`, ', ', `ct`.`label`, ', ', `cm`.`sortorder`, ', ', `ct`.`mastercontrolid`, ', ', `ct`.`isrequired`, ', ', ct.placeholder) ORDER BY c.sortorder SEPARATOR '|' ) as controls
FROM `catcontrolmapping` `cm`
JOIN `screen` `s` ON `cm`.`screenid` = `s`.`id`
JOIN `controls` `ct` ON `cm`.`controlsid` = `ct`.`id`
WHERE `s`.`catid` = '28'
GROUP BY `s`.`id`
ORDER BY `s`.`sortorder` ASC
ERROR - 2016-02-12 02:15:43 --> Severity: Warning --> Missing argument 6 for Controls_model::map(), called in /home/xercextx/public_html/iservice/application/controllers/admin_requests/Controls.php on line 87 and defined /home/xercextx/public_html/iservice/application/models/Controls_model.php 23
ERROR - 2016-02-12 02:15:43 --> Severity: Warning --> Missing argument 7 for Controls_model::map(), called in /home/xercextx/public_html/iservice/application/controllers/admin_requests/Controls.php on line 87 and defined /home/xercextx/public_html/iservice/application/models/Controls_model.php 23
ERROR - 2016-02-12 02:15:43 --> Severity: Notice --> Undefined variable: controlid /home/xercextx/public_html/iservice/application/models/Controls_model.php 27
ERROR - 2016-02-12 02:15:43 --> Severity: Notice --> Undefined variable: data /home/xercextx/public_html/iservice/application/models/Controls_model.php 33
ERROR - 2016-02-12 03:40:07 --> 404 Page Not Found: Notification/index
ERROR - 2016-02-12 04:22:45 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 04:27:03 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 06:26:05 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 06:26:40 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 06:28:44 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 06:29:00 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 06:29:09 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 06:40:16 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 06:40:34 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 06:43:15 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 06:43:26 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 06:43:41 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 06:44:06 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 06:44:26 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 06:49:15 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 06:49:55 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 06:50:07 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 06:50:47 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 06:52:46 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 06:59:47 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:00:10 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:00:43 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:01:02 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:03:06 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:03:12 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:03:16 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:03:35 --> 404 Page Not Found: client_requests/Businessextra/getadverrandom
ERROR - 2016-02-12 07:04:16 --> 404 Page Not Found: client_requests/Businessextra/getrandomAdve
ERROR - 2016-02-12 07:04:56 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:05:09 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:06:43 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:06:49 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:07:19 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:07:58 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:08:17 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:08:24 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:08:33 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:08:47 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:09:02 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:09:43 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:09:50 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:12:28 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:14:03 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:14:33 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:15:26 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:15:57 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:16:05 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:16:26 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '5'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:16:41 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:16:46 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:16:57 --> Query error: Unknown column 'ccm.controlid' in 'field list' - Invalid query: SELECT `ccm`.`id`, `ccm`.`catid`, `ccm`.`controlid`, `ccm`.`label`, `ccm`.`sortorder`, `ccm`.`screenid`, group_concat( ccuv.value separator '|' ) controlvalues
FROM `catcontrolmapping` `ccm`
JOIN `catcontroluservalue` `ccuv` ON `ccuv`.`catcontrolmappingid` = `ccm`.`id`
WHERE `ccuv`.`userid` = '27'
GROUP BY `ccm`.`id`
ERROR - 2016-02-12 07:48:24 --> Severity: Error --> Call to undefined method Businessextra_model::getrandomcate() /home/xercextx/public_html/iservice/application/controllers/client_requests/Businessextra.php 60
ERROR - 2016-02-12 07:49:25 --> Severity: Error --> Call to undefined method Businessextra_model::getrandomcate() /home/xercextx/public_html/iservice/application/controllers/client_requests/Businessextra.php 60
ERROR - 2016-02-12 07:49:28 --> Severity: Error --> Call to undefined method Businessextra_model::getrandomcate() /home/xercextx/public_html/iservice/application/controllers/client_requests/Businessextra.php 60
ERROR - 2016-02-12 07:50:56 --> Severity: Error --> Call to undefined method Businessextra_model::getrandomcate() /home/xercextx/public_html/iservice/application/controllers/client_requests/Businessextra.php 60
ERROR - 2016-02-12 07:52:49 --> Query error: Table 'xercextx_iservice.advertisement' doesn't exist - Invalid query: SELECT `o`.*, `u`.`catid`
FROM `advertisement` `o`
JOIN `user` `u` ON `o`.`userid`=`u`.`id`
WHERE `expirydatetime` >= '2016-02-12 07:52:49'
AND `isnable` = 1
AND `catid` = '2'
GROUP BY `id`
ORDER BY RAND()
 LIMIT 5
ERROR - 2016-02-12 08:01:08 --> 404 Page Not Found: client_requests/Businessextra/getrandomcate
ERROR - 2016-02-12 10:09:30 --> Severity: Warning --> Missing argument 6 for Controls_model::map(), called in /home/xercextx/public_html/iservice/application/controllers/admin_requests/Controls.php on line 87 and defined /home/xercextx/public_html/iservice/application/models/Controls_model.php 23
ERROR - 2016-02-12 10:09:30 --> Severity: Warning --> Missing argument 7 for Controls_model::map(), called in /home/xercextx/public_html/iservice/application/controllers/admin_requests/Controls.php on line 87 and defined /home/xercextx/public_html/iservice/application/models/Controls_model.php 23
ERROR - 2016-02-12 10:09:30 --> Severity: Notice --> Undefined variable: controlid /home/xercextx/public_html/iservice/application/models/Controls_model.php 27
ERROR - 2016-02-12 10:09:30 --> Severity: Notice --> Undefined variable: data /home/xercextx/public_html/iservice/application/models/Controls_model.php 33
ERROR - 2016-02-12 11:19:06 --> 404 Page Not Found: Notification/index
ERROR - 2016-02-12 11:21:20 --> 404 Page Not Found: Notification/index
ERROR - 2016-02-12 11:21:46 --> 404 Page Not Found: Notification/index
ERROR - 2016-02-12 11:22:07 --> 404 Page Not Found: Notification/index
ERROR - 2016-02-12 11:23:31 --> 404 Page Not Found: Notification/index
ERROR - 2016-02-12 11:31:08 --> 404 Page Not Found: Notification/index
ERROR - 2016-02-12 11:31:52 --> 404 Page Not Found: Notification/index
ERROR - 2016-02-12 11:35:02 --> 404 Page Not Found: Notification/index
ERROR - 2016-02-12 11:35:05 --> 404 Page Not Found: Settings/index
ERROR - 2016-02-12 11:38:09 --> 404 Page Not Found: Notification/index
ERROR - 2016-02-12 11:52:54 --> 404 Page Not Found: Notification/index
ERROR - 2016-02-12 12:06:31 --> 404 Page Not Found: Notification/index
ERROR - 2016-02-12 12:08:57 --> 404 Page Not Found: Notification/index
ERROR - 2016-02-12 12:09:05 --> 404 Page Not Found: Notification/index
ERROR - 2016-02-12 12:09:54 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 12:10:27 --> 404 Page Not Found: admin_requests/Gcm/send_notification
ERROR - 2016-02-12 12:10:32 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 12:15:22 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 12:15:25 --> 404 Page Not Found: admin_requests/Gcm/send_notification
ERROR - 2016-02-12 12:15:30 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 12:17:36 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 12:18:12 --> 404 Page Not Found: admin_requests/Gcm/send_notifiacation
ERROR - 2016-02-12 12:19:05 --> 404 Page Not Found: admin_requests/Gcm/send_notifiacation
ERROR - 2016-02-12 12:19:07 --> 404 Page Not Found: admin_requests/Gcm/send_notifiacation
ERROR - 2016-02-12 12:19:10 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 12:19:19 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 12:23:02 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 12:23:20 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 12:28:31 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 12:31:35 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 12:38:34 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 12:40:28 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 12:43:04 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 12:47:17 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 12:48:27 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 12:48:45 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 12:55:02 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 12:55:16 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 12:58:03 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 12:58:41 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 13:00:42 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 13:00:55 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 13:01:58 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 13:02:55 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 13:04:55 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 13:05:06 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 13:12:51 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 13:13:03 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 13:14:17 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 13:15:57 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 13:16:01 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 13:16:02 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 13:16:10 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 13:16:33 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 13:16:38 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 13:17:52 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 13:18:14 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 13:18:19 --> Severity: Warning --> Missing argument 6 for Controls_model::map(), called in /home/xercextx/public_html/iservice/application/controllers/admin_requests/Controls.php on line 87 and defined /home/xercextx/public_html/iservice/application/models/Controls_model.php 23
ERROR - 2016-02-12 13:18:19 --> Severity: Warning --> Missing argument 7 for Controls_model::map(), called in /home/xercextx/public_html/iservice/application/controllers/admin_requests/Controls.php on line 87 and defined /home/xercextx/public_html/iservice/application/models/Controls_model.php 23
ERROR - 2016-02-12 13:18:19 --> Severity: Notice --> Undefined variable: controlid /home/xercextx/public_html/iservice/application/models/Controls_model.php 27
ERROR - 2016-02-12 13:18:19 --> Severity: Notice --> Undefined variable: data /home/xercextx/public_html/iservice/application/models/Controls_model.php 33
ERROR - 2016-02-12 13:18:21 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 13:19:03 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 13:19:08 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 13:19:39 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 13:19:41 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 13:20:02 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 13:21:00 --> 404 Page Not Found: Plugins/bootstrap-datepicker
ERROR - 2016-02-12 15:04:48 --> Severity: Warning --> Missing argument 6 for Controls_model::map(), called in /home/xercextx/public_html/iservice/application/controllers/admin_requests/Controls.php on line 87 and defined /home/xercextx/public_html/iservice/application/models/Controls_model.php 23
ERROR - 2016-02-12 15:04:48 --> Severity: Warning --> Missing argument 7 for Controls_model::map(), called in /home/xercextx/public_html/iservice/application/controllers/admin_requests/Controls.php on line 87 and defined /home/xercextx/public_html/iservice/application/models/Controls_model.php 23
ERROR - 2016-02-12 15:04:48 --> Severity: Notice --> Undefined variable: controlid /home/xercextx/public_html/iservice/application/models/Controls_model.php 27
ERROR - 2016-02-12 15:04:48 --> Severity: Notice --> Undefined variable: data /home/xercextx/public_html/iservice/application/models/Controls_model.php 33
ERROR - 2016-02-12 15:42:21 --> Severity: Warning --> Missing argument 6 for Controls_model::map(), called in /home/xercextx/public_html/iservice/application/controllers/admin_requests/Controls.php on line 87 and defined /home/xercextx/public_html/iservice/application/models/Controls_model.php 23
ERROR - 2016-02-12 15:42:21 --> Severity: Warning --> Missing argument 7 for Controls_model::map(), called in /home/xercextx/public_html/iservice/application/controllers/admin_requests/Controls.php on line 87 and defined /home/xercextx/public_html/iservice/application/models/Controls_model.php 23
ERROR - 2016-02-12 15:42:21 --> Severity: Notice --> Undefined variable: isrequired /home/xercextx/public_html/iservice/application/models/Controls_model.php 26
ERROR - 2016-02-12 15:42:21 --> Severity: Notice --> Undefined variable: placeholder /home/xercextx/public_html/iservice/application/models/Controls_model.php 28
ERROR - 2016-02-12 15:42:21 --> Query error: Column 'isrequired' cannot be null - Invalid query: INSERT INTO `controls` (`isrequired`, `mastercontrolid`, `placeholder`, `label`) VALUES (NULL, 1, NULL, NULL)
ERROR - 2016-02-12 15:43:25 --> Severity: Warning --> Missing argument 6 for Controls_model::map(), called in /home/xercextx/public_html/iservice/application/controllers/admin_requests/Controls.php on line 87 and defined /home/xercextx/public_html/iservice/application/models/Controls_model.php 23
ERROR - 2016-02-12 15:43:25 --> Severity: Warning --> Missing argument 7 for Controls_model::map(), called in /home/xercextx/public_html/iservice/application/controllers/admin_requests/Controls.php on line 87 and defined /home/xercextx/public_html/iservice/application/models/Controls_model.php 23
ERROR - 2016-02-12 15:43:25 --> Severity: Notice --> Undefined variable: isrequired /home/xercextx/public_html/iservice/application/models/Controls_model.php 26
ERROR - 2016-02-12 15:43:25 --> Severity: Notice --> Undefined variable: placeholder /home/xercextx/public_html/iservice/application/models/Controls_model.php 28
ERROR - 2016-02-12 15:43:25 --> Query error: Column 'isrequired' cannot be null - Invalid query: INSERT INTO `controls` (`isrequired`, `mastercontrolid`, `placeholder`, `label`) VALUES (NULL, 1, NULL, NULL)
ERROR - 2016-02-12 15:46:53 --> Query error: Unknown column 'controlid' in 'field list' - Invalid query: UPDATE `catcontrolmapping` SET `catid` = '15', `controlid` = 1, `screenid` = '38', `label` = 'asd', `sortorder` = 1
WHERE `id` = '1'
ERROR - 2016-02-12 15:47:42 --> Query error: Column 'isrequired' cannot be null - Invalid query: INSERT INTO `controls` (`isrequired`, `mastercontrolid`, `placeholder`, `label`) VALUES (NULL, 1, 'doc', 'Doctor')
ERROR - 2016-02-12 16:39:39 --> Severity: Error --> Call to undefined function getgcmuserid() /home/xercextx/public_html/iservice/application/models/Gcmuser_model.php 55
ERROR - 2016-02-12 16:59:31 --> Severity: Error --> Call to undefined function getgcmuserid() /home/xercextx/public_html/iservice/application/models/Gcmuser_model.php 55
ERROR - 2016-02-12 16:59:52 --> Severity: Error --> Call to undefined function getgcmuserid() /home/xercextx/public_html/iservice/application/models/Gcmuser_model.php 55
ERROR - 2016-02-12 17:14:44 --> Severity: Parsing Error --> syntax error, unexpected '$gcmid' (T_VARIABLE) /home/xercextx/public_html/iservice/application/models/City_model.php 25
ERROR - 2016-02-12 17:15:54 --> Severity: Parsing Error --> syntax error, unexpected '$gcmid' (T_VARIABLE) /home/xercextx/public_html/iservice/application/models/City_model.php 25
ERROR - 2016-02-12 17:18:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '0 ON `c`.`id` = `gn`.`cityid`' at line 3 - Invalid query: SELECT `c`.`id`, `c`.`name`, `c`.`pincode`, `gn`.`gcmid`
FROM `city` `c`
LEFT JOIN 0 ON `c`.`id` = `gn`.`cityid`
ERROR - 2016-02-12 17:19:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '0 ON `c`.`id` = `gn`.`cityid`' at line 3 - Invalid query: SELECT `c`.`id`, `c`.`name`, `c`.`pincode`, `gn`.`gcmid`
FROM `city` `c`
LEFT JOIN 0 ON `c`.`id` = `gn`.`cityid`
ERROR - 2016-02-12 17:23:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '0 ON `c`.`id` = `gn`.`cityid`' at line 3 - Invalid query: SELECT `c`.`id`, `c`.`name`, `c`.`pincode`, `gn`.`gcmid`
FROM `city` `c`
LEFT JOIN 0 ON `c`.`id` = `gn`.`cityid`
ERROR - 2016-02-12 17:23:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '0 ON `c`.`id` = `gn`.`cityid`' at line 3 - Invalid query: SELECT `c`.`id`, `c`.`name`, `c`.`pincode`, `gn`.`gcmid`
FROM `city` `c`
LEFT JOIN 0 ON `c`.`id` = `gn`.`cityid`
ERROR - 2016-02-12 17:23:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '0 ON `c`.`id` = `gn`.`cityid`' at line 3 - Invalid query: SELECT `c`.`id`, `c`.`name`, `c`.`pincode`, `gn`.`gcmid`
FROM `city` `c`
LEFT JOIN 0 ON `c`.`id` = `gn`.`cityid`
ERROR - 2016-02-12 17:25:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '0 ON `c`.`id` = `gn`.`cityid`' at line 3 - Invalid query: SELECT `c`.`id`, `c`.`name`, `c`.`pincode`, `gn`.`gcmid`
FROM `city` `c`
LEFT JOIN 0 ON `c`.`id` = `gn`.`cityid`
ERROR - 2016-02-12 17:27:49 --> Query error: Unknown column 'cm.sortorder' in 'order clause' - Invalid query: SELECT `cm`.`id`, `cm`.`catid`, `ct`.`sortorder`, `cm`.`screenid`, `cm`.`controlsid`, `ct`.`mastercontrolid`, `ct`.`label`, `ct`.`isrequired`, `ct`.`placeholder`
FROM `catcontrolmapping` `cm`
JOIN `controls` `ct` ON `cm`.`controlsid` = `ct`.`id`
WHERE `cm`.`catid` = '15'
AND `cm`.`screenid` = '38'
ORDER BY `cm`.`sortorder` ASC
ERROR - 2016-02-12 17:28:19 --> Severity: Parsing Error --> syntax error, unexpected '.' /home/xercextx/public_html/iservice/application/models/City_model.php 26
ERROR - 2016-02-12 17:28:43 --> Query error: SELECT command denied to user 'xercextx_iuser'@'localhost' for table 'gcmid =0' - Invalid query: SELECT `c`.`id`, `c`.`name`, `c`.`pincode`, `gn`.`gcmid`
FROM `city` `c`
LEFT JOIN `select * from gcmusercitymapping g where g`.`gcmid =0` `gn` ON `c`.`id` = `gn`.`cityid`
ERROR - 2016-02-12 17:29:02 --> Severity: Parsing Error --> syntax error, unexpected '" gn"' (T_CONSTANT_ENCAPSED_STRING) /home/xercextx/public_html/iservice/application/models/City_model.php 26
ERROR - 2016-02-12 17:29:03 --> Severity: Error --> Call to undefined function set_checkbox() /home/xercextx/public_html/iservice/application/views/view-parts/managecategory-view-js-files.php 54
ERROR - 2016-02-12 17:29:43 --> Severity: Error --> Call to undefined function set_checkbox() /home/xercextx/public_html/iservice/application/views/view-parts/managecategory-view-js-files.php 54
ERROR - 2016-02-12 17:29:50 --> Severity: Error --> Call to undefined function set_checkbox() /home/xercextx/public_html/iservice/application/views/view-parts/managecategory-view-js-files.php 54
ERROR - 2016-02-12 17:32:42 --> Severity: error --> Exception: /home/xercextx/public_html/iservice/application/models/City_model.php exists, but doesn't declare class City_model /home/xercextx/public_html/iservice/system/core/Loader.php 306
ERROR - 2016-02-12 17:48:06 --> Severity: Error --> Call to a member function result() on a non-object /home/xercextx/public_html/iservice/application/models/Gcmuser_model.php 47
ERROR - 2016-02-12 17:50:26 --> Severity: error --> Exception: /home/xercextx/public_html/iservice/application/models/Gcmuser_model.php exists, but doesn't declare class Gcmuser_model /home/xercextx/public_html/iservice/system/core/Loader.php 306
ERROR - 2016-02-12 17:51:58 --> Severity: Notice --> Array to string conversion /home/xercextx/public_html/iservice/application/models/City_model.php 25
ERROR - 2016-02-12 17:51:58 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT `c`.`id`, `c`.`name`, `c`.`pincode`, `gn`.`gcmid`
FROM `city` `c`
LEFT JOIN (select * from gcmusercitymapping g where g.gcmid = Array ) gn ON `c`.`id` = `gn`.`cityid`
ERROR - 2016-02-12 17:55:02 --> Severity: Notice --> Array to string conversion /home/xercextx/public_html/iservice/application/models/City_model.php 25
ERROR - 2016-02-12 17:55:02 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT `c`.`id`, `c`.`name`, `c`.`pincode`, `gn`.`gcmid`
FROM `city` `c`
LEFT JOIN (select * from gcmusercitymapping g where g.gcmid = Array ) gn ON `c`.`id` = `gn`.`cityid`
ERROR - 2016-02-12 17:55:05 --> Severity: Notice --> Array to string conversion /home/xercextx/public_html/iservice/application/models/City_model.php 25
ERROR - 2016-02-12 17:55:05 --> Query error: Unknown column 'Array' in 'where clause' - Invalid query: SELECT `c`.`id`, `c`.`name`, `c`.`pincode`, `gn`.`gcmid`
FROM `city` `c`
LEFT JOIN (select * from gcmusercitymapping g where g.gcmid = Array ) gn ON `c`.`id` = `gn`.`cityid`
