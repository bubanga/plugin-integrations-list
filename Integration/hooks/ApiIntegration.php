//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */

use IPS\Api\Response;
use IPS\Member;
use IPS\Request;

if ( !\defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	exit;
}

abstract class hook14 extends _HOOK_CLASS_
{

    /**
     * POST /core/members/{id}/integrations
     *
     *
     * @param		int		id
     * @apiparam	string	service
     * @apiparam	bool	action          true: add | false: remove
     * @return		Response
     */
    public function POSTitem_integrations(int $id)
    {
        $member = Member::load($id);
        $action = (bool) Request::i()->action;
        $service = (string) Request::i()->service;

        if (!$action && $member->hasIntegration($service)) {
            $member->removeIntegration($service);
        }

        if ($action && !$member->hasIntegration($service)) {
            $member->addIntegration($service);
        }

        return new Response(202);
    }

}
