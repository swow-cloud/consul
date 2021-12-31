<?php
/**
 * This file is part of Swow-Cloud/Job
 * @license  https://github.com/serendipity-swow/serendipity-job/blob/main/LICENSE
 */

declare(strict_types=1);

namespace SwowCloud\Consul;

class KV extends Client implements KVInterface
{
    public function get($key, array $options = []): ConsulResponse
    {
        $params = [
            'query' => $this->resolveOptions($options, ['dc', 'recurse', 'keys', 'separator', 'raw', 'stale', 'consistent', 'default']),
        ];

        return $this->request('GET', '/v1/kv/' . $key, $params);
    }

    public function put($key, $value, array $options = []): ConsulResponse
    {
        $params = [
            'body' => json_encode($value, JSON_THROW_ON_ERROR),
            'query' => $this->resolveOptions($options, ['dc', 'flags', 'cas', 'acquire', 'release']),
        ];

        return $this->request('PUT', '/v1/kv/' . $key, $params);
    }

    public function delete($key, array $options = []): ConsulResponse
    {
        $params = [
            'query' => $this->resolveOptions($options, ['dc', 'recurse']),
        ];

        return $this->request('DELETE', '/v1/kv/' . $key, $params);
    }
}
