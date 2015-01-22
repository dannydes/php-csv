<?php

interface iCSV {
	public function decode($string);
	public function encode($array);

	public function decode_row($string);
}

class CSV implements iCSV {
	private static $instance = NULL;

	private function __construct() { }

	public function getInstance() {
		if (self::$instance === NULL) {
			self::$instance = new CSV();
		}
		return self::$instance;
	}

	public function decode_row($string) {
		return explode(',', $string);
	}

	public function decode($string) {
		//separate into rows
		$rows = explode(';', $string);
		$rows = array_map('trim', $rows);

		//separate rows into columns
		return array_map(array($this, 'decode_row'), $rows);
	}

	public function encode($array) {
		$string = '';
		foreach ($array as $row) {
			$string .= implode(',', $row) . ';';
		}
		return $string;
	}
}
