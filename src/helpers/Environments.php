<?php

namespace yii2module\environments\helpers;

use yii2lab\helpers\yii\FileHelper;

class Environments
{
	
	public function update($name = 'dev')
	{
		$dir = ROOT_DIR . DS . 'environments' . DS . $name;
		$fileList = FileHelper::findFilesWithPath($dir);
		$map = [];
		foreach($fileList as $file) {
			$source = ROOT_DIR . DS . $file;
			$dest = $dir . DS . $file;
			if(!is_file($source)) {
				continue;
			}
			if(md5_file($source) != md5_file($dest)) {
				copy($source, $dest);
				$map[] = $file;
			}
		}
		return $map;
	}

	public function delete($name = 'dev')
	{
		$dir = ROOT_DIR . DS . 'environments' . DS . $name;
		$fileList = FileHelper::findFilesWithPath($dir);
		
		$map = [];
		foreach($fileList as $file) {
			$source = ROOT_DIR . DS . $file;
			$dest = $dir . DS . $file;
			if(!is_file($source)) {
				continue;
			}
			if(is_file($dest)) {
				unlink($source);
				$map[] = $file;
			}
		}
		return $map;
	}

}
