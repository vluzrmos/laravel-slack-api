<?php

namespace Trisk\SlackApi\Methods;

use Trisk\SlackApi\Contracts\FileContract;
use Trisk\SlackApi\Response\FileResponse;

/**
 * Class File
 *
 * @package Trisk\SlackApi\Methods
 */
class File extends SlackMethod implements FileContract
{
    /**
     * @var string
     */
    protected $methodsGroup = 'files.';

    /**
     * @inheritdoc
     */
    public function delete(string $file): FileResponse
    {
        return $this->arrayToResponse($this->method('delete', compact('file')));
    }

    /**
     * @inheritdoc
     */
    public function info(string $file, array $options = []): FileResponse
    {
        return $this->arrayToResponse($this->method('info', array_merge(compact('file'), $options)));
    }

    /**
     * @inheritdoc
     */
    public function lists(array $options = []): FileResponse
    {
        return $this->arrayToResponse($this->method('list', $options));
    }

    /**
     * @inheritdoc
     */
    public function all(array $options = []): FileResponse
    {
        return $this->lists($options);
    }

    /**
     * @inheritdoc
     */
    public function upload(array $options = []): FileResponse
    {
        return $this->arrayToResponse($this->method('upload', $options));
    }

    /**
     * @param array $response
     *
     * @return FileResponse
     */
    private function arrayToResponse(array $response): FileResponse
    {
        return new FileResponse($response);
    }
}
