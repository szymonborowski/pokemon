<?php

declare(strict_types=1);

/**
 * file: SystemConfigProviderInterface.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Api\Config;

/**
 * Interface SystemConfigProviderInterface
 *
 * @package Szybo\Pokemon\Api
 */
interface SystemConfigProviderInterface
{
    /**
     * @return bool
     */
    public function getEnable(): bool;

    /**
     * @return string
     */
    public function getUrl(): string;
}
