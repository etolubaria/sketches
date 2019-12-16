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

namespace Contract\HttpClient;

/**
 * Simplified interface to provide methods for requesting HTTP resources
 *
 * @author Eugene Tolubaria <m203a4@gmail.com>
 */
interface HttpClientInterface
{
    /**
     * Requests an HTTP resource.
     *
     * @param string $method Http method
     * @param string $uri
     * @param string $request Http request body
     *
     * @return string Http response body
     */
    public function send(string $method, string $uri, string $request): string;
}
