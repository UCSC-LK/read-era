<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<?php $this->view('includes/topbar')?>




<div class="home-content">
        

        <div class="content-box">
            <div class="box1 box">
                <div class="header">
                    <div class="title">Reservations</div>
                </div>
                <form class="search-form">
                            
                            <button><i class="fa fa-search"></i></button>
                            <input name="find" value="<?=isset($_GET['find'])?$_GET['find']:'';?>" type="text" placeholder="search">

                </form>

                

                <table class="table table-striped table-hover">
                    <tr><th>Member</th><th>Title</th><th>Reserved date</th><th>Expire date</th>
                    </tr>
            
                    <?php if($rows):?>
                        <?php foreach ($rows as $row):?>
                            <tr><td><?=$row->member_id?></td><td><?=$row->book_id?></td><td><?=$row->reserved_date?></td><td><?=$row->expire_date?></td>
                            </tr>
                        
                        
                    <?php endforeach;?>
                    <?php else:?>
                        <h4>No Reservations were found at this time</h4>
                    <?php endif;?>
                </table>
                <a class="cancel" href="<?=ROOT?>/circulations">Cancel</a>
                
                
            
            </div>
            
        </div>
    </div>
</section>




<?php $this->view('includes/footer')?>