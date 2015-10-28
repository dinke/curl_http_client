<?php
/**
 * @version 2.0.8
 * @copyright &copy; 2014 Lampix.net
 * @author Dragan Dinic <dragan@dinke.net>
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */

require 'vendor/autoload.php';

$curl = new \Dinke\Curl();

//pretend to be Firefox 41.0 on Mac
$useragent = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:41.0)";
$curl->setUserAgent($useragent);

//uncomment next two lines if you want to automatically manage cookies
//which will store them to file and send them on each http request
//$cookies_file = "/tmp/cookies.txt";
//$curl->storeCookies($cookies_file);

//Uncomment next line if you want to set credentials for basic http_auth
//$curl->setCredentials($username, $password);

//Uncomment next line if you want to set specific referrer
//$curl->setReferer('http://www.foo.com/referer_url/');

//if you want to send some post data
//form post data array like this one
$post_data = ['login' => 'pera', 'password' => 'joe', 'other_foo_field' => 'foo_value'];
//or like a string: $post_data = 'login=pera&password=joe&other_foo_field=foo_value';

//and send request to http://www.foo.com/login.php. Result page is stored in $html_data string
$html_data = $curl->sendPostData("http://www.foo.com/login.php", $post_data);

//You can also fetch data from somewhere using get method!
//Fetch html from url
$html_data = $curl->fetchUrl("http://www.foo.com/foobar.php?login=pera&password=joe&other_foo_field=foo_value");

//if you have more than one IP on your server,
//you can also bind to specific IP address like ...
//$bind_ip = "192.168.0.1";
//$curl->fetchUrl("http://www.foo.com/login.php", $bind_ip);
//$html_data = $curl->sendPostData("http://www.foo.com/login.php", $post_data, $bind_ip);

//and there are many other things you can do like

//use proxy
//$curl->setProxy('http://www.proxyurl.com');

//use proxy auth
//$curl->setProxyAuth('user:pass');

//get http response code for last request
//$http_code = $curl->getHttpResponseCode();

//get last http request duration in sec
//$duration = $curl->getRequestDuration();



