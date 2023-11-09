<?php

namespace app\modules\params\controllers;

use app\modules\params\models\Param;
use Yii;
use yii\web\Controller;

/**
 * Контроллер ParamsController реализует CRUD (Create, Read, Update, Delete) операции для модели Params.
 */
class ParamsController extends Controller
{
    /**
     * Выводит список всех параметров и форму для редактирования.
     * @return mixed
     */
    public function actionIndex()
    {
        $params = Param::find()->all();

        if (Yii::$app->request->post()) {
            foreach ($params as $param) {
                $param->value = Yii::$app->request->post("Param")[$param->id]["value"];
                $param->save();
            }
        }

        return $this->render('index', [
            'params' => $params,
        ]);
    }

    /**
     * Создает новую запись параметра.
     * Если создание успешно, происходит перенаправление на страницу 'index'.
     * @return mixed
     */
    public function actionCreate()
    {
        $param = new Param();

        if ($param->load(Yii::$app->request->post()) && $param->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'param' => $param,
        ]);
    }

    /**
     * Удаляет существующую запись параметра.
     * Если удаление успешно, происходит перенаправление на страницу 'index'.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $param = Param::findOne($id);
        $param->delete();

        return $this->redirect(['index']);
    }
}
