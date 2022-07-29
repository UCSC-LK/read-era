<?php
Class Calenders extends Controller
{
    public function index()
    {
        if (!Auth::logged_in()) {
            $this->redirect('landing');
        }

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Calenders', 'calendar'];


        $this->view('calenders', [
            'crumbs' => $crumbs,
        ]);
    }
}


