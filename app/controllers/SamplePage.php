<?php

class SamplePage extends BasePage {
	public function __construct() {
		parent::__construct();
	}
	
	public function sampleAction() {
		$docs = $this->dm->getRepository('MongoDocs\SampleDocument')->findAll();
		$this->twigVars['docs'] = $docs;
		
		$this->twigVars['pageTitle'] = 'Sample Page';
		$this->renderTwig('sample_page.twig', $this->twigVars);
	}
}