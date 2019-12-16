<?php

namespace Processor;

interface ProcessorInterface
{
    /**
     * @param array $userInfo
     * 
     * @return string Response status
     */
    public function process(array $userInfo): string;
}
