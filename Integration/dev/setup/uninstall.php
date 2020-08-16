//<?php


/* To prevent PHP errors (extending class does not exist) revealing path */

use IPS\Db;

if ( !\defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * Uninstall Code
 */
class ips_plugins_setup_uninstall
{
	public function step1()
	{
        Db::i()->dropColumn("core_members", "skript_integrations");

		return TRUE;
	}
}