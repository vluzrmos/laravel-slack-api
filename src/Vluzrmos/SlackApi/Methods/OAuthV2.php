<?php

namespace Vluzrmos\SlackApi\Methods;

use Vluzrmos\SlackApi\Contracts\SlackOAuthV2;

class OAuthV2 extends SlackMethod implements SlackOAuthV2
{
    protected $methodsGroup = 'oauth.v2.';

    /**
     * 	Exchanges a temporary OAuth verifier code for an access token.
     * @param string $code
     * @param array  $options ['redirect_uri' => 'https://...', 'client_id' => '...', 'client_secret' => '...']
     *
     * @return array
     */
    public function access($code, $options = [])
    {
        return $this->method('access', array_merge([
            'code' => $code,
        ], $options));
    }
}
