<?php


class BasePage {

	/**
	 * @var Twig_Environment $twig
	 */
	protected $twig;
	protected $twigVars = array();

	/**
	 * Constructor
	 */
	public function __construct() {
		session_start();
		$this->initTwig();
	}
	
	public function defaultAction() {
		echo('BasePage::defaultAction');
	}

	/**
	 * Helper function for initializing Twig.
	 */
	protected function initTwig() {
		$twigConfig = array(
			'cache' => TWIG_CACHE_DIR
		);
		if (ENV == 'dev') {
			$twigConfig['auto_reload'] = true;
		}

		$loader = new Twig_Loader_Filesystem(TWIG_TEMPLATE_DIR);
		$this->twig = new Twig_Environment($loader, $twigConfig);
	}

	protected function renderTwig($template, $vars) {
		$vars['alerts'] = $this->getAlerts();

		if (!empty($this->post)) {
			$vars['post'] = $this->post;
		}
		else if (!empty($_SESSION['post'])) {
			$vars['post'] = $_SESSION['post'];
		}

		if (!empty($this->get)) {
			$vars['get'] = $this->get;
		}
		else if (!empty($_SESSION['get'])) {
			$vars['get'] = $_SESSION['get'];
		}

		if (!empty($_SESSION['user'])) {
			$vars['curUser'] = $_SESSION['user'];
		}

		echo($this->twig->render($template, $vars));

		$this->resetAlerts();
		unset($_SESSION['post']);
		unset($_SESSION['get']);
	}

	/**
	 * Alert types are success, warning, info, and danger.
	 *
	 * @param $type
	 * @param $text
	 */
	protected function setAlert($type, $text) {
		if (!isset($_SESSION['alerts'])) {
			$_SESSION['alerts'] = array();
		}
		$_SESSION['alerts'][] = array('type' => $type, 'text' => $text);
	}

	protected function getAlerts() {
		if (!empty($_SESSION['alerts'])) {
			return $_SESSION['alerts'];
		}
		return null;
	}

	protected function resetAlerts() {
		unset($_SESSION['alerts']);
	}

	/**
	 * After handling a post, use this method to redirect to the same (or another) page
	 * to prevent the user from re-posting if they refresh the browser.
	 *
	 * POST and GET data is saved in the session in case it is needed again after redirect (for
	 * form values for example).
	 *
	 * @param $url
	 */
	protected function redirectFromPost($url) {
		$_SESSION['post'] = $_POST;
		$_SESSION['get'] = $_GET;
		header("Location: $url");
		exit;
	}
}