<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<?php $this->view('includes/topbar')?>




<div class="home-content">
        

        <div class="content-box">
            <div class="box1 box">
                <div class="header">
                    <div class="title">Recent Issues</div>
                    <div>
                        
                        <a class="add-new-item1" href="<?=ROOT?>/circulations/show_reservations">Reservations</a>
                        <a class="add-new-item1" href="<?=ROOT?>/circulations/add"><i class="fa fa-plus"></i> New Issue</a>

                
                    </div>
                </div>
                <form class="search-form">
                            
                            <button><i class="fa fa-search"></i></button>
                            <input name="find" value="<?=isset($_GET['find'])?$_GET['find']:'';?>" type="text" placeholder="search">

                </form>

                <table class="table table-striped table-hover">
                    <tr><th>Title</th><th>Member</th><th>Issue date</th><th>Deadline</th>
                    </tr>
            
                    <?php if($rows):?>
                        <?php foreach ($rows as $row):?>
                            <tr><td><?=$row->book_id?></td><td><?=$row->member_id?></td><td><?=get_date($row->issue_date)?></td><td><?=get_date($row->deadline)?></td></tr>
                        
                        
                    <?php endforeach;?>
                    <?php else:?>
                        <h4>No issues were found at this time</h4>
                    <?php endif;?>
                </table>

                
            
            </div>
            
        </div>
    </div>
</section>




<?php $this->view('includes/footer')?>

