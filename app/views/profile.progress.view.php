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
                    <div class="title">Your progress</div>
                   
                </div><br>
                
                <div style="font-size:20px;">Reservations</div><br>
                   
              
               
                
                <?php if($row1):?>

                <table class="table table-striped table-hover">
                    <th>Title</th><th>Reserved date</th><th>Expire date</th>
                    </tr>

                        <?php foreach ($row1 as $row):?>
                            <tr><td><?=$row->book_id?></td><td><?=get_date($row->reserved_date)?></td><td><?=get_date($row->expire_date)?></td>
                            </tr>
                        
                        
                    <?php endforeach;?>
                    
                </table>
                <?php else:?>
                    <div style="font-size:15px;">No Reservations were found at this time</div>

                <?php endif;?>

                <br><div style="font-size:20px;">Borrowed books</div><br>
                <?php if($row2):?>
                <table class="table table-striped table-hover">
                    <tr><th>Title</th><th>Issue date</th><th>Deadline</th>
                    </tr>
            
                        <?php foreach ($row2 as $row):?>
                            <tr><td><?=$row->book_id?></td><td><?=get_date($row->issue_date)?></td><td><?=get_date($row->deadline)?></td></tr>
                        
                        
                    <?php endforeach;?>
                    <?php else:?>
                    <div style="font-size:15px;">No Borrowed books were found at this time</div>

                    <?php endif;?>
                </table>
                <br><br>
                <a class="cancel1" href="<?=ROOT?>/profile">Cancel</a>
                    
                
            
            </div>
           
            
        </div>
    </div>
</section>




<?php $this->view('includes/footer')?>
