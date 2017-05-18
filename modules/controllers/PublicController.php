<?php
namespace app\modules\controllers;

use yii\web\Controller;
use app\modules\models\Admin;
use Yii;

class PublicController extends Controller{
    
    public function actionLogin(){
        
        //验证退出
        // session_start();
        // var_dump($_SESSION);
        
        $this->layout = false;
        $model = new Admin;
        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            // var_dump($post);
            if($model->login($post)){
                $this->redirect(['default/index']);
                Yii::$app->end();
            };
        }
        return $this->render("login",['model' => $model]);
    }
    
    public function actionLogout(){
        
        Yii::$app->session->removeAll();
        if(!isset(Yii::$app->session['admin']['isLogin'])){
            $this->redirect(['public/login']);
            Yii::$app->end();
        }
        $this->goback();
    }
    
    public function actionSeekpassword(){
        
        $this->layout = false;
        $model = new Admin;
        if(Yii::$app->request->ispost){
            $post = Yii::$app->request->post();
           if($model->seekPass($post)){
               Yii::$app->session->SetFlash('info','电子邮件已经发送成功，请查收');
           }
               
        }
        
        return $this->render("seekpassword",['model' => $model]);
        
    }
    
    

}