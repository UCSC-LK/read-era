<?php $this->view('includes/header')?>
<style>
    @media print {
        .update_profile_button{
            display: none;
            margin-left: 10px;
        }
        h3{
            align-content: center;
        }
        .print-table{
            font-size: 12px;
        }
    }
</style>
<form action="" method="post" style="width:80%;margin-left:auto;margin-right:auto;">
    <h3>Issued Book Details</h3>
    <?php if($rows):?>
    <table class="print-table">
        <tr><th>Title</th><th>Member</th><th>Issue date</th><th>Deadline</th>
        </tr>


            <?php foreach ($rows as $row):?>
                <tr><td><?=$row->book_id?></td><td><?=$row->member_id?></td><td><?=get_date($row->issue_date)?></td><td><?=get_date($row->deadline)?></td></tr>
            <?php endforeach;?>


    </table>


    <div>
        <button onclick="window.print();" class="update_profile_button">Print</button>
        <a class="update_profile_button" href="<?=ROOT?>/reports/issue">Cancel</a>
    </div>
    <?php else:?>
        <h3>No results found</h3>
    <?php endif;?>
</form>