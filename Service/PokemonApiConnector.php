<?php
declare(strict_types=1);

/**
 * file: PokemonApiConnector.php
 *
 * @author    Szymon Borowski <szymon.borowski@gmail.com>
 * @copyright Copyright (c) 2024, Szymon Borowski
 */

namespace Szybo\Pokemon\Service;

use Assert\AssertionFailedException;
use Magento\Framework\App\Cache\StateInterface;
use Magento\Framework\App\CacheInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\HTTP\Client\Curl;
use Magento\Framework\Serialize\Serializer\Json;
use Szybo\Pokemon\Api\Config\SystemConfigProviderInterface;
use Szybo\Pokemon\Api\Data\ActionInterface;
use Szybo\Pokemon\Model\Cache\Pokemon\ApiCache;
use Szybo\Pokemon\Model\Request\Action;
use Szybo\Pokemon\Service\Request\ParamBinder;

/**
 * Class PokemonApiConnector
 *
 * @package Szybo\Pokemon\Service
 */
readonly class PokemonApiConnector
{
    public function __construct(
        private SystemConfigProviderInterface $systemConfigProvider,
        private ParamBinder $paramBinder,
        private Curl $curl,
        private Json $json,
        private CacheInterface $cache,
        private StateInterface $state,
    ) {
    }

    public function request(ActionInterface $action): array
    {
        $cacheKey = $this->getCacheKey($action);
        $body = $this->loadDataFromCache($cacheKey);

        if (!empty($body)) {
            return $this->json->unserialize($body);
        }

        $body = $this->consumeResource($action);

        if (empty($body)) {
            throw new LocalizedException(__('Empty response from API request.'));
        }

        $this->saveDataToCache($body, $cacheKey);

        return $this->json->unserialize($body);
    }

    /**
     * @param  Action  $action
     *
     * @return string
     * @throws AssertionFailedException
     * @throws LocalizedException
     */
    private function consumeResource(Action $action): string
    {
        $url = $this->getApiResourceUrl($action);
        $this->curl->setOption(CURLOPT_NOBODY, false);
        $this->curl->get($url);

        switch ($this->curl->getStatus())
        {
            case 200:
                break;
            case 400:
                throw new LocalizedException(__('Bad request for uri %1', $url));
            case 404:
                throw new LocalizedException(__('Resource with params %1 not found', $this->getListOfParamsForErrorMsg($action->getParams())));
            case 500:
                throw new LocalizedException(__('Pokemon server is unavailable. Fetching data is impossible at the moment.'));
            default:
                throw new LocalizedException(__('Unexpected error occurred. Connection with Poke API is not possible at this moment.'));
        }

        return $this->curl->getBody();
    }

    /**
     * @param  string  $cacheKey
     *
     * @return string|null
     */
    private function loadDataFromCache(string $cacheKey)
    {
        if ($this->state->isEnabled(ApiCache::TYPE_IDENTIFIER) === false) {
            $this->cache->load($cacheKey);
        }

        return null;
    }

    /**
     * @param  string  $data
     * @param $cacheKey
     *
     * @return void
     */
    private function saveDataToCache(string $data, $cacheKey): void
    {
        if ($this->state->isEnabled(ApiCache::TYPE_IDENTIFIER) === false) {
            $this->cache->save($data, $cacheKey, [ApiCache::TYPE_IDENTIFIER],
                ApiCache::LIFETIME);
        }
    }

    /**
     * @param  ActionInterface  $action
     *
     * @return string
     * @throws AssertionFailedException
     */
    private function getApiResourceUrl(ActionInterface $action): string
    {
        $uri = $this->paramBinder->bind($action->getUri(), $action->getParams());

        return $this->systemConfigProvider->getUrl() . DIRECTORY_SEPARATOR . $uri;
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

    /**
     * @param  Action  $action
     *
     * @return string
     */
    private function getCacheKey(Action $action): string
    {
        return implode('_', [ApiCache::TYPE_IDENTIFIER, $this->getEtag($action)]) ;
    }

    private function getEtag(ActionInterface $action): string
    {
        $url = $this->getApiResourceUrl($action);
        $this->curl->setOption(CURLOPT_NOBODY, true);
        $this->curl->get($url);
        $headers = $this->curl->getHeaders();

        return $headers['etag'] ?? '';
    }
}
