<?php $this->view('includes/header')?>
<style>
    @media print {
        .update_profile_button{
            display: none;
            margin-right: 100px;
        }
        h3{
            align-content: center;
        }
        .print-table{
            font-size: 12px;
        }
    }
</style>
<form action="" method="post" style="width:90%;margin-left:auto;margin-right:auto;">
    <h3>Returned Books</h3>
    <?php if($rows):?>
    <table class="print-table">
        <tr><th>Title</th><th>CopyID</th><th>Member</th><th>Issue Date</th><th>Deadline</th><th>Fine Amount</th>
        </tr>
        <?php foreach ($rows as $row):?>
            <tr><td><?=$row->book_id?></td><td><?=$row->copy_id?></td><td><?=$row->member_id?></td><td><?=get_date($row->issue_date)?></td><td><?=get_date($row->deadline)?></td>
                <td><?=$row->fine?></td></tr>
        <?php endforeach;?>
    </table>
    <button onclick="window.print();" class="update_profile_button">Print</button>
    <a class="update_profile_button" href="<?=ROOT?>/reports/return">Cancel</a>
    <?php else:?>
        <h3>No results found</h3>
    <?php endif;?>
</form>




