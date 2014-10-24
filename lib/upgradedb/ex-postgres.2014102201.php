<?php

/*
 *  iNET LMS
 *
 *  (C) Copyright 2001-2012 LMS Developers
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License Version 2 as
 *  published by the Free Software Foundation.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307,
 *  USA.
 *
 */




$DB->BeginTrans();

$divid = $DB->GetOne('SELECT MIN(id) AS id FROM divisions WHERE status = ? LIMIT 1;',array(0));

$DB->addconfig('phpui','default_division',($divid ? $divid : 0));

$DB->Execute("UPDATE dbinfo SET keyvalue = ? WHERE keytype = ?", array('2014102201', 'dbvex'));
$DB->CommitTrans();

?>