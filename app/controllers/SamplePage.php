<?php

class SamplePage extends BasePage {
	public function __construct() {
		parent::__construct();
	}
	
	public function sampleAction() {
		$this->twigVars['pageTitle'] = 'Sample Page';
		$this->renderTwig('sample_page.twig', $this->twigVars);
	}
}