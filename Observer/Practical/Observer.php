<?php
namespace Observer\Practical;

interface Observer {
	public function update ( $author, $message );
}
