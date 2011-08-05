<?php
/**
* This file is the basic Leet class file
* @package Leet
* @copyright (c) 2008 Vincent Bruijn
* @license http://www.gnu.org/licenses/gpl-3.0.txt GNU Public License
*/
/**
* Leet class
* Converts some characters, like spaces, to HTML entities
* It adds 1 extra space to each space for readability
* @package Leet
* @version 1.1 May 2009
* @author Vincent Bruijn
* @param $string string to convert to leet
*/
class Leet {
	/**
	* alphabet array
	* @var array alphabet
	*/
	private $leet = array();
	// change characters as you like
	private $a = array("A", "a", "4", "/-\\", "/\\", "@");
	private $b = array("B", "b", "8", "|3", "13", "I3", "6", "]3", "!3", "(3", "/3", ")3");
	private $c = array("C", "c", "[", "(", "&copy;", "<");
	private $d = array("D", "d", "|)", "])", "[)", "I>", "|>");
	private $e = array("E", "e", "3");
	private $f = array("F", "f", "|=", "/=", "ph", "PH");
	private $g = array("G", "g", "6", "9", "(_-", "&amp;", "(_+", "C-");
	private $h = array("H", "h", "|-|", "]-[", "[-]", "|~|", "#", ")-(");
	private $i = array("I", "i", "1", "|", "!");
	private $j = array("J", "j", "_|", "_/");
	private $k = array("K", "k", "|<", "|{");
	private $l = array("L", "l", "|_", "1", "1_");
	private $m = array("M", "m", "|\/|", "//\\\\//\\\\", "|v|", "]V[", "/\/\\", "/|\\", "|V|", "//.", ".\\\\\\");
	private $n = array("N", "n", "|\|", "]\[", "/\/");
	private $o = array("O", "o", "0", "()");
	private $p = array("P", "p", "|?", "|>", "9", "q");
	private $q = array("Q", "q", "(_),", "()_", "O,", "0_");
	private $r = array("R", "r", "2", "|~", "|2", "&reg;");
	private $s = array("S", "s", "5", '$', "Z", "&sect;", "z");
	private $t = array("T", "t", "+", "7");
	private $u = array("U", "u", "|_|", "(_)");
	private $v = array("V", "v", "\/", "\\\\\\//");
	private $w = array("W", "w", "\\\\\\//\\\\\\//", "`//", "\\/\\/", "\\\\\\'", "\V/");
	private $x = array("X", "x", "}{", "><");
	private $y = array("Y", "y", "`/");
	private $z = array("Z", "z", "2", "7_", "~/_");
	
	/**
	* the public accessable converted string
	* @var array converted string
	*/
	public $converted = array();

	/**
	* Constructor
	* @param string $string
	*/
	public function __construct($string) {
		// strip tags and change string to lowercase
		$string = strip_tags ($string);
		$string = strtolower ($string);

		// iterate through each charachter of the string
		for ($j = 0; $j < strlen ($string); $j++) {
			// build an associative array  for the alphabet based on the ascii-table
			for ($i = 97; $i < 123; $i++) {
				$this->leet[chr ($i)] = $this->{chr ($i)}[array_rand ($this->{chr ($i)})];
			}
			// add some other characters
			$this->leet[" "] = "  ";
			$this->leet["."] = ".";
			$this->leet["!"] = "!";
			$this->leet["?"] = "?";
			$this->leet[","] = ",";
			$this->leet["'"] = "'";
			$this->leet['"'] = '"';
			$this->leet['-'] = '-';
			$this->leet[':'] = ':';
			// add numbers, which will stay numbers
			for ($k = 0; $k < 10; $k++) {
			    $this->leet["$k"] = "$k";
			}
			// replace the character with a leet-character
			if (array_key_exists($string[$j], $this->leet)) {
				$this->converted[] = preg_replace ("[" . $string[$j] . "]", $this->leet[$string[$j]], $string[$j]);
			}
			// unset $this->leet so all characters will be different leet-characters
			unset ($this->leet);
		}
		// turn array into string
		$this->converted = implode ($this->converted, "");
		// do some HTML-entities conversion
		$this->converted = str_replace ("<", "&lt;", $this->converted);
		$this->converted = str_replace (">", "&gt;", $this->converted);
		// wrap it all up
		$this->converted = wordwrap($this->converted, 100);
		$this->converted = str_replace (" ", "&nbsp;", $this->converted);
	}
}