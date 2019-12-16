<?php

/*
 * This is a test application.
 *
 * It shows an example of working with an external API
 *   and processing request-response in various formats.
 *
 * Should be ran from the PHP Command Line Interface.
 *
 * (c) Eugene Tolubaria <m203a4@gmail.com>
 */

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
