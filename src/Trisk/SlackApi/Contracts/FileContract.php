<?php

namespace Trisk\SlackApi\Contracts;

use Trisk\SlackApi\Response\FileResponse;

/**
 * Interface FileContract
 *
 * @package Trisk\SlackApi\Contracts
 */
interface FileContract
{
    /**
     * This method deletes a file from your team.
     *
     * @param string $file ID of file to delete.
     *
     * @return FileResponse
     */
    public function delete(string $file): FileResponse;

    /**
     * This method returns information about a file in your team.
     *
     * @param string $file File to fetch info for
     * @param array $options ['count' = 100, 'page' => 1]
     *
     * @return FileResponse
     */
    public function info(string $file, array $options = []): FileResponse;

    /**
     * This method returns a list of files within the team. It can be filtered and sliced in various ways.
     *
     * @param array $options      <pre>
     *                            [
     *                            "user" => "U123S567D90", //Filter files created by a single user.
     *                            "ts_from" => 123456789, //Filter files created after this timestamp (inclusive).
     *                            "ts_to"   => "now",  //Filter files created before this timestamp (inclusive).
     *                            "types"   =>  "all", //Filter files by type: all, posts, snippets, images, gdocs, zips, pdfs
     *                            								   //You can pass multiple values in the types argument, like types=posts,snippets.The default value is all, which does not filter the list.
     *                            "count" => 100, //Number of items to return per page.
     *                            "page"  => 1 //Page number of results to return.
     *                            ]
     *                            </pre>
     *
     * @return FileResponse
     */
    public function lists(array $options = []): FileResponse;

    /**
     * Alias to lists.
     *
     * @param array $options
     *
     * @return FileResponse
     */
    public function all(array $options = []): FileResponse;

    /**
     * This method allows you to create or upload an existing file.
     *
     * @param array $options available options: <pre>
     * "file" => "..." //File contents via multipart/form-data. br
     * "content" => "..." //File contents via a POST var.
     * "filetype" => "php" //Slack-internal file type identifier.
     * "filename" => "filename.txt" //Filename of file.
     * "title" => "My File", //Title of file
     * "initial_comment" => "The best!", //Initial comment to add to file.
     * "channels" => "channel1,channel2", //Comma separated list of channels to share the file into.
     * </pre>
     *
     * @return FileResponse
     */
    public function upload(array $options = []): FileResponse;
}
