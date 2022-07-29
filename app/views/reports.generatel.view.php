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
<form action="" method="post" style="width:80%;margin-left:auto;margin-right:auto;">
    <h3>Lost Books</h3>
    <?php if($rows):?>
    <table class="print-table">
        <tr><th>ISBN</th><th>CopyID</th><th>Author</th><th>Title</th><th>Call Number</th><th>Language Code</th>
        </tr>
        <?php foreach ($rows as $row):?>
            <tr><td><?=$row->ISBN?></td><td><?=$row->copy_id?></td><td><?=$row->Author?></td><td><?=$row->Title?></td><td><?=$row->CallNo?></td><td><?=$row->LanguageCode?></td></tr>
        <?php endforeach;?>
    </table>
        <button onclick="window.print();" class="update_profile_button">Print</button>
        <a class="update_profile_button" href="<?=ROOT?>/reports/lost">Cancel</a>
    <?php else:?>
        <h3>No results found</h3>
    <?php endif;?>
</form>

