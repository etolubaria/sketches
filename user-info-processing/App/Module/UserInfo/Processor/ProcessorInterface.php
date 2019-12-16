<?php

namespace App\Module\UserInfo\Processor;

/**
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
interface ProcessorInterface
{
    /**
     * @param array $userInfo
     * 
     * @return string Response status
     */
    public function process(array $userInfo): string;
}
