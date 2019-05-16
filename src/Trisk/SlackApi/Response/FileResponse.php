<?php

namespace Trisk\SlackApi\Response;

use Illuminate\Support\Collection;

/**
 * Class FileResponse
 *
 * @package Trisk\SlackApi\Response
 */
class FileResponse extends SlackResponse
{
    /**
     * @var Collection
     */
    protected $files;

    /**
     * FileResponse constructor.
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
        parent::__construct($response);

        $this->setFiles($this->arrayGet($response, 'files', []));
    }

    /**
     * @return Collection
     */
    public function files(): Collection
    {
        return $this->files;
    }

    /**
     * @param array $files
     *
     * @return FileResponse
     */
    private function setFiles(array $files): FileResponse
    {
        $this->files = collect($files);

        return $this;
    }
}
