<?php

namespace app\modules\induccion\controllers;

use yii\web\Controller;

/**
 * Default controller for the `induccion` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
