<?php

namespace App\Module\UserInfo\Processor;

/**
 * Provides a public interface for processing user info
 *
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
