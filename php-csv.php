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

	private function is_not_empty_string_array($var) {
		return $var[0] !== '';
	}

	public function decode($string) {
		//separate into rows
		$rows = explode("\n", $string);

		//separate rows into columns
		$columns = array_map(array($this, 'decode_row'), $rows);

		return array_filter($columns, array($this, 'is_not_empty_string_array'));
	}

	public function encode($array) {
		$string = '';
		foreach ($array as $row) {
			$string .= implode(',', $row) . "\n";
		}
		return $string;
	}
}
