<?php

/*
 * LMS version 1.11-git
 *
 *  (C) Copyright 2001-2012 LMS Developers
 *
 *  Please, see the doc/AUTHORS for more information about authors!
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
 *  $Id$
 */

$layout['pagetitle'] = trans('IP Networks');

// status
if(!isset($_GET['s']))
	$SESSION->restore('netlist_s', $s);
else
	$s = $_GET['s'];
$SESSION->save('netlist_s', $s);

// hostid
if(!isset($_GET['h']))
        $SESSION->restore('netlist_h', $h);
else
        $h = $_GET['h'];
$SESSION->save('netlist_h', $h);

//sort
if (isset($_GET['o']))
$netlist = $LMS->GetNetworkList($_GET['o']);
else
        $o = $_GET['o'];
$SESSION->save('netlist_o', $o);

$listdata['state'] = $s;
$listdata['hostid'] = $h;
$listdata['order'] = $o;

$netlist = $LMS->GetNetworkList($s,$h,$o);




$listdata['size'] = $netlist['size'];
$listdata['assigned'] = $netlist['assigned'];
$listdata['online'] = $netlist['online'];
$listdata['order'] = $netlist['order'];
$listdata['direction'] = $netlist['direction'];

unset($netlist['assigned']);
unset($netlist['size']);
unset($netlist['online']);
unset($netlist['order']);
unset($netlist['direction']);
$listdata['total'] = sizeof($netlist);

$SMARTY->assign('listdata',$listdata);
$SMARTY->assign('netlist',$netlist);
$SMARTY->assign('hostlist',$DB->GetAll('SELECT id, name FROM hosts ORDER BY name;'));
$SMARTY->display('netlist.html');

?>
