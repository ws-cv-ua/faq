![alt text](http://web-studio.cv.ua/img/logo-dark.png "Web-Studio.cv.ua")

#Installation
-
1. To install, run
```
$ composer require ws-cv-ua/faq
```

2. Run migration command
```shell
yii migrate -migratePath=wscvua\faq\migations
```

3. In Backend:
```php
'modules' => [
    ...
    'faq' => [
        'class' => 'wscvua\faq\Module',
        'languages' => ['ru', 'en']
    ],
    ...
],
```
> ```languages``` parameter is not required. If it's empty, ```languages``` will have value of language of the app.

> The Controller Views developed and test only for AdminLTE template. 

#Usage
```php
use wscvua\faq\widgets\FaqWidget;

echo FaqWidget::widget();
```
> By default widget show record of app language. But you can set language manual.

> For config output html, you can set ```listOptions```. There are config of ListView widget