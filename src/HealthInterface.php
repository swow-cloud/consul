<?php
/**
 * This file is part of Swow-Cloud/Job
 * @license  https://github.com/serendipity-swow/serendipity-job/blob/main/LICENSE
 */

declare(strict_types=1);

namespace SwowCloud\Consul;

interface HealthInterface
{
    public function node($node, array $options = []): ConsulResponse;

    public function checks($service, array $options = []): ConsulResponse;

    public function service($service, array $options = []): ConsulResponse;

    public function state($state, array $options = []): ConsulResponse;
}
