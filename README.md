LaravelScaffoldingInfyOmSample
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

2. l5scaffoldのインストール

以下のコマンドを実行する

```powershell
$ composer require 'laralib/l5scaffold' --dev
```

config/app.phpに以下のサービスプロバイダ(Service Providers)を追加する

```php
Laralib\L5scaffold\GeneratorsServiceProvider::class,

```

3. l5scaffoldの修正

vendor/laralib/l5scaffold/src/Commands/ScaffoldMakeCommand.phpの5行目を修正

```php
// use Illuminate\Console\AppNamespaceDetectorTrait;
use Illuminate\Console\DetectsApplicationNamespace;
```

21行目を修正

```php
// use AppNamespaceDetectorTrait, MakerTrait;
use DetectsApplicationNamespace, MakerTrait;
```

vendor/laralib/l5scaffold/src/Makes/MakeController.phpの13行目を修正

```php
// use AppNamespaceDetectorTrait, MakerTrait; // ←コメントアウト
use DetectsApplicationNamespace, MakerTrait; // ←追加
```

