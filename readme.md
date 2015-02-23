## Laravel 5 - Slack API Facade



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
    'token' => 'xop-sp-easeu-erahsuer-esrasher', //user token with admin primilegies https://api.slack.com/web#authentication,
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

```
    
## License

[DBAD License](https://dbad-license.org).
