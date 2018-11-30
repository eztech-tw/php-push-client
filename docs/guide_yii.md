#使用Yii2的環境

首先於設定檔 web.php 中引用此套件，並設定推播伺服器位址和存取權杖，存取權杖可於推播伺服器上頁面產生，以及被推播之APP的BundleID
````
'components' => [
    'EzPush'=>[
        'class' => 'scott1984\ezpush\EzPushYii',
        'ServerAddress' => 'http://localhost/push/',
        'ApiAccessKey' => 'ue6yJxEnTG5SBhTooD758O4b7wyE417a',
        'Bundleid' => 'assetmanager.pj',
    ],
]
````
建立一個訊息並發送<br>
回傳值若失敗為null，若成功為已新增之內容陣列
````
use scott1984\ezpush\Message;

$Msg = new Message();
$Msg->title="標題";
$Msg->body="內文";

$response = Yii::$app->EzPush->Push($Msg,"使用者識別");
````