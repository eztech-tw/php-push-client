EzTech PHP Push Helper
======================
EzTech PHP Push Helper<br>
[![Latest Stable Version](https://img.shields.io/packagist/v/eztech-tw/php-push-client.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://img.shields.io/packagist/dt/eztech-tw/php-push-client.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)

安裝
----
這個套件請使用 [composer](http://getcomposer.org/download/) 安裝

執行

```
php composer.phar require --prefer-dist eztech-tw/php-push-client "*"
```

或增加

```
"eztech-tw/php-push-client": "*"
```

到你的 `composer.json` 檔案中

使用
----
先引用composer的autoload之後，即可以以下方式use使用，或可自行引用相應之class檔案即可。
<br>
設定推播伺服器位址和存取權杖，存取權杖可於推播伺服器上頁面產生
````
use scott1984\ezpush\EzPush;
use scott1984\ezpush\Message;
EzPush::$ServerAddress = "http://localhost/push/";
EzPush::$ApiAccessKey = "ue6yJxEnTG5SBhTooD758O4b7wyE417a";
````

取得BundleID列表，內容為陣列 [ "BundleID" => "說明" ,  "BundleID" => "說明" ]
````
$bundleids = EzPush::BundleidList();
````
建立一個訊息並發送<br>
回傳值若失敗為null，若成功為已新增之內容陣列
````
$Msg = new Message();
$Msg->title="標題";
$Msg->body="內文";

$response = EzPush::Push($Msg,"使用者識別","BundleID");
````