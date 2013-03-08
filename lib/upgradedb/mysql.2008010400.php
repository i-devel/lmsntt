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

$DB->BeginTrans();

$DB->Execute("
    CREATE TABLE nodegroups (
	id 		int(11) 	NOT NULL auto_increment,
        name		varchar(255) 	NOT NULL DEFAULT '',
	description	text 		NOT NULL DEFAULT '',
	PRIMARY KEY (id),
	UNIQUE KEY name (name)
    );
");
$DB->Execute("
    CREATE TABLE nodegroupassignments (
	id 		int(11) 	NOT NULL auto_increment,
        nodegroupid	int(11) 	NOT NULL DEFAULT 0,
	nodeid		int(11)		NOT NULL DEFAULT 0,
	PRIMARY KEY (id),
	UNIQUE KEY nodeid (nodeid, nodegroupid)
    );
");

$DB->Execute("UPDATE dbinfo SET keyvalue = ? WHERE keytype = ?", array('2008010400', 'dbversion'));

$DB->CommitTrans();

?>
