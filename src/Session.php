<?php
/**
 * This file is part of Swow-Cloud/Job
 * @license  https://github.com/serendipity-swow/serendipity-job/blob/main/LICENSE
 */

declare(strict_types=1);

namespace SwowCloud\Consul;

class Session extends Client implements SessionInterface
{
    public function create($body = null, array $options = []): ConsulResponse
    {
        $params = [
            'body' => json_encode($body, JSON_THROW_ON_ERROR),
            'query' => $this->resolveOptions($options, ['dc']),
        ];

        return $this->request('PUT', '/v1/session/create', $params);
    }

    public function destroy($sessionId, array $options = []): ConsulResponse
    {
        $params = [
            'query' => $this->resolveOptions($options, ['dc']),
        ];

        return $this->request('PUT', '/v1/session/destroy/' . $sessionId, $params);
    }

    public function info($sessionId, array $options = []): ConsulResponse
    {
        $params = [
            'query' => $this->resolveOptions($options, ['dc']),
        ];

        return $this->request('GET', '/v1/session/info/' . $sessionId, $params);
    }

    public function node($node, array $options = []): ConsulResponse
    {
        $params = [
            'query' => $this->resolveOptions($options, ['dc']),
        ];

        return $this->request('GET', '/v1/session/node/' . $node, $params);
    }

    public function all(array $options = []): ConsulResponse
    {
        $params = [
            'query' => $this->resolveOptions($options, ['dc']),
        ];

        return $this->request('GET', '/v1/session/list', $params);
    }

    public function renew($sessionId, array $options = []): ConsulResponse
    {
        $params = [
            'query' => $this->resolveOptions($options, ['dc']),
        ];

        return $this->request('PUT', '/v1/session/renew/' . $sessionId, $params);
    }
}
