<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\LogoutEvent;

class LogoutSubscriber implements EventSubscriberInterface {

	public static function getSubscribedEvents() {
		return [
			LogoutEvent::class => ["onLogout", 1]
		];
	}

	public static function onLogout(LogoutEvent $e) {
		// called on logout
	}

}