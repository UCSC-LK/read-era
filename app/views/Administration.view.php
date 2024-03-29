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
        <div class="content-box">
            <div class="box1 box">
                <div class="header">
                    <div class="title">Administrator Details</div>
                    <div>
                    <?php if(Auth::rank() == 'Librarian'):?>
                      <a class="add-new-item1" href="<?=ROOT?>/administration/add"><i class="fa fa-plus"></i> Add New Administrator</a>
                      <a class="add-new-item1" href="<?=ROOT?>/administration/privilage">Privilage Settings</a>
                      <a class="add-new-item1" href="<?=ROOT?>/administration/configuration">User Configurations</a>


                    <?php endif;?>

                    </div>
                </div>
                <form class="search-form">
                            
                            <button><i class="fa fa-search"></i></button>
                            <input name="find" value="<?=isset($_GET['find'])?$_GET['find']:'';?>" type="text" placeholder="search">

                </form>
                <?php if($_SESSION['success'] == 13):?>
                <div id="display-success" style="width: 100%;border: 1px solid #D8D8D8;padding: 10px;border-radius: 5px;font-family: Arial;font-size: 11px;text-transform: uppercase;background-color: rgb(236, 255, 216);color: green;text-align: center;margin-top: 10px;">Administrator details Added Successfully</div>
                <br>
                <?php elseif($_SESSION['success'] == 15):?>
                <div id="display-success" style="width: 100%;border: 1px solid #D8D8D8;padding: 10px;border-radius: 5px;font-family: Arial;font-size: 11px;text-transform: uppercase;background-color: rgb(236, 255, 216);color: green;text-align: center;margin-top: 10px;">Administrator details Updated Successfully</div>
                <br>
                <?php elseif($_SESSION['success'] == 17):?>
                <div id="display-success" style="width: 100%;border: 1px solid #D8D8D8;padding: 10px;border-radius: 5px;font-family: Arial;font-size: 11px;text-transform: uppercase;background-color: rgb(236, 255, 216);color: green;text-align: center;margin-top: 10px;">Administrator Removed Successfully</div>
                <br>
                <?php endif?>

                    <?php if($rows):?>

                    <table class="table table-striped table-hover">
                        <colgroup>
                                <col span="1" style="width: 20%;">
                                <col span="1" style="width: 25%;">
                                <col span="1" style="width: 15%;">
                                <col span="1" style="width: 10%;">
                                <col span="1" style="width: 10%;">

                        </colgroup>
                        <tr><th>Administrator Name</th><th>Email</th><th>NIC</th><th>Category</th>
                            <th>
                               Actions
                            </th>
                        </tr>

                            <?php foreach ($rows as $row):?>
                                <tr><td><?=$row->firstname?> <?=$row->lastname?>
                                    <td><?=$row->email?></td>
                                    <td><?=$row->nic?></td>
                                    <td><?=$row->rank?></td>

                                    <td>
                                        <?php if(Auth::rank() == 'Librarian'):?>
                                            <a href="<?=ROOT?>/administration/edit/<?=$row->id?>">
                                            <i class="fa fa-edit carta"></i>
                                            </a>
                                            <a href="<?=ROOT?>/administration/delete/<?=$row->id?>">
                                                <i class="fa fa-trash-alt carta four"></i>
                                            </a>
                                        <?php endif;?>
                                        <a href="<?=ROOT?>/administration/show/<?=$row->id?>">
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
