<?php

Class Administration extends Controller
{
    public function index()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('landing');
        }
        $patron = new Patron();
        $data = $patron ->findAll();

        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['Patrons','patrons'];


        $this->view('administration',[
            'rows'=>$data,
            'crumbs'=>$crumbs,
        ]);
    }
}