# OneSignalHelper
## Introduction
Here is the helper that you can use if you are using OneSignal as your push notifications service.
This Helper will make you faster in developing the integration created by your php code with Onesignal.
You can take alook about the documentation below, feel free to contribute, just fork then make your own pull request


## How to use
You can use by call the function that i already prepared for you. Firstly you need to call the constructor of the helper like this :
```
$osHelper = new OneSignalHelper($appId, $restApiKey);
```
you need your own appId and restApiKey, and you can get it on your own OneSignal Dashboard.
  app_id = One Signal app id
  rest_api_key = One Signal rest api key

## Available functions
Here is the available function that you can use right now : 
```
sendToAll($message,$template_id='')
sendToUser($message,$player_ids,$template_id='')
```
