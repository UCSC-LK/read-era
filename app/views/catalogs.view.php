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
                    <div class="title">Item Details</div>
                    <div>
                        <?php if(isset($_SESSION['b_m'])):
                            if($_SESSION['b_m'] == "Yes"):?>
                                <a class="add-new-item1" href="<?=ROOT?>/catalogs/add"><i class="fa fa-plus"></i> Add New Item</a>
                                <a class="add-new-item1" href="<?=ROOT?>/catalogs/csv"><i class="fa fa-plus"></i> CSV Import</a>

                            <?php endif;?>
                        <?php else:?>
                            <a class="add-new-item1" href="<?=ROOT?>/catalogs/add"><i class="fa fa-plus"></i> Add New Item</a>
                            <a class="add-new-item1" href="<?=ROOT?>/catalogs/csv"><i class="fa fa-plus"></i> CSV Import</a>
                        <?php endif;?>
                    </div>
                </div>
                <form class="search-form">
                            
                            <button><i class="fa fa-search"></i></button>
                            <input name="find" value="<?=isset($_GET['find'])?$_GET['find']:'';?>" type="text" placeholder="Search">

                </form>

                

                <table class="table table-striped table-hover">
                    <colgroup>
                        <col span="1" style="width: 15%;">
                        <col span="1" style="width: 25%;">
                        <col span="1" style="width: 15%;">
                        <col span="1" style="width: 10%;">
                        <col span="1" style="width: 10%;">
                        <col span="1" style="width: 9%;">

                    </colgroup>
                  
            
                    <?php if($rows):?>
                        <tr><th>ISBN</th><th>Title</th><th>Author</th><th>Status</th><th>Date</th><th>Actions</th>
                        </tr>
                        <?php foreach ($rows as $row):?>
                            <tr><td><?=$row->ISBN?></td><td><?=$row->Title?></td><td><?=$row->Author?></td><td><?=$row->Status?></td><td><?=get_date($row->date)?></td>
                                <td>
                                <?php if(isset($_SESSION['b_m'])):
                            if($_SESSION['b_m'] == "Yes"):?>
                                    <a href="<?=ROOT?>/catalogs/edit/<?=$row->id?>">
                                    <i class="fa fa-edit carta"></i>
                                    </a>
                                    <a href="<?=ROOT?>/catalogs/delete/<?=$row->id?>">
                                        <i class="fa fa-trash-alt carta four"></i>
                                    </a>
                                   
                            <?php endif;?>
                        <?php else:?>
                            <a href="<?=ROOT?>/catalogs/edit/<?=$row->id?>">
                                    <i class="fa fa-edit carta"></i>
                                    </a>
                                    <a href="<?=ROOT?>/catalogs/delete/<?=$row->id?>">
                                        <i class="fa fa-trash-alt carta four"></i>
                                    </a>
                                   
                            
                        <?php endif;?>
                                    
                                    <a href="<?=ROOT?>/catalogs/show/<?=$row->id?>">
                                        <i class="fa fa-search carta two"></i>
                                    </a>
                                
                                </td>
                            </tr>
                        
                        
                    <?php endforeach;?>
                    <?php else:?>
                        <h4>No items were found at this time</h4>
                    <?php endif;?>
                </table>
                <?php $pager->display()?>

                
            
            </div>
            
        </div>
    </div>
</section>




<?php $this->view('includes/footer')?>

