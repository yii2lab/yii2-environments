<?php

namespace yii2module\environments\controllers;

use yii2lab\console\yii\console\Controller;
use yii2module\environments\helpers\Environments;
use yii2lab\console\helpers\Output;
use yii2lab\console\helpers\input\Question;

class DefaultController extends Controller
{
	
	/**
	 * Manage project initialization files
	 */
	public function actionIndex($option = null)
	{
		$option = Question::displayWithQuit('Select operation', ['Update', 'Delete'], $option);
		$project = env('project');
		if($option == 'u') {
			//Question::confirm('Do are you sure update?', 1);
			$projectInput = Question::displayWithQuit('Select project', ['common', $project]);
			$project = $projectInput == 'c' ? 'common' : $project;
			$result = Environments::update($project);
			Output::arr($result, 'Result');
		} elseif($option == 'd') {
			//Question::confirm('Do are you sure delete?', 1);
			$projectInput = Question::displayWithQuit('Select project', ['common', $project]);
			$project = $projectInput == 'c' ? 'common' : $project;
			$result = Environments::delete($project);
			Output::arr($result, 'Result');
		}
	}
	
}
