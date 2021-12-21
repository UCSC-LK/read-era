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
        $query = "select * from catalogs where damageState = 'D'";
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
        $query = "select * from catalogs where damageState = 'D'";
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
        $query = "select * from catalogs where damageState = 'L'";
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
        $query = "select * from catalogs where damageState = 'L'";
        $data = $lost->query($query);

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Reports', 'reports'];

        $this->view('reports.generatel', [
            'rows' => $data,
            'crumbs' => $crumbs,
        ]);
    }
    public function withdraw()
    {
        if (!Auth::logged_in()) {
            $this->redirect('landing');
        }
        $lost = new Catalog();
        $query = "select * from catalogs where damageState = 'W' ";
        $data = $lost->query($query);


        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Reports', 'reports'];


        $this->view('reports.withdraw', [
            'rows' => $data,
            'crumbs' => $crumbs,
        ]);
    }
    public function generatew()
    {
        if (!Auth::logged_in()) {
            $this->redirect('landing');
        }

        $lost = new Catalog();
        $query = "select * from catalogs where damageState = 'W'";
        $data = $lost->query($query);

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Reports', 'reports'];

        $this->view('reports.generatew', [
            'rows' => $data,
            'crumbs' => $crumbs,
        ]);
    }

    public function inventory()
    {
        if (!Auth::logged_in()) {
            $this->redirect('landing');
        }
        $books = new Catalog();
        $query = "select * from catalogs";
        $data = $books->query($query);

        $arr = array();

        $data1 = $books->query("select count(id) as count from catalogs");
        $data1 = $data1[0];
        $data1 = $data1->count;
        $arr[0] = $data1;

        $data2 = $books->query("select count(id) as count from catalogs where status='available'");
        $data2 = $data2[0];
        $data2 = $data2->count;
        $arr[1] = $data2;

        $data3 = $books->query("select count(id) as count from catalogs where damageState = 'L' ");
        $data3 = $data3[0];
        $data3 = $data3->count;
        $arr[2] = $data3;

        $data4 = $books->query("select count(id) as count from catalogs where damageState = 'D'");
        $data4 = $data4[0];
        $data4 = $data4->count;
        $arr[3] = $data4;

        $data5 = $books->query("select count(id) as count from catalogs where status='borrowed'");
        $data5 = $data5[0];
        $data5 = $data5->count;
        $arr[4] = $data5;

        $data6 = $books->query("select count(id) as count from catalogs where status='reserved'");
        $data6 = $data6[0];
        $data6 = $data6->count;
        $arr[5] = $data6;

        $data7 = $books->query("select count(id) as count from catalogs where damageState = 'W'");
        $data7 = $data7[0];
        $data7 = $data7->count;
        $arr[6] = $data7;


        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Reports', 'reports'];


        $this->view('reports.inventory', [
            'rows' => $data,
            'crumbs' => $crumbs,
            'arr'=>$arr,
        ]);
    }
    public function generatei()
    {
        if (!Auth::logged_in()) {
            $this->redirect('landing');
        }
        $books = new Catalog();
        $query = "select * from catalogs";
        $data = $books->query($query);

        $arr = array();

        $data1 = $books->query("select count(id) as count from catalogs");
        $data1 = $data1[0];
        $data1 = $data1->count;
        $arr[0] = $data1;

        $data2 = $books->query("select count(id) as count from catalogs where status='available'");
        $data2 = $data2[0];
        $data2 = $data2->count;
        $arr[1] = $data2;

        $data3 = $books->query("select count(id) as count from catalogs where damageState = 'L' ");
        $data3 = $data3[0];
        $data3 = $data3->count;
        $arr[2] = $data3;

        $data4 = $books->query("select count(id) as count from catalogs where damageState = 'D'");
        $data4 = $data4[0];
        $data4 = $data4->count;
        $arr[3] = $data4;

        $data5 = $books->query("select count(id) as count from catalogs where status='borrowed'");
        $data5 = $data5[0];
        $data5 = $data5->count;
        $arr[4] = $data5;

        $data6 = $books->query("select count(id) as count from catalogs where status='reserved'");
        $data6 = $data6[0];
        $data6 = $data6->count;
        $arr[5] = $data6;

        $data7 = $books->query("select count(id) as count from catalogs where damageState = 'W'");
        $data7 = $data7[0];
        $data7 = $data7->count;
        $arr[6] = $data7;

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Reports', 'reports'];

        $this->view('reports.generatei', [
            'rows' => $data,
            'crumbs' => $crumbs,
            'arr'=>$arr,
        ]);
    }
    public function fine()
    {
        if (!Auth::logged_in()) {
            $this->redirect('landing');
        }
        $circulation = new Circulation();
        $user = new User();
        $book = new Catalog();

        //$data = $circulation->findAll();

        $query = "select * from circulations WHERE fine>0";
        $data = $circulation->query($query);

        if($data)
        {
            foreach ($data as $row){
                $memberid=$row->member_id;
                $member = $user->query("select firstname,lastname from users where id=$memberid");
                $member = $member[0];
                $row->member_id = $member->firstname;

                $bookid = $row->book_id;
                $bookname = $book->query("select title from catalogs where id=$bookid");
                $bookname = $bookname[0];
                $row->book_id= $bookname->title;

            }
        }
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Reports', 'reports'];


        $this->view('reports.fine', [
            'rows' => $data,
            'crumbs' => $crumbs,
        ]);
    }
    public function generatef()
    {
        if (!Auth::logged_in()) {
            $this->redirect('landing');
        }
        $circulation = new Circulation();
        $user = new User();
        $book = new Catalog();
        //$data = $circulation->findAll();

        $query = "select * from circulations WHERE fine>0";
        $data = $circulation->query($query);

        if($data)
        {
            foreach ($data as $row){
                $memberid=$row->member_id;
                $member = $user->query("select firstname from users where id=$memberid");
                $member = $member[0];
                $row->member_id = $member->firstname;

                $bookid = $row->book_id;
                $bookname = $book->query("select title from catalogs where id=$bookid");
                $bookname = $bookname[0];
                $row->book_id= $bookname->title;
            }
        }
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Reports', 'reports'];


        $this->view('reports.generatef', [
            'rows' => $data,
            'crumbs' => $crumbs,
        ]);
    }
    public function tw()
    {
        if (!Auth::logged_in()) {
            $this->redirect('landing');
        }
        $tw = new Catalog();
        $query = "select * from catalogs where damageState = 'TWA' OR damageState = 'TW'";
        $data = $tw->query($query);


        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Reports', 'reports'];


        $this->view('reports.tw', [
            'rows' => $data,
            'crumbs' => $crumbs,
        ]);
    }
    public function generatetw()
    {
        if (!Auth::logged_in()) {
            $this->redirect('landing');
        }

        $tw = new Catalog();
        $query = "select * from catalogs where damageState = 'TWA' OR damageState = 'TW'";
        $data = $tw->query($query);

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Reports', 'reports'];

        $this->view('reports.generatetw', [
            'rows' => $data,
            'crumbs' => $crumbs,
        ]);
    }
    public function return()
    {
        if (!Auth::logged_in()) {
            $this->redirect('landing');
        }
        $circulation = new Circulation();
        $user = new User();
        $book = new Catalog();

        //$data = $circulation->findAll();

        $query = "select * from circulations WHERE status='returned'";
        $data = $circulation->query($query);

        if($data)
        {
            foreach ($data as $row){
                $memberid=$row->member_id;
                $member = $user->query("select firstname,lastname from users where id=$memberid");
                $member = $member[0];
                $row->member_id = $member->firstname;

                $bookid = $row->book_id;
                $bookname = $book->query("select title from catalogs where id=$bookid");
                $bookname = $bookname[0];
                $row->book_id= $bookname->title;

            }
        }
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Reports', 'reports'];


        $this->view('reports.return', [
            'rows' => $data,
            'crumbs' => $crumbs,
        ]);
    }
    public function generater()
    {
        if (!Auth::logged_in()) {
            $this->redirect('landing');
        }
        $circulation = new Circulation();
        $user = new User();
        $book = new Catalog();

        //$data = $circulation->findAll();

        $query = "select * from circulations WHERE status='returned'";
        $data = $circulation->query($query);

        if($data)
        {
            foreach ($data as $row){
                $memberid=$row->member_id;
                $member = $user->query("select firstname from users where id=$memberid");
                $member = $member[0];
                $row->member_id = $member->firstname;

                $bookid = $row->book_id;
                $bookname = $book->query("select title from catalogs where id=$bookid");
                $bookname = $bookname[0];
                $row->book_id= $bookname->title;
            }
        }
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Reports', 'reports'];


        $this->view('reports.generater', [
            'rows' => $data,
            'crumbs' => $crumbs,
        ]);
    }



}