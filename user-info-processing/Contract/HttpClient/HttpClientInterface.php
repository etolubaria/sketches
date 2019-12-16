<?php

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
