<?php
Class Reports extends Controller
{
    public function index()
    {
        if (!Auth::logged_in()) {
            $this->redirect('landing');
        }

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Reports', 'reports'];


        $this->view('reports', [
            'crumbs' => $crumbs,
        ]);
    }
    public function issue()
    {
        if (!Auth::logged_in()) {
            $this->redirect('landing');
        }
        $circulation = new Circulation();
        $user = new User();
        $book = new Catalog();

        $data = $circulation->findAll();
        if($data)
        {
            foreach ($data as $row){
                $memberid=$row->member_id;
                $member = $user->query("select email from users where id=$memberid");
                $member = $member[0];
                $row->member_id = $member->email;
                $bookid = $row->book_id;
                $bookname = $book->query("select title from catalogs where id=$bookid");
                $bookname = $bookname[0];
                $row->book_id= $bookname->title;
    
            }

        }
        
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Reports', 'reports'];


        $this->view('reports.issue', [
            'rows' => $data,
            'crumbs' => $crumbs,
        ]);
    }
    public function generate()
    {
        if (!Auth::logged_in()) {
            $this->redirect('landing');
        }
        $circulation = new Circulation();
        $user = new User();
        $book = new Catalog();
        if(count($_POST)>0)
        {
            
            $fromdate = $_POST['fromdate'];
            $todate = $_POST['todate'];

            $data = $circulation->query("select * from circulations where Date(issue_date) >= '$fromdate' AND Date(issue_date) <= '$todate'");
            if($data)
            {
                foreach ($data as $row){
                    $memberid=$row->member_id;
                    $member = $user->query("select email from users where id=$memberid");
                    $member = $member[0];
                    $row->member_id = $member->email;
                    $bookid = $row->book_id;
                    $bookname = $book->query("select title from catalogs where id=$bookid");
                    $bookname = $bookname[0];
                    $row->book_id= $bookname->title;
            }

            $data1 = $data;
            
        }

            

        }
        
        if(!isset($data))
        {
            $this->redirect("reports");
        }
     
        


        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Reports', 'reports'];


        $this->view('reports.generate', [
            'rows' => $data,
            'crumbs' => $crumbs,
        ]);
    }
    public function damage()
    {
        if (!Auth::logged_in()) {
            $this->redirect('landing');
        }
        $damaged = new Catalog();
        $query = "select * from catalogs where status = 'damage'";
        $data = $damaged->query($query);

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Reports', 'reports'];


        $this->view('reports.damage', [
            'rows' => $data,
            'crumbs' => $crumbs,
        ]);
    }
    public function generated()
    {
        if (!Auth::logged_in()) {
            $this->redirect('landing');
        }

        $damaged = new Catalog();
        $query = "select * from catalogs where status = 'damage'";
        $data = $damaged->query($query);

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Reports', 'reports'];

        $this->view('reports.generated', [
            'rows' => $data,
            'crumbs' => $crumbs,
        ]);
    }
    public function lost()
    {
        if (!Auth::logged_in()) {
            $this->redirect('landing');
        }
        $lost = new Catalog();
        $query = "select * from catalogs where status = 'lost'";
        $data = $lost->query($query);


        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Reports', 'reports'];


        $this->view('reports.lost', [
            'rows' => $data,
            'crumbs' => $crumbs,
        ]);
    }
    public function generatel()
    {
        if (!Auth::logged_in()) {
            $this->redirect('landing');
        }

        $lost = new Catalog();
        $query = "select * from catalogs where status = 'lost'";
        $data = $lost->query($query);

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Reports', 'reports'];

        $this->view('reports.generatel', [
            'rows' => $data,
            'crumbs' => $crumbs,
        ]);
    }



}