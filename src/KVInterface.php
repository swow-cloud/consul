<?php
/**
 * This file is part of Swow-Cloud/Job
 * @license  https://github.com/serendipity-swow/serendipity-job/blob/main/LICENSE
 */

declare(strict_types=1);

namespace SwowCloud\Consul;

interface KVInterface
{
    public function get($key, array $options = []): ConsulResponse;

    public function put($key, $value, array $options = []): ConsulResponse;

    public function delete($key, array $options = []): ConsulResponse;
}
