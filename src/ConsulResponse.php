<?php
/**
 * This file is part of Swow-Cloud/Job
 * @license  https://github.com/serendipity-swow/serendipity-job/blob/main/LICENSE
 */

declare(strict_types=1);

namespace SwowCloud\Consul;

use Hyperf\Utils\Arr;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use SwowCloud\Consul\Exception\ServerException;

/**
 * @method int getStatusCode()
 * @method string getReasonPhrase()
 * @method StreamInterface getBody()
 */
class ConsulResponse
{
    private ResponseInterface $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    public function __call($name, $arguments)
    {
        return $this->response->{$name}(...$arguments);
    }

    public function json(string $key = null, $default = null)
    {
        if ($this->response->getHeaderLine('Content-Type') !== 'application/json') {
            throw new ServerException('The Content-Type of response is not equal application/json');
        }
        $data = json_decode((string) $this->response->getBody(), true, 512, JSON_THROW_ON_ERROR);
        if (!$key) {
            return $data;
        }

        return Arr::get($data, $key, $default);
    }
}
