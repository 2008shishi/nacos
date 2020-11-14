<?php

namespace Nacos;

use Nacos\Exceptions\NacosNamingNoAliveInstance;
use Nacos\Utils\RandomByWeightSelector;

class NacosNaming
{
    /**
     * @var NacosClient
     */
    protected $client;

    public function __construct(NacosClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param $serviceName
     * @param null $namespaceId
     * @return Models\ServiceInstance
     * @throws \Exception
     */
    public function selectOneHealthyInstance($serviceName,$namespaceId = null)
    {
        $list = $this->client->getInstanceList($serviceName,$namespaceId);

        if (count($list->hosts) === 0) {
            throw new NacosNamingNoAliveInstance("$serviceName no alive instnace");
        }

        return RandomByWeightSelector::select($list->hosts);
    }

    /**
     * @return NacosClient
     */
    public function getClient(): NacosClient
    {
        return $this->client;
    }
}
