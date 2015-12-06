<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller
{


	public function initialize()
	{
		$this->loadComponent('Flash');
		$this->loadComponent('Auth', [
			'authorize' => ['Controller'], // Added this line
			'loginRedirect' => [
				'controller' => 'Articles',
				'action' => 'index'
			],
			'logoutRedirect' => [
				'controller' => 'Pages',
				'action' => 'display',
				'home'
			]
		]);
	}
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
	public function isAuthorized($user)
	{
		// Admin can access every action
		if (isset($user['role']) && $user['role'] === 'admin') {
			return true;
		}

		// Default deny
		return false;
	}
	 public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['index', 'view', 'display']);
    }
}
