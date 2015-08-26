<?php

/**
 * Routing for the SocialLogin plugin. This should not be modified.
 */
	Router::connect(
		'/auth/*',
		[
			'plugin' => 'SocialLogin',
			'controller' => 'social',
			'action' => 'opauth'
		]
	);
