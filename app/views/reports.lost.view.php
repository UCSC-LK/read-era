<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<?php $this->view('includes/topbar')?>

<style>
    .update_profile_button{
        margin-right: 10px;
    }
    label{
        margin-right: 20px;
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
    <div class="content-box">
        <div class="box1 box">
            <div class="header">
                <div class="title">Lost Books</div>
            </div>
            <?php if($rows):?>
            <table class="table table-striped table-hover">
                <tr><th>ISBN</th><th>CopyID</th><th>Author</th><th>Title</th><th>Call Number</th><th>Language Code</th>
                </tr>
                    <?php foreach ($rows as $row):?>
                        <tr><td><?=$row->ISBN?></td><td><?=$row->copy_id?></td><td><?=$row->Author?></td><td><?=$row->Title?></td><td><?=$row->CallNo?></td><td><?=$row->LanguageCode?></td></tr>
                    <?php endforeach;?>
            </table>
            <?php else:?>
                <h4>No losts were found at this time</h4>
            <?php endif;?>
            <a href="<?=ROOT?>/reports/generatel" class="update_profile_button">Generate</a>
            <a href="<?=ROOT?>/reports" class="update_profile_button">Back</a>
        </div>
    </div>
</div>
</section>
<?php $this->view('includes/footer')?>




