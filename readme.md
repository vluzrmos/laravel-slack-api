## Laravel 5 e Lumen - Slack API Facade

This package provides a simple way to get json objects provided by [Slack API](https://api.slack.com), all allowed methods you could see here: [Slack Web API Methods](https://api.slack.com/methods).

[![Latest Stable Version](https://poser.pugx.org/vluzrmos/slack-api/v/stable.svg)](https://packagist.org/packages/vluzrmos/slack-api) [![Total Downloads](https://poser.pugx.org/vluzrmos/slack-api/downloads.svg)](https://packagist.org/packages/vluzrmos/slack-api) [![Latest Unstable Version](https://poser.pugx.org/vluzrmos/slack-api/v/unstable.svg)](https://packagist.org/packages/vluzrmos/slack-api) [![License](https://poser.pugx.org/vluzrmos/slack-api/license.svg)](https://packagist.org/packages/vluzrmos/slack-api)

## Instalation 

<code>composer require vluzrmos/slack-api</code>

## Instalation on Laravel 5
Add to <code>config/app.php</code>

```php
'providers' => [
    'Vluzrmos\SlackApi\SlackApiServiceProvider',
]
```

and add the Facade to your aliases:
```php
'aliases' => [
    'SlackApi' => 'Vluzrmos\SlackApi\SlackApiFacade',
]
```

## Instalation on Lumen

Add that line on <code>bootstrap/app.php</code>
```php
// $app->register('App\Providers\AppServiceProvider'); (by default that comes commented)

   $app->register('Vluzrmos\SlackApi\SlackApiServiceProvider');
```

If you want to use the facade, add this lines on <code>bootstrap/app.php</code>
```php
class_alias('Vluzrmos\SlackApi\SlackApiFacade', 'SlackApi');
```
Otherwise, just use the singleton:

```php
  $slackapi = app('slackapi');
```

## Configuration

configure your slack team token in <code>config/services.php</code> 
```php 
    
'slack' => [
    'token' => 'xop-sp-easeu-erahsuer-esrasher'
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

## Using Dependencie Injection

```php
<?php 

namespace App\Http\Controllers;    
    
use Vluzrmos\SlackApi\Contracts\SlackApi;

class YourController extends Controller{
    
    /** @var  SlackApi */
    protected $slack;
    
    public function __construct(SlackApi as $slack){
        $this->slack = $slack;   
    }
    
    public function controllerMethod(){
        $usersList = $this->slack->get('users.list');
    }
}
```

## License

[DBAD License](https://dbad-license.org).
