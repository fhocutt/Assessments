<?php
class ApiQueryPageAssessments extends ApiQueryBase{

	public function __construct( $query, $moduleName ) {
		parent::__construct( $query, $moduleName );
	}

	public function execute() {
		$this->run();
	}

	public function run() {
		return '';
	}

	public function getAllowedParams() {
		return array(
			'option' => array(
				'project',
				'pageinfo',
			),
			ApiBase::PARAM_REQUIRED => true,
			ApiBase::PARAM_HELP_MSG_PER_VALUE => array(),
		);
	}

	protected function getExamplesMessages() {
		return array(
			'action=query&list=pageassessments&option=project'
				=> 'apihelp-query+pageassessments-example-1',
		);
	}
}
