<?php

namespace Szybo\Pokemon\Test\Unit\Model\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use PHPUnit\Framework\MockObject\MockBuilder;
use PHPUnit\Framework\TestCase;
use Szybo\Pokemon\Model\Config\SystemConfigProvider;

class SystemConfigProviderTest extends TestCase
{
    const ENABLE_VALUE = true;
    const URL_VALUE = 'https://pokeapi.co/api/v2';

    private $scopeConfigMock;
    private $systemConfigProvider;

    protected function setUp(): void
    {
        $this->scopeConfigMock = $this->getMockBuilder(ScopeConfigInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->systemConfigProvider = new SystemConfigProvider(
            $this->scopeConfigMock
        );
    }

    public function testGetEnable()
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->with(
                SystemConfigProvider::XML_PATH_CONFIG_ENABLE,
                ScopeInterface::SCOPE_STORE
            )
            ->willReturn('1');

        $this->assertTrue($this->systemConfigProvider->getEnable());
    }

    public function testGetUrl()
    {
        $this->scopeConfigMock->expects($this->once())
            ->method('getValue')
            ->with(
                SystemConfigProvider::XML_PATH_CONFIG_URL,
                ScopeInterface::SCOPE_STORE
            )
            ->willReturn(self::URL_VALUE);

        $this->assertEquals(
            self::URL_VALUE,
            $this->systemConfigProvider->getUrl()
        );
    }
}
