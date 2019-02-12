<?php
namespace Crocodicstudio\Crudbooster;

use Crocodicstudio\Crudbooster\CBCoreModule\CbUser;
use Crocodicstudio\Crudbooster\CBCoreModule\Facades\CbRouter;
use Crocodicstudio\Crudbooster\Modules\ApiGeneratorModule\CbApiGeneratorServiceProvider;
use Crocodicstudio\Crudbooster\Modules\AuthModule\CbAuthServiceProvider;
use Crocodicstudio\Crudbooster\Modules\EmailTemplates\CbEmailTemplatesServiceProvider;
use Crocodicstudio\Crudbooster\Modules\FileManagerModule\CbFileManagerServiceProvider;
use Crocodicstudio\Crudbooster\Modules\MenuModule\CbMenuServiceProvider;
use Crocodicstudio\Crudbooster\Modules\ModuleGenerator\CbModulesGeneratorServiceProvider;
use Crocodicstudio\Crudbooster\Modules\NotificationsModule\CbNotificationsServiceProvider;
use Crocodicstudio\Crudbooster\Modules\PrivilegeModule\CbPrivilegesServiceProvider;
use Crocodicstudio\Crudbooster\Modules\SettingModule\CbSettingsServiceProvider;
use Illuminate\Support\ServiceProvider;
use Crocodicstudio\Crudbooster\commands\InstallationCommand;
use Illuminate\Foundation\AliasLoader;
use App;

class CRUDBoosterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'crudbooster');
<<<<<<< HEAD
        $this->publishes([__DIR__.'/CBCoreModule/configs/crudbooster.php' => config_path('crudbooster.php')], 'cb_config');
        $this->publishes([__DIR__.'/localization' => resource_path('lang')], 'cb_localization');

        /* Integrate LFM to CRUDBooster */
        $this->publishes([
            __DIR__.'/laravel-filemanager' => base_path('vendor/unisharp/laravel-filemanager'),
        ], 'cb_lfm');

        $this->publishes([
            __DIR__.'/laravel-filemanager/public' => public_path('vendor/laravel-filemanager'),
        ], 'cb_lfm');

        $this->publishes([
            __DIR__.'/laravel-filemanager/src/config/lfm.php' => config_path('lfm.php'),
        ], 'cb_lfm');

        $this->publishes([
            __DIR__.'/laravel-filemanager/src/views/script.blade.php' => resource_path('views/vendor/laravel-filemanager/script.blade.php'),
        ], 'cb_lfm');
=======
        $this->publishes([__DIR__.'/configs/crudbooster.php' => config_path('crudbooster.php')],'cb_config');            
        $this->publishes([__DIR__.'/localization' => resource_path('lang')], 'cb_localization');                 
        $this->publishes([__DIR__.'/database' => base_path('database')],'cb_migration');
>>>>>>> 5.4.0

        $this->publishes([
            __DIR__.'/CBCoreModule/publieshed_files/readme.txt' => resource_path('views/vendor/crudbooster/type_components/readme.txt'),
        ], 'cb_type_components');

        if (! file_exists(app_path('Http/Controllers/AdminUsersController.php'))) {
            $this->publishes([__DIR__.'/CBCoreModule/publieshed_files/AdminUsersController.php' => app_path('Http/Controllers/AdminUsersController.php')], 'cb_user_controller');
        }

<<<<<<< HEAD

        $this->defineValidationRules();
        $this->loadRoutesFrom( __DIR__.'/routes.php');
        $this->registerUserModule();
=======
        if(!file_exists(app_path('Http/Controllers/AdminCmsUsersController.php'))) {
            $this->publishes([__DIR__.'/userfiles/controllers/AdminCmsUsersController.php' => app_path('Http/Controllers/AdminCmsUsersController.php')],'cb_user_controller');
        }        

        $this->publishes([
            __DIR__.'/assets'=>public_path('vendor/crudbooster')
        ],'cb_asset');  
                    
        require __DIR__.'/validations/validation.php';        
        require __DIR__.'/routes.php';                        
>>>>>>> 5.4.0
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/CBCoreModule/configs/crudbooster.php', 'crudbooster');

        $this->app->singleton('crudbooster', function () {
            return true;
        });

        $this->commands(InstallationCommand::class);

        $this->defineAuthGuard();

<<<<<<< HEAD
        $this->registerThirdPartyPackages();

        $this->setAliases();
=======
        $this->commands('crudboosterinstall');
        $this->commands('crudboosterupdate');
        $this->commands(['\crocodicstudio\crudbooster\commands\CrudboosterVersionCommand']);
>>>>>>> 5.4.0

        $this->app->singleton(\Crocodicstudio\Crudbooster\CBCoreModule\CbRouter::class);
        $this->registerCrudBoosterModules();
        $this->app->singleton('CbDynamicMenus', \Crocodicstudio\Crudbooster\CBCoreModule\DynamicMenus::class);
        $this->app->singleton('CbModulesRegistery', \Crocodicstudio\Crudbooster\CBCoreModule\ModulesRegistery::class);
    }

    private function defineValidationRules()
    {
        \Validator::extend('alpha_spaces', function ($attribute, $value) {
            // This will only accept alpha and spaces.
            // If you want to accept hyphens use: /^[\pL\s-]+$/u.
            return preg_match('/^[\pL\s]+$/u', $value);
        }, 'The :attribute should be letters only');
    }

    private function defineAuthGuard()
    {
        config()->offsetSet('auth.providers.cb_users', ['driver' => 'eloquent', 'model' => CbUser::class,]);
        config()->offsetSet('auth.guards.cbAdmin', ['driver' => 'session', 'provider' => 'cb_users']);
    }

    private function setAliases(): void
    {
        $loader = AliasLoader::getInstance();
        $loader->alias('PDF', 'Barryvdh\DomPDF\Facade');
        $loader->alias('Excel', 'Maatwebsite\Excel\Facades\Excel');
        $loader->alias('Image', 'Intervention\Image\Facades\Image');
        $loader->alias('CRUDBooster', 'Crocodicstudio\Crudbooster\Helpers\CRUDBooster');
        $loader->alias('CB', 'Crocodicstudio\Crudbooster\Helpers\CRUDBooster');
        $loader->alias('DbInspector', 'Crocodicstudio\Crudbooster\Helpers\DbInspector');
        $loader->alias('CSSBootstrap', 'Crocodicstudio\Crudbooster\Helpers\CSSBootstrap');
        $loader->alias('CbRouter', CbRouter::class);
    }
<<<<<<< HEAD

    private function registerThirdPartyPackages(): void
    {
        $this->app->register('Barryvdh\DomPDF\ServiceProvider');
        $this->app->register('Maatwebsite\Excel\ExcelServiceProvider');
        $this->app->register('Unisharp\Laravelfilemanager\LaravelFilemanagerServiceProvider');
        $this->app->register('Intervention\Image\ImageServiceProvider');
        $this->app->register('Imanghafoori\Widgets\WidgetsServiceProvider');
    }

    private function registerCrudBoosterModules()
    {
        $this->app->register(CbAuthServiceProvider::class);
        $this->app->register(CbApiGeneratorServiceProvider::class);
        $this->app->register(CbModulesGeneratorServiceProvider::class);
        $this->app->register(CbSettingsServiceProvider::class);
        $this->app->register(CbPrivilegesServiceProvider::class);
        $this->app->register(CbMenuServiceProvider::class);
        $this->app->register(CbFileManagerServiceProvider::class);
        $this->app->register(CbNotificationsServiceProvider::class);
        $this->app->register(CbEmailTemplatesServiceProvider::class);
    }

    private function registerUserModule()
    {
        app('CbModulesRegistery')->addModule('users', (object)[
            'name' => trans('crudbooster.Users_Management'),
            'icon' => 'fa fa-users',
            'path' => 'users',
            'table_name' => 'cms_users',
            'controller' => 'AdminCmsUsersController',
            'is_protected' => 0,
            'is_active' => 1,
        ]);
    }
=======
   
    private function registerCrudboosterCommand()
    {
        $this->app->singleton('crudboosterinstall',function() {
            return new CrudboosterInstallationCommand;
        });
        
        $this->app->singleton('crudboosterupdate',function() {
            return new CrudboosterUpdateCommand;
        });        
    }    
>>>>>>> 5.4.0
}
