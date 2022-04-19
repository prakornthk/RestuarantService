<?php

/**
 * Format String to Cache Name.
 * Sush as: Bang Sue => bangsue
 */
function CacheNameFormat(string $stirng)
{
    $stirng = strtolower(str_replace(" ", '', $stirng));
    return $stirng;
}