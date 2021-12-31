<?php
/**
 * This file is part of Swow-Cloud/Job
 * @license  https://github.com/serendipity-swow/serendipity-job/blob/main/LICENSE
 */

declare(strict_types=1);

namespace SwowCloud\Consul;

interface SessionInterface
{
    public function create($body = null, array $options = []): ConsulResponse;

    public function destroy($sessionId, array $options = []): ConsulResponse;

    public function info($sessionId, array $options = []): ConsulResponse;

    public function node($node, array $options = []): ConsulResponse;

    public function all(array $options = []): ConsulResponse;

    public function renew($sessionId, array $options = []): ConsulResponse;
}
