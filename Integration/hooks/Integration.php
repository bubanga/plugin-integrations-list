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
    public function getIntegration(): array
    {
        return \explode(",", $this->skript_integrations);
    }

    /**
     * @param array $integration
     */
    public function setIntegration(array $integration): void
    {
        $this->skript_integrations = \implode(",", $integration);
        $this->save();
    }

    /**
     * @param string $name
     */
    public function addIntegration(string $name): void
    {
        $integration = $this->getIntegration();
        $integration[] = $name;
        $this->setIntegration($integration);
    }

    /**
     * @param string $name
     */
    public function removeIntegration(string $name): void
    {
        $integration = $this->getIntegration();
        $id = \array_search($name, $integration);
        unset($integration[$id]);
        $this->setIntegration($integration);
    }
}
