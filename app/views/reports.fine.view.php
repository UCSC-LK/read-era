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
                <div class="title">Fine Details</div>
            </div>
            <table class="table table-striped table-hover">
                <tr><th>Title</th><th>Member</th><th>Issue Date</th><th>Deadline</th><th>Fine Amount</th>
                </tr>
                <?php if($rows):?>
                    <?php foreach ($rows as $row):?>
                        <tr><td><?=$row->book_id?></td><td><?=$row->member_id?></td><td><?=get_date($row->issue_date)?></td><td><?=get_date($row->deadline)?></td>
                            <td><?=$row->fine?></td></tr>
                    <?php endforeach;?>
                <?php else:?>
                    <h4>No fine amounts were found at this time</h4>
                <?php endif;?>
            </table>
            <a href="<?=ROOT?>/reports/generatef" class="update_profile_button">Generate</a>
            <a href="<?=ROOT?>/reports" class="update_profile_button">Back</a>
        </div>
    </div>
</div>
</section>
<?php $this->view('includes/footer')?>






