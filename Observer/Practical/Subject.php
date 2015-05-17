<?php
namespace Observer\Practical;

interface Subject {
	public function register ( Observer $observer );
	public function unregister ( Observer $observer );
	public function notifyObservers ( $author, $message );
}