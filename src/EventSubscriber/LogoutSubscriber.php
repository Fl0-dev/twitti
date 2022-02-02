<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\LogoutEvent;

class LogoutSubscriber implements EventSubscriberInterface {

	/*
		The array keys are event names and the value can be:

		The method name to call (priority defaults to 0)
		An array composed of the method name to call and the priority
		An array of arrays composed of the method names to call and respective priorities, or 0 if unset
		For instance:

		['eventName' => 'methodName']
		['eventName' => ['methodName', $priority]]
		['eventName' => [['methodName1', $priority], ['methodName2']]]
		The code must not depend on runtime state as it will only be called at compile time. All logic depending on runtime state must be put into the individual methods handling the events.

		@return array<string, string|array{0:string, 1:int}|list<array{0:string, 1?:int}>>
	*/
	public static function getSubscribedEvents() {
		return [
			LogoutEvent::class => ["onLogout", 1]
		];
	}

	public static function onLogout(LogoutEvent $e) {
		// called on logout
	}

}