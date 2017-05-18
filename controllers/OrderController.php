<?php
namespace app\controllers;
use yii\web\Controller;

class OrderController extends Controller{
    
    public $layout = false;
    
    public function actionIndex(){
        
        return $this->render("index");
        
    }
    
    public function actionCheck(){
        // echo "check";
        // $this->layout = false;
        return $this->render("check.php");
        
    }
    
    
}