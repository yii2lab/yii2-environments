<?php

namespace yii2module\environments\controllers;

use woop\extension\console\yii\console\Controller;
use yii2module\environments\helpers\Environments;
use woop\extension\console\helpers\Output;
use woop\extension\console\helpers\input\Question;

class DefaultController extends Controller
{
	
	public function actionIndex($option = null)
	{
		$option = Question::displayWithQuit('Select operation', ['Update', 'Delete'], $option);
		if($option == 'u') {
			$result = Environments::update();
			Output::arr($result, 'Result');
		} elseif($option == 'd') {
			$result = Environments::delete();
			Output::arr($result, 'Result');
		}
		
	}
	
}
