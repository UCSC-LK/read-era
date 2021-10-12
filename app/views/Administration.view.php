<?php  $this->view('includes/header') ?>
<?php  $this->view('includes/nav') ?>
<?php $this->view('includes/topbar')?>

<div class="home-content">
        <div class="content-box">
            <div class="box1 box">
                <div class="header">
                    <div class="title">Recent Detail</div>
                    <div>
                    <a class="add-new-item1" href="<?=ROOT?>/administration/add"><i class="fa fa-plus"></i> Add New Administrator</a>
                    <a class="add-new-item1" href="<?=ROOT?>/administration/privilage_settings">Privilage settings</a>
                    <a class="add-new-item1" href="<?=ROOT?>/">User configurations</a>

                    </div>
                </div>
                <form class="search-form">
                            
                            <button><i class="fa fa-search"></i></button>
                            <input name="find" value="<?=isset($_GET['find'])?$_GET['find']:'';?>" type="text" placeholder="search">

                </form>

                
                    <table class="table table-striped table-hover">
                        <tr><th>Administrator Name</th><th>NIC Number</th><th>Email Address</th><th>Rank</th><th>Date</th>
                            <th>
                               Actions
                            </th>
                        </tr>

                        <?php if($rows):?>
                            <?php foreach ($rows as $row):?>
                                <tr><td><?=$row->firstname?> <?=$row->middlename?>. <?=$row->lastname?>
                                    <td><?=$row->nic?></td>
                                    <td><?=$row->email?></td>
                                    <td><?=$row->rank?></td>
                                    <td><?=get_date($row->date)?></td>

                                    <td>
                                        <a href="<?=ROOT?>/patrons/edit/<?=$row->id?>">
                                            <button class="btn btn-sm btn-info text-white">
                                                <i class="fa fa-edit"></i>
                                            </button></a>

                                        <a href="<?=ROOT?>/patrons/delete/<?=$row->id?>">
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash-alt"></i>
                                            </button></a>

                                        <a href="<?=ROOT?>/patrons/show/<?=$row->id?>">
                                            <button class="btn btn-sm btn-primary">
                                                <i class="fa fa-search"></i>
                                            </button></a>
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
