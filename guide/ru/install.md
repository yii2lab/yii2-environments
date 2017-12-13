Установка
===

Устанавливаем зависимость:

```
composer require yii2module/yii2-environments
```

Объявляем модуль:

```php
return [
	'modules' => [
		// ...
		'fixtures' => 'yii2module\environments\Module',
		// ...
	],
];
```