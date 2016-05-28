<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2016-03-05 06:30:07 --> Query error: Column 'gcmtextid' cannot be null - Invalid query: INSERT INTO `gcmuser` (`gcmtextid`, `imei`, `datetime`) VALUES (NULL, NULL, '2016-03-05 06:30:07')
ERROR - 2016-03-05 06:31:08 --> Severity: Warning --> Invalid argument supplied for foreach() /home/xercextx/public_html/iservice/application/controllers/client_requests/Category.php 101
ERROR - 2016-03-05 06:31:10 --> Severity: Notice --> Undefined variable: cateiddb /home/xercextx/public_html/iservice/application/models/Businessextra_model.php 422
ERROR - 2016-03-05 06:31:10 --> Severity: Notice --> Undefined variable: usermaxlimit /home/xercextx/public_html/iservice/application/models/User_model.php 67
ERROR - 2016-03-05 06:31:14 --> 404 Page Not Found: client_requests/Category/index
ERROR - 2016-03-05 06:31:15 --> Query error: Column 'userid' cannot be null - Invalid query: INSERT INTO `business_extra` (`userid`, `b_extra_master_id`, `heading`, `content`, `catid`, `publishdatetime`, `expirydatetime`, `cityid`, `isbusiness`) VALUES (NULL, NULL, NULL, NULL, 0, '2016-03-05 06:31:15', '2016-03-15 06:31:15', NULL, 0)
ERROR - 2016-03-05 06:31:15 --> 404 Page Not Found: client_requests/City/getAllCities
ERROR - 2016-03-05 06:31:30 --> Severity: Warning --> Invalid argument supplied for foreach() /home/xercextx/public_html/iservice/application/models/City_model.php 96
ERROR - 2016-03-05 06:31:30 --> Severity: Warning --> array_keys() expects parameter 1 to be array, boolean given /home/xercextx/public_html/iservice/system/database/DB_query_builder.php 1520
ERROR - 2016-03-05 06:31:30 --> Severity: Warning --> sort() expects parameter 1 to be array, null given /home/xercextx/public_html/iservice/system/database/DB_query_builder.php 1521
ERROR - 2016-03-05 06:31:30 --> Severity: Warning --> Invalid argument supplied for foreach() /home/xercextx/public_html/iservice/system/database/DB_query_builder.php 1549
ERROR - 2016-03-05 06:31:45 --> Query error: Column 'userid' cannot be null - Invalid query: INSERT INTO `offer` (`userid`, `heading`, `content`, `publishdatetime`, `expirydatetime`) VALUES (NULL, NULL, NULL, '2016-03-05 06:31:45', '2016-03-15 06:31:45')
