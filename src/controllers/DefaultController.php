<?php

namespace yii2module\environments\controllers;

use yii2lab\console\yii\console\Controller;
use yii2module\environments\helpers\Environments;
use yii2lab\console\helpers\Output;
use yii2lab\console\helpers\input\Question;

class DefaultController extends Controller
{
	
	public function actionIndex($option = null)
	{
		$option = Question::displayWithQuit('Select operation', ['Update', 'Delete'], $option);
		$environments = env('environments');
		if($option == 'u') {
			//Question::confirm('Do are you sure update?', 1);
			$projectInput = Question::displayWithQuit('Select project', ['common', $environments]);
			$project = $projectInput == 'c' ? 'common' : $environments;
			$result = Environments::update($project);
			Output::arr($result, 'Result');
		} elseif($option == 'd') {
			//Question::confirm('Do are you sure delete?', 1);
			$projectInput = Question::displayWithQuit('Select project', ['common', $environments]);
			$project = $projectInput == 'c' ? 'common' : $environments;
			$result = Environments::delete($project);
			Output::arr($result, 'Result');
		}
	}
	
}
