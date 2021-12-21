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
    <div class="content-box">
        <div class="box1 box">
            <div class="header">
                <div class="title">TW Or TWA Books</div>
            </div>
            <table class="table table-striped table-hover">
                <tr><th>ISBN</th><th>Author</th><th>Title</th><th>Call Number</th><th>Language Code</th>
                </tr>
                <?php if($rows):?>
                    <?php foreach ($rows as $row):?>
                        <tr><td><?=$row->ISBN?></td><td><?=$row->Author?></td><td><?=$row->Title?></td><td><?=$row->CallNo?></td><td><?=$row->LanguageCode?></td></tr>
                    <?php endforeach;?>
                <?php else:?>
                    <h4>No TW or TWA books were found at this time</h4>
                <?php endif;?>
            </table>
            <a href="<?=ROOT?>/reports/generatetw" class="update_profile_button">Generate</a>
            <a href="<?=ROOT?>/reports" class="update_profile_button">Back</a>
        </div>
    </div>
</div>
</section>
<?php $this->view('includes/footer')?>






