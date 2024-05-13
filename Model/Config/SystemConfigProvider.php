<?php
declare(strict_types=1);

/**
 * file: SystemConfigProvider.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Model\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Szybo\Pokemon\Api\Config\SystemConfigProviderInterface;

/**
 * Class SystemConfigProvider
 *
 * @package Szybo\Pokemon\Model\Config
 */
class SystemConfigProvider implements SystemConfigProviderInterface
{
    const XML_PATH_CONFIG_ENABLE = 'pokemon/api/enable';
    const XML_PATH_CONFIG_URL = 'pokemon/api/url';

    /**
     * @param  ScopeConfigInterface  $scopeConfig
     */
    public function __construct(
        private readonly ScopeConfigInterface $scopeConfig
    ) {
    }

    /**
     * @return bool
     */
    public function getEnable(): bool
    {
        return (bool) $this->scopeConfig->getValue(
            self::XML_PATH_CONFIG_ENABLE,
            ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return (string) $this->scopeConfig->getValue(
            self::XML_PATH_CONFIG_URL,
            ScopeInterface::SCOPE_STORE);
    }
}
