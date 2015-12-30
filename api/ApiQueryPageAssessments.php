<?php
class ApiQueryPageAssessments extends ApiQueryBase{

	public function __construct( ApiQuery $query, $moduleName ) {
		parent::__construct( $query, $moduleName, 'pa' );
	}

	public function execute() {
		$this->run();
	}

	public function run() {
		if ( $this->getPageSet()->getGoodTitleCount() == 0 ) {
			return;
		}

		$db = $this->getDB();
		$params = $this->extractRequestParams();
		$alltitles = $this->getPageSet()->getGoodAndMissingTitles();

		$this->addTables( 'page_assessments' );
		$this->addWhereFld( 'pa_page_name', $alltitles );
		$this->addFields( array( 'pageid' => 'pa_page_id', 'page' => 'pa_page_name', 'projects' => 'pa_project' ) );
		$res = $this->select( __METHOD__ );

		$result = $this->getResult();
		foreach ( $res as $row ) {
			$result->addValue( array( 'query', 'pages', $row->pageid, $row->projects ) );
		}
	}

	public function getAllowedParams() {
		return array(
			'continue' => array(
				ApiBase::PARAM_TYPE => 'string',
			//	ApiBase::PARAM_REQUIRED => true,
			),
		);
	}

	protected function getExamplesMessages() {
		return array(
			'action=query&list=pageassessments&option=project'
				=> 'apihelp-query+pageassessments-example-1',
		);
	}
}
