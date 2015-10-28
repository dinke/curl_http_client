CurlHttpClient
================
Curl based HTTP Client - Simple but effective OOP wrapper around Curl php lib.
It allows sending post/get requests, using proxy, binding to specific IP, storing cookies etc.

# Installation
Add CurlHttpClient to your composer.json

```
{
    "require": {
        "dinke/curl-http-client": "^2.0"
    }
}
```
##### For Laravel 5.1 add this to the config/app.php file: 
```php
'providers'  => [
	...
	Dinke\CurlServiceProvider::class,
],

'aliases'  => [
	...
	'Curl'      => Dinke\CurlFacade::class,
],
```

# Usage

##### Basic usage
```php
$curl = new \Dinke\Curl();

$curl->setUserAgent('Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:41.0)');
$curl->storeCookies('/tmp/cookies.txt');

$post_data = ['login' => 'pera', 'password' => 'joe'];
$html_data = $curl->sendPostData('http://www.foo.com/login.php', $post_data);

echo $html_data;


// if you have more than one IP on your server,
// you can also bind to specific IP address like ...
// $bind_ip = "192.168.0.1";
// $curl->fetchUrl("http://www.foo.com/login.php", $bind_ip);
// $html_data = $curl->sendPostData("http://www.foo.com/login.php", $post_data, $bind_ip);

// use proxy
$curl->setProxy('http://www.proxyurl.com');

// use proxy auth
$curl->setProxyAuth('user:pass');

// get http response code for last request
$http_code = $curl->getHttpResponseCode();

// get last http request duration in sec
$duration = $curl->get_requestDuration();

// Curl curent Version
echo $curl::VERSION; 
or 
echo $curl->getVersion();
```

##### Laravel 5.1 usage
```php
Curl::setUserAgent('Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:41.0)');
Curl::storeCookies(storage_path('cookies.txt'));

$post_data = ['login' => 'pera', 'password' => 'joe'];
$html_data = Curl::sendPostData('http://www.foo.com/login.php', $post_data);

dd($html_data);

// if you have more than one IP on your server,
// you can also bind to specific IP address like ...
$bind_ip = "192.168.0.1";
Curl::fetchUrl("http://www.foo.com/login.php", $bind_ip);
$html_data = Curl::sendPostData("http://www.foo.com/login.php", $post_data, $bind_ip);


// use proxy
Curl::setProxy('http://www.proxyurl.com');

// use proxy auth
Curl::setProxyAuth('user:pass');

// get http response code for last request
$http_code = Curl::getHttpResponseCode();

// get last http request duration in sec
$duration = Curl::get_requestDuration();

// Curl curent Version
echo Curl::getVersion();
```