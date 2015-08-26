<?php
App::uses('SocialLoginAppController', 'SocialLogin.Controller');
App::uses('CakeEventManager', 'Event');
/**
 * Social Controller
 *
 */
class SocialController extends SocialLoginAppController {

/**
 * Scaffold
 *
 * @var mixed
 */
	public $components = ['Session'];

	/***********
	Method: 	opauth
	Expects: 	$expected_var
	Returns:	$return_var
	Purpose: 	
	*/
	public function opauth() {
		$config = Configure::read('Opauth');
		$Opauth = new Opauth\Opauth($config);
		$opAuthData = $Opauth->run();

		if ( isset($config['Strategy']['Google']['restrict_to']) ) {
			$domain = substr(
				$opAuthData->info['email'],
				strpos($opAuthData->info['email'], '@') + 1
			);
			if ( $domain !== $config['Strategy']['Google']['restrict_to'] ) {
				$this->redirect($config['login'] . '?emphasis');
			}
		}
		$event = new CakeEvent('SocialLogin.afterAuth', $this, [
			'opAuthData' => $opAuthData,
			'controllerInfo' => $this
		]);
		CakeLog::write('event', 'SocialLogin.afterAuth event dispatched');
		$this->getEventManager()->dispatch($event);

		if ( $this->Session->read('last_viewed_page') ) {
			$this->redirect($this->Session->read('last_viewed_page'));
		} else {
			$this->redirect($config['redirect']);
		}
	} // end of opauth method
}
