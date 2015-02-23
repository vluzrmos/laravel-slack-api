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
    SlackApi::get('users.list')
    SlackApi::get('channels.list')
    SlackApi::post('users.admin.invite')
```
    
## License

[DBAD License](https://dbad-license.org).
