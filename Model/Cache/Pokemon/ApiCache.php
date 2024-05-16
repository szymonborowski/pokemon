<?php

declare(strict_types=1);

/**
 * file: ApiCache.php
 *
 * @author Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Model\Cache\Pokemon;

use Magento\Framework\App\Cache\Type\FrontendPool;
use Magento\Framework\Cache\Frontend\Decorator\TagScope;

/**
 * Class CacheType
 *
 * @package Magenest\CacheExample\Model\Cache\Pokemon
 */
class ApiCache extends TagScope
{
    const TYPE_IDENTIFIER = 'poke_api_request_cache';
    const CACHE_TAG = 'POKE_API';
    const LIFETIME = 86400;

    /**
     * @param FrontendPool $cacheFrontendPool
     */
    public function __construct(FrontendPool $cacheFrontendPool)
    {
        parent::__construct(
            $cacheFrontendPool->get(self::TYPE_IDENTIFIER),
            self::CACHE_TAG
        );
    }
}
