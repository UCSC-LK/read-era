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
                <div class="title">User Configurations</div><br>

               <table class="table table-striped table-hover">
                        <tr>
                            <th>Category</th>
                            <th>Initial Fine(Rs.)</th>
                            <th>Fine Per Hour(Rs.)</th>
                            <th>Borrow Period(Days)</th>
                            <th>Reserve Period(Days)</th>
                            <th>Max_Borrow</th>
                            <th>Max_Reserve</th>
                            <th>Action</th>
                            
                        </tr>

                        <?php if($rows):?>
                            <?php foreach ($rows as $row):?>
                                <tr><td><?=$row->category?></td>
                                    <td><?=$row->initialFine?></td>
                                    <td><?=$row->finePerHour?></td>
                                    <td><?=$row->BorrowPeriod?></td>
                                    <td><?=$row->ReservedPeriod?></td>
                                    <td><?=$row->max_borrow?></td>
                                    <td><?=$row->max_reserve?></td>

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

