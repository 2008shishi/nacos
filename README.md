# nacos-php

A PHP implementation of Nacos OpenAPI.

see: https://nacos.io/zh-cn/docs/open-API.html

## Required

- PHP ^7.0

## Install

```bash
composer require shishi/nacos-php
```

## Getting Started

```php
use Nacos\NacosClient;

$client = new NacosClient('localhost', 8848);

$dataId = 'abc';
$group = 'test-group';
$value = $client->getConfig($dataId, $group);
```

## 注意事项 
  1.命名空间和保持ID相同，避免空间ID参数错误
  2.本案例使用有问题，大家及时提出修改更正

## API

### Request Options

- setNamespace
  - string $namespace
- setTimeout
  - int $timeout

### Config API 

- getConfig
  - string $dataId
  - string $group = NacosClient::DEFAULT_GROUP
- publishConfig
  - string $dataId
  - string $group
  - $content
- removeConfig
  - string $dataId
  - string $group = NacosClient::DEFAULT_GROUP
- listenConfig
  - array $configs
  - int $timeout = 30

### Naming API 

- createInstance
  - ServiceInstance $instance
- deleteInstance
  - string $serviceName
  - string $ip
  - int $port
  - string $clusterName = null
  - string $namespaceId = null
- updateInstance
  - ServiceInstance $instance
- getInstanceList
  - string $serviceName
  - string $namespaceId = null
  - array $clusters = []
  - bool $healthyOnly = false
- getInstance
  - string $serviceName
  - string $ip
  - int $port
  - string $namespaceId = null
  - string $cluster = null
  - bool $healthyOnly = false
- sendInstanceBeat
  - string $serviceName
  - BeatInfo $beat
