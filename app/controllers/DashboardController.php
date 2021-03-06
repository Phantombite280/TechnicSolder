<?php

class DashboardController extends BaseController {

	public function __construct()
	{
		parent::__construct();
	}

	public function getIndex()
	{
		$builds = Build::where('is_published', '=', '1')->orderBy('updated_at', 'desc')->take(5)->get();

		$modversions = Modversion::whereNotNull('md5')->orderBy('updated_at', 'desc')->take(5)->get();

		$changelog = UpdateUtils::getChangeLog();

		return View::make('dashboard.index')->with('modversions', $modversions)->with('builds', $builds)->with('changelog', $changelog);
	}
	
}