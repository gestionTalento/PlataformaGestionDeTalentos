<?php

namespace app\Controllers;
use app\models\Rpost;

class RpostController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }



}
