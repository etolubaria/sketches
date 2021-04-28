<?php

namespace UrlHelperExample\Util;

/**
 * Provides functionality for working with URLs.
 */
final class UrlHelper
{
    /**
     * Returns an url with the specified query string arguments.
     *
     * @param string $url
     * @param array  $params
     *
     * @return string
     */
    public static function withQueryParams(string $url, array $params): string
    {
        if (0 === count($params)) {
            return $url;
        }

        $parts = parse_url($url);

        $query = [];
        if (isset($parts['query'])) {
            parse_str($parts['query'], $query);
        }
        $query += $params;
        $parts['query'] = http_build_query($query);

        return self::build($parts);
    }

    /**
     * Builds an url from parts.
     *
     * @param array $parts The structure MUST be compatible with the parts providing by {@see parse_url()}
     *
     * @return string
     */
    public static function build(array $parts): string
    {
        $scheme     = !empty($parts['scheme']) ? $parts['scheme'] . '://' : '';
        $password   = !empty($parts['pass']) ? ':' . $parts['pass'] : '';
        $authority  = !empty($parts['user']) ? $parts['user'] . $password . '@' : '';
        $port       = !empty($parts['port']) ? ':' . $parts['port'] : '';
        $host       = !empty($parts['host']) ? $parts['host'] . $port : '';
        $path       = !empty($parts['path']) ? $parts['path'] : '';
        $query      = !empty($parts['query']) ? '?' . $parts['query'] : '';
        $fragment   = !empty($parts['fragment']) ? '#' . $parts['fragment'] : '';

        return $scheme . $authority . $host . $path . $query . $fragment;
    }
}
