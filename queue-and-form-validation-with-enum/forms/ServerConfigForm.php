<?php

namespace app\forms;

/**
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
class ServerConfigForm
{
    /**
     * @var array
     */
    private $config;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @return bool
     */
    public function validate(): bool
    {
        if (!isset($this->config['server'])) {
            return false;
        }

        $availableServers = \app\enums\Servers::getValues();

        return in_array($this->config['server'], $availableServers);
    }
}
