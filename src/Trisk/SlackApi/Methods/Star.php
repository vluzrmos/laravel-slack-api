<?php
/**
 * Created by PhpStorm.
 * User: Trisk
 * Date: 16/06/15
 * Time: 02:43.
 */
namespace Trisk\SlackApi\Methods;

use Trisk\SlackApi\Contracts\StarContract;
use Trisk\SlackApi\Response\StarResponse;

/**
 * Class Star
 *
 * @package Trisk\SlackApi\Methods
 */
class Star extends SlackMethod implements StarContract
{
    /**
     * @var string
     */
    protected $methodsGroup = 'stars.';

    /**
     * @inheritdoc
     */
    public function lists(?string $user = null, array $options = []): StarResponse
    {
        return new StarResponse($this->method('list', array_merge(['user' => $user], $options)));
    }

    /**
     * @inheritdoc
     */
    public function all(?string $user = null, array $options = []): StarResponse
    {
        return $this->lists($user, $options);
    }
}
