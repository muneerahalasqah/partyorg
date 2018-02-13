<?php
if (! mysql_connect ( "localhost", "root", "" )) {
	die ( 'oops connection problem ! --> ' . mysql_error () );
}
if (! mysql_select_db ( "partyorg" )) {
	die ( 'oops database selection problem ! --> ' . mysql_error () );
}

session_start ();

error_reporting ( "E-ALL ~E-NOTICE" );
?>