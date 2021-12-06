<?php  $this->view('includes/header') ?>
<?php  $this->view('includes/nav') ?>
<?php $this->view('includes/topbar')?>

<div class="home-content">
        <div class="content-box">
            <div class="box1 box">
                <div class="header">
                    <div class="title">Privileges</div>
                </div>
                <form class="search-form">
                            
                            <button><i class="fa fa-search"></i></button>
                            <input name="find" value="<?=isset($_GET['find'])?$_GET['find']:'';?>" type="text" placeholder="Search">

                </form>

                
                    <table class="table table-striped table-hover">
                        <tr><th>Administrator Name</th>
                        <th>Book_Management</th><th>User_Management</th>
                        <th>Change</th>
                        </tr>

                        <?php if($rows):?>
                            <?php foreach ($rows as $row):?>
                                <tr><td><?=$row->name?></td>
                                    <td>
                                        <div class="button_privilege">
                                            <?=$row->book_management?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="button_privilege">
                                            <?=$row->user_management?>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="<?=ROOT?>/administration/PrivilageEdit/<?=$row->id?>">
                                        <i class="fa fa-edit carta"></i>
                                        </a>
                                       
                                    </td>                                   
                                </tr>

                            <?php endforeach; ?>
                        <?php else:?>
                            <h4>Unable to access the privilege settings</h4>
                        <?php endif;?>
                    </table>

                
                
            </div>
        
            
        </div>
    </div>
</section>

<?php  $this->view('includes/footer') ?>
