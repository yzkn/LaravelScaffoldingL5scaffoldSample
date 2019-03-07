﻿LaravelScaffoldingInfyOmSample
---

1. Laravelプロジェクトの作成

```powershell
$ laravel new LaravelScaffoldingInfyOmSample
$ cd LaravelScaffoldingInfyOmSample

```

Laravel5.4以上、MySQL5.7.7未満の場合はapp\Providers\AppServiceProvider.phpを以下のように変更する

```php
use Illuminate\Support\Facades\Schema;
```

```php
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
```

認証を有効化する

```powershell
$ php artisan make:auth
$ php artisan migrate

```
