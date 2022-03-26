<?php  $this->view('includes/header') ?>
<?php  $this->view('includes/nav') ?>
<?php $this->view('includes/topbar')?>

<style>
    @media (max-width: 1000px) {
        .overview-boxes2 .box{
            width: calc(100% / 1 - 15px);
            margin-bottom: 15px;

        }
    }
    @media (max-width: 710px) {
        .content-box .add-new-item1{
            width: calc(100% / 1 - 55px);
            margin-bottom: 15px;

        }
    }
    @media (max-width: 1000px) {
        .content-box .box .table{
            width:100%;
            font-size: 12px;
        }
        .content-box .box .table .carta{
            margin-bottom: 12px;
            height: 25px;
            width: 25px;
            font-size: 15px;
        }
    }
    .content-box .add-new-item1:hover{
        background-color: #4CAF50; /* Green */
        color: white;
    }

</style>

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
                <?php if($_SESSION['success'] == 7):?>
                <div id="display-success" style="width: 100%;border: 1px solid #D8D8D8;padding: 10px;border-radius: 5px;font-family: Arial;font-size: 11px;text-transform: uppercase;background-color: rgb(236, 255, 216);color: green;text-align: center;margin-top: 10px;">Patron details Added Successfully</div>
                <br>
                <?php elseif($_SESSION['success'] == 9):?>
                <div id="display-success" style="width: 100%;border: 1px solid #D8D8D8;padding: 10px;border-radius: 5px;font-family: Arial;font-size: 11px;text-transform: uppercase;background-color: rgb(236, 255, 216);color: green;text-align: center;margin-top: 10px;">Patron details Updated Successfully</div>
                <br>
                <?php elseif($_SESSION['success'] == 11):?>
                <div id="display-success" style="width: 100%;border: 1px solid #D8D8D8;padding: 10px;border-radius: 5px;font-family: Arial;font-size: 11px;text-transform: uppercase;background-color: rgb(236, 255, 216);color: green;text-align: center;margin-top: 10px;">Patron Removed Successfully</div>
                <br>
                <?php endif?>


                <?php if($rows):?>

                    <table class="table table-striped table-hover">
                        <colgroup>
                            <col span="1" style="width: 20%;">
                            <col span="1" style="width: 25%;">
                            <col span="1" style="width: 15%;">
                            <col span="1" style="width: 10%;">
                            <col span="1" style="width: 9%;">

                        </colgroup>
                        <tr><th>Patron Name</th><th>Email Address</th><th>NIC</th><th>Category</th>
                            <th>
                               Actions
                            </th>
                        </tr>

                            <?php foreach ($rows as $row):?>
                                <tr><td><?=$row->firstname?> <?=$row->lastname?>
                                    <!--<td><?=$row->nic?></td>-->
                                    <td><?=$row->email?></td>
                                    <td><?=$row->nic?></td>
                                    <td><?=$row->rank?></td>

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
                    <?php $pager->display()?>

                
            </div>
        
            
        </div>
    </div>
</section>

<?php  $this->view('includes/footer') ?>





