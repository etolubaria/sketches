<?php

namespace app\forms;

/**
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
class ServerConfigForm implements FormInterface
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
     * @inheritDoc
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
