# Paquete Laravel para la generación de tokens de autorización de AgoraSDK.io

_Paquetes laravel para la generación de tokens de autorización en el sdk de Agora.io en el proyecto GooCrown_

### Instalación y configuración 🛠️

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

    namespace App\Http\Controllers;

	use EurekuDev\AgoraKeyGenerator\Facades\RtmToken;

    class AppController extends Controller
    {

        public function index(Request $request)
		{
			$user = $request->user();

			$userId = $user->id;

			$token = RtmToken::build($userId)->textToken;

			....
			
		}   

```

