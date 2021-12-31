<?php
/**
 * This file is part of Swow-Cloud/Job
 * @license  https://github.com/serendipity-swow/serendipity-job/blob/main/LICENSE
 */

declare(strict_types=1);

namespace SwowCloud\Consul;

class Agent extends Client implements AgentInterface
{
    public function checks(): ConsulResponse
    {
        return $this->request('GET', '/v1/agent/checks');
    }

    public function services(): ConsulResponse
    {
        return $this->request('GET', '/v1/agent/services');
    }

    public function members(array $options = []): ConsulResponse
    {
        $params = [
            'query' => $this->resolveOptions($options, ['wan']),
        ];

        return $this->request('GET', '/v1/agent/members', $params);
    }

    public function self(): ConsulResponse
    {
        return $this->request('GET', '/v1/agent/self');
    }

    public function join($address, array $options = []): ConsulResponse
    {
        $params = [
            'query' => $this->resolveOptions($options, ['wan']),
        ];

        return $this->request('GET', '/v1/agent/join/' . $address, $params);
    }

    public function forceLeave($node): ConsulResponse
    {
        return $this->request('PUT', '/v1/agent/force-leave/' . $node);
    }

    public function registerCheck($check): ConsulResponse
    {
        $params = [
            'body' => json_encode($check, JSON_THROW_ON_ERROR),
        ];

        return $this->request('PUT', '/v1/agent/check/register', $params);
    }

    public function deregisterCheck($checkId): ConsulResponse
    {
        return $this->request('PUT', '/v1/agent/check/deregister/' . $checkId);
    }

    public function passCheck($checkId, array $options = []): ConsulResponse
    {
        $params = [
            'query' => $this->resolveOptions($options, ['note']),
        ];

        return $this->request('PUT', '/v1/agent/check/pass/' . $checkId, $params);
    }

    public function warnCheck($checkId, array $options = []): ConsulResponse
    {
        $params = [
            'query' => $this->resolveOptions($options, ['note']),
        ];

        return $this->request('PUT', '/v1/agent/check/warn/' . $checkId, $params);
    }

    public function failCheck($checkId, array $options = []): ConsulResponse
    {
        $params = [
            'query' => $this->resolveOptions($options, ['note']),
        ];

        return $this->request('PUT', '/v1/agent/check/fail/' . $checkId, $params);
    }

    public function registerService(array $service): ConsulResponse
    {
        $params = [
            'body' => json_encode($service, JSON_THROW_ON_ERROR),
        ];

        return $this->request('PUT', '/v1/agent/service/register', $params);
    }

    public function deregisterService($serviceId): ConsulResponse
    {
        return $this->request('PUT', '/v1/agent/service/deregister/' . $serviceId);
    }

    public function service(string $serviceId): ConsulResponse
    {
        return $this->request('GET', sprintf('/v1//agent/service/%s', $serviceId));
    }
}
