<?php
/**
 * This file is part of Swow-Cloud/Job
 * @license  https://github.com/serendipity-swow/serendipity-job/blob/main/LICENSE
 */

declare(strict_types=1);

namespace SwowCloud\Consul;

interface AgentInterface
{
    public function checks(): ConsulResponse;

    public function services(): ConsulResponse;

    public function members(array $options = []): ConsulResponse;

    public function self(): ConsulResponse;

    public function join($address, array $options = []): ConsulResponse;

    public function forceLeave($node): ConsulResponse;

    public function registerCheck($check): ConsulResponse;

    public function deregisterCheck($checkId): ConsulResponse;

    public function passCheck($checkId, array $options = []): ConsulResponse;

    public function warnCheck($checkId, array $options = []): ConsulResponse;

    public function failCheck($checkId, array $options = []): ConsulResponse;

    public function registerService(array $service): ConsulResponse;

    public function deregisterService($serviceId): ConsulResponse;

    public function service(string $serviceId): ConsulResponse;
}
