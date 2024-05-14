<?php
declare(strict_types=1);

/**
 * file: PokemonApiConnector.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Service;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\HTTP\Client\Curl;
use Magento\Framework\Serialize\Serializer\Json;
use Szybo\Pokemon\Api\Config\SystemConfigProviderInterface;
use Szybo\Pokemon\Api\Data\ActionInterface;
use Szybo\Pokemon\Service\Request\ParamBinder;
use Szybo\Pokemon\ValueObject\Request\Uri;

/**
 * Class PokemonApiConnector
 *
 * @package Szybo\Pokemon\Service
 */
class PokemonApiConnector
{
    public function __construct(
        private readonly SystemConfigProviderInterface $systemConfigProvider,
        private readonly ParamBinder $paramBinder,
        private readonly Curl $curl,
        private readonly Json $json
    ) {
    }

    public function request(ActionInterface $action): array
    {
        $uri = $this->paramBinder->bind($action->getUri(), $action->getParams());
        $url = $this->getApiUrl($uri);

        $this->curl->get($url);

        switch ($this->curl->getStatus())
        {
            case 200:
                break;
            case 404:
                throw new LocalizedException(__('Resource with params %1 not found', $this->getListOfParamsForErrorMsg($action->getParams())));
            case 500:
                throw new LocalizedException(__('Pokemon server is unavailable. Fetching data is impossible at the moment.'));
            default:
                throw new LocalizedException(__('Something went wrong'));
        }

        return $this->json->unserialize($this->curl->getBody());
    }

    /**
     * @param  Uri  $uri
     *
     * @return string
     */
    private function getApiUrl(Uri $uri): string
    {
        return $this->systemConfigProvider->getUrl() . DS . (string)$uri;
    }

    /**
     * @param  array  $params
     *
     * @return string
     */
    private function getListOfParamsForErrorMsg(array $params): string
    {
        $listOfParams = [];
        foreach ($params as $param) {
            $listOfParams[] = $param->getName() . ' = ' . $param->getValue();
        }
        return implode(',', $listOfParams);
    }
}
