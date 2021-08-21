<?php
class homeController extends Controller{

    public function index($id='',$name=''){
        echo 'I am in' . __Class__ ', method' . __METHOD__;
    }

    public function aboutUs($id='',$name=''){
        echo 'I am in' . __Class__ ', method' . __METHOD__;
    } 
}