<?php  $this->view('includes/header') ?>
<?php  $this->view('includes/nav') ?>
<?php $this->view('includes/topbar')?>

<div class="home-content">
        <div class="overview-boxes2">
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Members</div>
                    <div class="number">1500</div>
                </div>
                <i class="fas fa-user cart two"></i>
            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Library Staff</div>
                    <div class="number">10</div>
                </div>
                <i class="fas fa-user cart two"></i>
            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Academic Staff</div>
                    <div class="number">100</div>
                </div>
                <i class="fas fa-user cart two"></i>

            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Undergraduates</div>
                    <div class="number">1000</div>
                </div>
                <i class="fas fa-user cart two"></i>
            </div>
            <br>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Postgraduates</div>
                    <div class="number">100</div>
                </div>
                <i class="fas fa-user cart two"></i>
            </div>
        </div>

        <div class="content-box">
            <div class="box1 box">
                <div class="header">
                    <div class="title">Recent Details</div>
                    <div>
                    <a class="add-new-item1" href="<?=ROOT?>/patrons/add"><i class="fa fa-plus"></i> Add New Member</a>
                    <a class="add-new-item1" href="<?=ROOT?>/patrons/csv"><i class="fa fa-plus"></i> CSV Import</a>
                    </div>
                </div>
                <form class="search-form">
                            
                            <button><i class="fa fa-search"></i></button>
                            <input name="find" value="<?=isset($_GET['find'])?$_GET['find']:'';?>" type="text" placeholder="search">

                </form>

                
                    <table class="table table-striped table-hover">
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





