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
                    <div class="title">Issue Details</div>
                    <div>
                        
                        <a class="add-new-item1" href="<?=ROOT?>/circulations/show_reservations">Reservations</a>
                        <a class="add-new-item1" href="<?=ROOT?>/circulations/add"><i class="fa fa-plus"></i> New Issue</a>

                
                    </div>
                </div>
                <form class="search-form">
                            
                            <button><i class="fa fa-search"></i></button>
                            <input name="find" value="<?=isset($_GET['find'])?$_GET['find']:'';?>" type="text" placeholder="search">

                </form>
 
                <?php if($rows):?>
                <table class="table table-striped table-hover">
                    <colgroup>
                            <col span="1" style="width: 30%;">
                            <col span="1" style="width: 20%;">
                            <col span="1" style="width: 15%;">
                            <col span="1" style="width: 15%;">
                            <col span="1" style="width: 12%;">
                          

                        </colgroup>
                    <tr><th>Title</th><th>Member</th><th>Issue date</th><th>Deadline</th><th>Actions</th>
                    </tr>
            
                        <?php foreach ($rows as $row):?>
                            <tr><td><?=$row->book_id?></td><td><?=$row->member_id?></td><td><?=get_date($row->issue_date)?></td><td><?=get_date($row->deadline)?></td>
                            <td> <div>
                                <a class="return-btn" href="<?=ROOT?>/circulations/return/<?=$row->id?>">Return</a>
                                <a class="renew-btn" href="<?=ROOT?>/circulations/renew/<?=$row->id?>"></i>Renew</a>
                            </div>
                        </td>
                        </tr>
                        
                        
                    <?php endforeach;?>
                    <?php else:?>
                        <h4>No issues were found at this time</h4>
                    <?php endif;?>
                </table>
                <?php $pager->display()?>



                
            
            </div>
            
        </div>
    </div>
</section>




<?php $this->view('includes/footer')?>
