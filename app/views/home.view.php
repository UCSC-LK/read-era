<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<?php $this->view('includes/topbar')?>

<style>
table,
th,
td,
tr {
  border: 0px solid black;
  border-collapse: collapse;
}
table {
  width: 100%;
}
th {
  height: 40px;
}
th,
td {
  padding: 10px;
  text-align: left;
}

tr:nth-child(even) {
  background-color: #fff;
}

</style>

<div class="home-content">

        <div class="overview-boxes">
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Books</div>
                    <div class="number"><?=$arr[0]?></div>
                  
                </div>
                <i class="fas fa-book cart"></i>
            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Members</div>
                    <div class="number"><?=$arr[1]?></div>
                   
                </div>
                <i class="fas fa-user cart two"></i>
            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Borrowed Books</div>
                    <div class="number"><?=$arr[2]?></div>
                  
                </div>
                <i class="fas fa-book-reader cart three"></i>

            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Reserved Books</div>
                    <div class="number"><?=$arr[3]?></div>
                    
                </div>
                <i class="fas fa-undo-alt cart four"></i>
            </div>
        </div>

        <div class="content-boxx">
            <div class="box1x box">
                <div class="titlex">Recent Borrow Details</div>
                <div class="detailsx">
                <?php if($rows):?>
                <table>
                        <colgroup>
                            <col span="1" style="width: 50%;">
                            <col span="1" style="width: 25%;">
                            <col span="1" style="width: 25%;">
                           
                        </colgroup>
                    <tr><th>Title</th><th>Member</th><th>Issue date</th>
                    </tr>
            
                        <?php foreach ($rows as $row):?>
                            <tr><td><?=$row->book_id?></td><td><?=$row->member_id?></td><td><?=get_date($row->issue_date)?></td></tr>
                        <?php endforeach;?>
                    <?php else:?>
                        <h4>No issues were found at this time</h4>
                    <?php endif;?>
                </table>

                    
                </div>
                <div class="button">
                    <a href="<?=ROOT?>/circulations">See All</a>
                </div>
            </div>
            <div class="box2x box">
                <div class="titlex">Top Book Categories</div>
                <ul class="details2x">
                    <li>
                        <a href="#">
                            <span class="categoryx">Datastructure</span>
                        </a>
                        <span class="quanx"><?=$arr[5]?></span>
                    </li>
                    <li>
                        <a href="#">
                            <span class="categoryx">Programming</span>
                        </a>
                        <span class="quanx"><?=$arr[4]?></span>
                    </li>
                    <li>
                        <a href="#">
                            <span class="categoryx">Database</span>
                        </a>
                        <span class="quanx"><?=$arr[6]?></span>

                </ul>
            </div>
        </div>
    </div>
</section>




<?php $this->view('includes/footer')?>

