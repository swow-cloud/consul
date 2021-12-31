<?php
/**
 * This file is part of Swow-Cloud/Job
 * @license  https://github.com/serendipity-swow/serendipity-job/blob/main/LICENSE
 */

declare(strict_types=1);

namespace SwowCloud\Consul;

interface CatalogInterface
{
    public function register($node): ConsulResponse;

    public function deregister($node): ConsulResponse;

    public function datacenters(): ConsulResponse;

    public function nodes(array $options = []): ConsulResponse;

    public function node($node, array $options = []): ConsulResponse;

    public function services(array $options = []): ConsulResponse;

    public function service($service, array $options = []): ConsulResponse;
}
