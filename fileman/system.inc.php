<?php
/*
  RoxyFileman - web based file manager. Ready to use with CKEditor, TinyMCE. 
  Can be easily integrated with any other WYSIWYG editor or CMS.

  Copyright (C) 2013, RoxyFileman - Lyubomir Arsov. All rights reserved.
  For licensing, see LICENSE.txt or http://RoxyFileman.com/license

  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.

  Contact: Lyubomir Arsov, liubo (at) web-lobby.com
*/
error_reporting(E_ALL);
ini_set('display_errors', 'on');
// You DON'T have to make any changes to this file. For Roxy Fileman user configuration see conf.json file.
define('BASE_PATH', dirname (__FILE__));
date_default_timezone_set('UTC');


//$tmp = json_decode(file_get_contents(BASE_PATH . '../conf.json'), true);
//if ($tmp) {
//    foreach ($tmp as $k => $v)
//        define($k, $v);
//} else
//    die('Error parsing configuration');
//$FilesRoot = fixPath(getFilesPath());
//if (!is_dir($FilesRoot))
//    @mkdir($FilesRoot, octdec(DIRPERMISSIONS));
//

?>