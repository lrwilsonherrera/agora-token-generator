# Paquete Laravel para la generación de tokens de autorización de AgoraSDK.io

_Paquetes laravel para la generación de tokens de autorización en el sdk de Agora.io en el proyecto GooCrown_

### Instalación y configuración 🛠️

_Edite su archivo "composer.json" y agrege el repositorio_

```json
	"repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/lrwilsonherrera/agora-token-generator"
        }
    ],
```

_Instalación del paquete via composer_

```bash
composer require lrwilsonherrera/agora-key-generator
```

_Exportar configuración_

```bash
 php artisan vendor:publish --provider="EurekuDev\\AgoraKeyGenerator\\AgoraKeyGeneratorServiceProvider" --tag="config"
```

_Configurar .env_

```
 AGORA_APP_ID=
 AGORA_APP_CERTIFICATE=
 AGORA_TOKEN_EXPIERE_TIME=86400
```

### Uso 🚀

_Incluya el facade_

```php
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use EurekuDev\AgoraKeyGenerator\Facades\RtmToken;
use EurekuDev\AgoraKeyGenerator\Facades\RtcToken;
use EurekuDev\AgoraKeyGenerator\RtcToken as EurekuDevRtcToken;
use EurekuDev\AgoraKeyGenerator\RtmToken as EurekuDevRtmToken;
use Illuminate\Http\Request;

class AgoraController extends Controller
{

    public function generateRtmToken(Request $request)
    {
        $userAccount = 'test_user_id';

        $token = RtmToken::build($userAccount, EurekuDevRtmToken::RoleRtmUser);

        return response()->json(['agora_rtm_token' => $token->textToken]);

    }

    public function generateRtmTokenWithUid(Request $request)
    {
        $channelName = 'channel_name',
	$uid = 0;
        $role = EurekuDevRtcToken::RolePublisher;

        $token = RtcToken::buildWithUid($channelName, $uid, $role);

        return response()->json(['agora_rtc_token' => $token->textToken]);

    }

    public function generateRtmTokenWithUserAccount(Request $request)
    {
        $channelName = 'channel_name',
	$userAccount = 'test_user_id';
        $role = EurekuDevRtcToken::RoleSubscriber;

        $token = RtcToken::buildWithUserAccount($channelName, $userAccount, $role);

        return response()->json(['agora_rtc_token' => $token->textToken]);

    }

}
```

