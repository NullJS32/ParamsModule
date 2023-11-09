<?php

namespace app\modules\params;

use app\modules\params\models\Param;
use Yii;
use yii\base\BootstrapInterface;
use yii\base\Module;
use yii\console\controllers\MigrateController;

class ParamsModule extends Module implements BootstrapInterface
{
    public $controllerNamespace = 'app\modules\params\controllers';

    public function init()
    {
        parent::init();
    }

    public function bootstrap($app)
    {
        // Получаем параметры из базы данных
        $paramsFromDatabase = Param::find()->asArray()->all();

        // Обновляем массив params
        Yii::$app->params = array_merge(Yii::$app->params, array_column($paramsFromDatabase, 'value', 'name'));

        // Добавляем правила в urlManager при инициализации приложения
        $app->getUrlManager()->addRules([
            'ParamsModule' => 'ParamsModule/params/index',
            'ParamsModule/<action:\w+>' => 'ParamsModule/params/<action>',
        ], false);
    }

    protected function runModuleMigrations()
    {
        // Замените 'migrationsPath' на путь к вашей папке migrations внутри модуля
        $migrationPath = '@app/modules/params/migrations';

        // Запускаем миграции
        $migration = new MigrateController('migrate', Yii::$app);
        $migration->runAction('up', ['migrationPath' => $migrationPath, 'interactive' => false]);
    }
}
