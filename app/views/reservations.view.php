<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<?php $this->view('includes/topbar')?>




<div class="home-content">
<div class="crumbs">
                
                <?php if(isset($crumbs)):?>
                <?php $length = count($crumbs);$x=1?>
                <?php foreach ($crumbs as $crumb):?>
                    <?php if($x==$length):?>
                        <a class="crumb_last" href="<?=$crumb[1]?>"><?=$crumb[0]?></a>
                    <?php else:?>
                        <a class="crumb_name" href="<?=$crumb[1]?>"><?=$crumb[0]?>/</a>
                    <?php endif;$x++;?>
                    
                <?php endforeach;?>
                <?php endif;?>
                
            </div>

        <div class="content-box">
            <div class="box1 box">
                <div class="header">
                    <div class="title">Reservations</div>
                </div>
                <form class="search-form">
                            
                            <button><i class="fa fa-search"></i></button>
                            <input name="find" value="<?=isset($_GET['find'])?$_GET['find']:'';?>" type="text" placeholder="search">

                </form>

                
                <?php if($rows):?>
                <table class="table table-striped table-hover">
                    <tr><th>Member</th><th>Title</th><th>CopyID</th><th>Reserved date</th><th>Expire date</th><th>State</th>
                    </tr>
                        <?php foreach ($rows as $row):?>
                            <tr><td><?=$row->member_id?></td><td><?=$row->book_id?></td><td><?=$row->copy_id?></td><td><?=get_date($row->reserved_date)?></td><td><?=get_date($row->expire_date)?></td><td><?=$row->state?></td>
                            </tr>
                        
                        
                    <?php endforeach;?>
                    <?php else:?>
                        <h4>No Reservations were found at this time</h4>
                    <?php endif;?>
                </table>

                <a class="cancel1" href="<?=ROOT?>/circulations">Cancel</a>
                <?php $pager->display()?>

                
                
            
            </div>
            
        </div>
    </div>
</section>




<?php $this->view('includes/footer')?>