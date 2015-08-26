# Introduction

A [CakePHP](http://cakephp.org) plugin built to facilitate the [Opauth 1.0](http://ceeram.github.io/blog/2013/06/22/opauth-1-dot-0-alpha-arriving-soon/) functionality. 

# Installation of Plugin

Insert the following in your Config/bootstrap.php file:

<pre>CakePlugin::load(['SocialLogin' => ['routes' => true]]);
Configure::write('Opauth', [
	'Strategy' => [
		'Twitter' => [
			'key' => 'twitter_key',
			'secret' => 'twitter_secret'
		],
		'Facebook' => [
			'app_id' => 'facebook_app_id',
			'app_secret' => 'facebook_app_secret'
		],
		'Google' => [
			'client_id' => 'google_client_id',
			'client_secret' => 'google_client_secret'
		],
		'LinkedIn' => [
			'api_key' => 'linkedin_api_key',
			'secret_key' => 'linkedin_secret_key'
		],
	],
	'path' => '/login/',
	'redirect' => '/where-to-redirect-after-login'
]);</pre>

Then run: `composer install/update`

# Testing

If you want to authorize your app with Google, first [create your Google app](https://code.google.com/apis/console/). 
Next, add your `client_id` and `client_secret` in your config array (see above). 
Finally, browse to `yourapp.com/login/google`. The app should prompt you to authorize through your Google account, and then redirect you to the page you specified in your config array.