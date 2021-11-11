<?php  $this->view('includes/header') ?>
<?php  $this->view('includes/nav') ?>
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
        <div class="overview-boxes2">
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Members</div>
                    <div class="number"><?=$arr[0]?></div>
                </div>
                <i class="fas fa-user cart two"></i>
            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Library Staff</div>
                    <div class="number"><?=$arr[1]?></div>
                </div>
                <i class="fas fa-user cart two"></i>
            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Academic Staff</div>
                    <div class="number"><?=$arr[2]?></div>
                </div>
                <i class="fas fa-user cart two"></i>

            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Undergraduates</div>
                    <div class="number"><?=$arr[3]?></div>
                </div>
                <i class="fas fa-user cart two"></i>
            </div>
            <br>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Postgraduates</div>
                    <div class="number"><?=$arr[4]?></div>
                </div>
                <i class="fas fa-user cart two"></i>
            </div>
        </div>

        <div class="content-box">
            <div class="box1 box">
                <div class="header">
                    <div class="title">Patron Details</div>
                    <div>
                    <?php if(isset($_SESSION['u_m'])):
                            if($_SESSION['u_m'] == "Yes"):?>
                                 <a class="add-new-item1" href="<?=ROOT?>/patrons/add"><i class="fa fa-plus"></i> Add New Member</a>
                                 <a class="add-new-item1" href="<?=ROOT?>/patrons/csv"><i class="fa fa-plus"></i> CSV Import</a>
                            <?php endif;?>
                        <?php else:?>
                            <a class="add-new-item1" href="<?=ROOT?>/patrons/add"><i class="fa fa-plus"></i> Add New Member</a>
                            <a class="add-new-item1" href="<?=ROOT?>/patrons/csv"><i class="fa fa-plus"></i> CSV Import</a>
                        <?php endif;?>
                    
                    </div>
                </div>
                <form class="search-form">
                            
                            <button><i class="fa fa-search"></i></button>
                            <input name="find" value="<?=isset($_GET['find'])?$_GET['find']:'';?>" type="text" placeholder="Search">

                </form>

                
                    <table class="table table-striped table-hover">
                        <colgroup>
                            <col span="1" style="width: 20%;">
                            <col span="1" style="width: 25%;">
                            <col span="1" style="width: 15%;">
                            <col span="1" style="width: 10%;">
                            <col span="1" style="width: 9%;">

                        </colgroup>
                        <tr><th>Patron Name</th><!--<th>NIC Number</th>--><th>Email Address</th><th>Rank</th><th>Date</th>
                            <th>
                               Actions
                            </th>
                        </tr>

                        <?php if($rows):?>
                            <?php foreach ($rows as $row):?>
                                <tr><td><?=$row->firstname?> <?=$row->lastname?>
                                    <!--<td><?=$row->nic?></td>-->
                                    <td><?=$row->email?></td>
                                    <td><?=$row->rank?></td>
                                    <td><?=get_date($row->date)?></td>

                                    <td>
                                    <?php if(isset($_SESSION['u_m'])):
                                    if($_SESSION['u_m'] == "Yes"):?>
                                         <a href="<?=ROOT?>/patrons/edit/<?=$row->id?>">
                                        <i class="fa fa-edit carta"></i>
                                        </a>
                                        <a href="<?=ROOT?>/patrons/delete/<?=$row->id?>">
                                            <i class="fa fa-trash-alt carta four"></i>
                                        </a>
                                      
                                        
                                 <?php endif;?>
                                    <?php else:?>
                                        <a href="<?=ROOT?>/patrons/edit/<?=$row->id?>">
                                        <i class="fa fa-edit carta"></i>
                                        </a>
                                        <a href="<?=ROOT?>/patrons/delete/<?=$row->id?>">
                                            <i class="fa fa-trash-alt carta four"></i>
                                        </a>
                                        <?php endif;?>
                                        <a href="<?=ROOT?>/patrons/show/<?=$row->id?>">
                                            <i class="fa fa-search carta two"></i>
                                        </a>
                                        
                                     
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        <?php else:?>
                            <h4>No Patrons were found at this time</h4>
                        <?php endif;?>
                    </table>

                
                
            </div>
        
            
        </div>
    </div>
</section>

<?php  $this->view('includes/footer') ?>





