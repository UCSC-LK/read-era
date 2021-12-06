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
                <div class="title">Fine, Amount Of Books and Duration </div>

               <table class="table table-striped table-hover">
                        <colgroup>
                                <col span="1" style="width: 15%;">
                                <col span="1" style="width: 15%;">
                                <col span="1" style="width: 15%;">
                                <col span="1" style="width: 10%;">
                                <col span="1" style="width: 5%;">

                        </colgroup>
                        <tr><th>Rank</th><th>Fine Amount(Rs)</th><th>Number of Books For Reserved</th><th>Time Period</th><th>Action</th>
                            
                        </tr>

                        <?php if($rows):?>
                            <?php foreach ($rows as $row):?>
                                <tr><td><?=$row->Rank?></td>
                                    <td><?=$row->Fine?></td>
                                    <td><?=$row->no_book?></td>
                                    <td><?=$row->Due_date?></td>
                                    <td>
                                        <a href="<?=ROOT?>/administration/configedit/<?=$row->id?>">
                                        <i class="fa fa-edit carta"></i>
                                        </a>
                                    </td>
                                    

                                   
                                </tr>

                            <?php endforeach; ?>
                        <?php else:?>
                            <h4>No Userconfiguration were found at this time</h4>
                        <?php endif;?>
                    </table>
               
             
              

                <a class="item-show-back" href="<?=ROOT?>/Administration">Back</button></a>
                
                    
                

                
            
            </div>
            
        </div>
    </div>
</section>




<?php $this->view('includes/footer')?>

