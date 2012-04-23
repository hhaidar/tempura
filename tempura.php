<?php

/**
 * tempura.php - a simple php template system
 *
 * @author      Houssam Haidar <me@houssam.org>
 * @copyright   2012 Houssam Haidar
 * @license     http://www.opensource.org/licenses/MIT
 *
 * MIT LICENSE
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

class Tempura {

	private $_vars, $_config;

	public function __construct($config = array()) {
		$this->_vars = array();
		$this->_config = $config;
		return $this;
	}

	public function render($view) {
		$path = isset($this->_config['path']) ? $this->_config['path'] . '/' : false;
		$extension = isset($this->_config['extension']) ? $this->_config['extension'] : false;
		include "$path$view$extension";
		return $this;
	}

	public function set($vars, $val = false) {
		if (is_array($vars)) {
			$this->_vars = array_merge($this->_vars, $vars);
		} else {
			$this->_vars[$vars] = $val;
		}
		return $this;
	}

	public function get($var) {
		return isset($this->_vars[$var]) ? $this->_vars[$var] : false;
	}

	public function e($var) {
		echo htmlspecialchars($var);
	}

	private function put($var) {
		$this->e($this->get($var));
	}

	public function config($options, $val) {
		if (is_array($options)) {
			$this->_config = array_merge($this->_config, $options);
		} else {
			$this->_config[$options] = $val;
		}
		return $this;
	}

}