<?php
/**
 * This file is part of Swow-Cloud/Job
 * @license  https://github.com/serendipity-swow/serendipity-job/blob/main/LICENSE
 */

declare(strict_types=1);

namespace SwowCloud\Consul;

class Catalog extends Client implements CatalogInterface
{
    public function register($node): ConsulResponse
    {
        $params = [
            'body' => json_encode($node, JSON_THROW_ON_ERROR),
        ];

        return $this->request('PUT', '/v1/catalog/register', $params);
    }

    public function deregister($node): ConsulResponse
    {
        $params = [
            'body' => json_encode($node, JSON_THROW_ON_ERROR),
        ];

        return $this->request('PUT', '/v1/catalog/deregister', $params);
    }

    public function datacenters(): ConsulResponse
    {
        return $this->request('GET', '/v1/catalog/datacenters');
    }

    public function nodes(array $options = []): ConsulResponse
    {
        $params = [
            'query' => $this->resolveOptions($options, ['dc']),
        ];

        return $this->request('GET', '/v1/catalog/nodes', $params);
    }

    public function node($node, array $options = []): ConsulResponse
    {
        $params = [
            'query' => $this->resolveOptions($options, ['dc']),
        ];

        return $this->request('GET', '/v1/catalog/node/' . $node, $params);
    }

    public function services(array $options = []): ConsulResponse
    {
        $params = [
            'query' => $this->resolveOptions($options, ['dc']),
        ];

        return $this->request('GET', '/v1/catalog/services', $params);
    }

    public function service($service, array $options = []): ConsulResponse
    {
        $params = [
            'query' => $this->resolveOptions($options, ['dc', 'tag']),
        ];

        return $this->request('GET', '/v1/catalog/service/' . $service, $params);
    }
}
