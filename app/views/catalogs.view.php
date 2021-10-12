<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<?php $this->view('includes/topbar')?>




<div class="home-content">
        

        <div class="content-box">
            <div class="box1 box">
                <div class="header">
                    <div class="title">Recent Borrow Details</div>
                    <div>
                        
                        <a class="add-new-item1" href="<?=ROOT?>/catalogs/add"><i class="fa fa-plus"></i> Add new item</a>

                        <a class="add-new-item1" href="<?=ROOT?>/catalogs/csv"><i class="fa fa-plus"></i> CSV import</a>
                    </div>
                </div>
                <form class="search-form">
                            
                            <button><i class="fa fa-search"></i></button>
                            <input name="find" value="<?=isset($_GET['find'])?$_GET['find']:'';?>" type="text" placeholder="search">

                </form>

                

                <table class="table table-striped table-hover">
                    <tr><th>ISBN</th><th>Author</th><th>Title</th><th>Status</th><th>date</th><th>Actions</th>
                    </tr>
            
                    <?php if($rows):?>
                        <?php foreach ($rows as $row):?>
                            <tr><td><?=$row->ISBN?></td><td><?=$row->Author?></td><td><?=$row->Title?></td><td><?=$row->Status?></td><td><?=get_date($row->date)?></td>
                                <td>
                                    <a href="<?=ROOT?>/catalogs/edit/<?=$row->id?>">
                                    <button class="btn-sm btn-info text-white"><i class="fa fa-edit"></i></button>
                                    </a>
                                    <a href="<?=ROOT?>/catalogs/delete/<?=$row->id?>">
                                        <button class="btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button>
                                    </a>
                                    <a href="<?=ROOT?>/catalogs/show/<?=$row->id?>">
                                        <button class="btn-sm btn-primary"><i class="fa fa-search"></i></button>
                                    </a>
                                
                                </td>
                            </tr>
                        
                        
                    <?php endforeach;?>
                    <?php else:?>
                        <h4>No items were found at this time</h4>
                    <?php endif;?>
                </table>
                
                
            
            </div>
            
        </div>
    </div>
</section>




<?php $this->view('includes/footer')?>

