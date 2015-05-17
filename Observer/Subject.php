<?php
namespace Observer;

interface Subject {
	public function register ( Observer $observer );
	public function unregister ( Observer $observer );
	public function notifyObserver();
}