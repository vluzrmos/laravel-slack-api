## Laravel 5 - Slack API Facade

This package provides a simple way to get json objects provided by [Slack API](https://api.slack.com), all allowed methods you could see here: [Slack Web API Methods](https://api.slack.com/methods).

[![Latest Stable Version](https://poser.pugx.org/vluzrmos/slack-api/v/stable.svg)](https://packagist.org/packages/vluzrmos/slack-api) [![Total Downloads](https://poser.pugx.org/vluzrmos/slack-api/downloads.svg)](https://packagist.org/packages/vluzrmos/slack-api) [![Latest Unstable Version](https://poser.pugx.org/vluzrmos/slack-api/v/unstable.svg)](https://packagist.org/packages/vluzrmos/slack-api) [![License](https://poser.pugx.org/vluzrmos/slack-api/license.svg)](https://packagist.org/packages/vluzrmos/slack-api)

## Instalation
<code>composer require "vluzrmos/slack-api=~0.0"</code>

Add to <code>config/app.php</code>
```php
'providers' => [
    'Vluzrmos\SlackApi\SlackApiServiceProviders',
]
```

and add the Facade to your aliases:
```php
'aliases' => [
    'SlackApi' => 'Vluzrmos\SlackApi\SlackApiFacade',
]
```

configure your slack team token in <code>config/services.php</code> 
```php 
    
'slack' => [
    'token' => 'xop-sp-easeu-erahsuer-esrasher', //user token with admin privilegies https://api.slack.com/web#authentication,
    'ssl_verify' => 'path/to/ssl/certificates/curl-ca-bundle.crt' // by default the git curl-ca-bundle.crt will be good. it is in /your-git-dir/git/curl-ca-bundle.crt
]

```

## Usage
```php
// List users on your team
SlackApi::get('users.list');

// List channels on your team
SlackApi::get('channels.list');

// Invite users from email
SlackApi::post('users.admin.invite', ['body' => [
    'first_name' => 'John',
    'last_name'  => 'Doe',
    'email' => 'example@example.com',
    '_attempts' => 1,
    'channels' => 'UXE-!12312,UE0A-23123' //get the channels ids with SlackApi::get('channels.list')
]]);

// or any method oh the  Slack Web API Methods - https://api.slack.com/methods.

//or create macros to common functions:
SlackApi::macro('inviteMember', function($email, $username="", $channels=""){
    return SlackApi::post('users.admin.invite', ['body' => [
        'first_name' => $username,
        'email' => $email,
        '_attempts' => 1,
        'channels' => $channels
    ]]);
});

SlackApi::inviteMember('example@example.com', "John Doe");

// HTTP Verbs avaliable: (in most cases, you will only need the GET and POST verbs)
SlackApi::get($apiMethod, $parameters);
SlackApi::post($apiMethod, $parameters);
SlackApi::put($apiMethod, $parameters);
SlackApi::delete($apiMethod, $parameters);
SlackApi::patch($apiMethod, $parameters);

//Parameters settings
$parameters = [
    'query' => [
        'something' => 'value'
    ],
    'body' => [
        'anotherthing' => 'anothervalue'
    ]
];

The query parameters will append values to the url like: &something=value
The body parameters will be sent like form-data
```
    
## License

[DBAD License](https://dbad-license.org).
