<?php

namespace Trisk\SlackApi\Response;

use Illuminate\Support\Collection;

/**
 * Class SlackResponse
 *
 * @package Trisk\SlackApi\Response
 */
class SlackResponse
{
    /**
     * @var bool
     */
    protected $ok;

    /**
     * @var null|string
     */
    protected $error;

    /**
     * SlackResponse constructor.
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
        $this->setOk((bool)$this->arrayGet($response, 'ok', false))
            ->setError($this->arrayGet($response, 'error'));
    }

    /**
     * @return bool
     */
    public function ok(): bool
    {
        return $this->ok;
    }

    /**
     * @param bool $ok
     *
     * @return SlackResponse
     */
    private function setOk(bool $ok): SlackResponse
    {
        $this->ok = $ok;

        return $this;
    }

    /**
     * @return null|string
     */
    public function error(): ?string
    {
        return $this->error;
    }

    /**
     * @param null|string $error
     *
     * @return SlackResponse
     */
    private function setError(?string $error): SlackResponse
    {
        $this->error = $error;

        return $this;
    }

    /**
     * @param array  $array
     * @param string $key
     * @param mixed   $default
     *
     * @return mixed
     */
    protected function arrayGet(array $array, string $key, $default = null)
    {
        return \Illuminate\Support\Arr::get($array, $key, $default);
    }
}
