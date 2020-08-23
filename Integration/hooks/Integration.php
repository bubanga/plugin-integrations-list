//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !\defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	exit;
}

/**
 * Class hook15
 */
class hook15 extends _HOOK_CLASS_
{
    /**
     * @param string $name
     * @return bool
     */
    public function hasIntegration(string $name): bool
    {
        return (bool) array_search($name, $this->getIntegration()) != false;
    }

    /**
     * @return array
     */
    public function getIntegrations(): array
    {
        return explode(',', $this->skript_integrations);
    }

    /**
     * @param array $integrations
     */
    public function setIntegrations(array $integrations): void
    {
        $this->skript_integrations = \implode(',', $integrations);
        $this->save();
    }

    /**
     * @param string $name
     */
    public function addIntegration(string $name): void
    {
        $integrations = $this->getIntegrations();
        $integrations[] = $name;
        $this->setIntegrations($integrations);
    }

    /**
     * @param string $name
     */
    public function removeIntegration(string $name): void
    {
        $integrations = $this->getIntegrations();
        $id = array_search($name, $integrations);
        unset($integrations[$id]);
        $this->setIntegrations($integrations);
    }
}
