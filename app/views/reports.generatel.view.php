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
<form action="" method="post">
    <h3>Lost Books</h3>
    <table class="print-table">
        <tr><th>ISBN</th><th>Author</th><th>Title</th><th>Call Number</th><th>Language Code</th>
        </tr>
        <?php foreach ($rows as $row):?>
            <tr><td><?=$row->ISBN?></td><td><?=$row->Author?></td><td><?=$row->Title?></td><td><?=$row->CallNo?></td><td><?=$row->LanguageCode?></td></tr>
        <?php endforeach;?>
    </table>
        <button onclick="window.print();" class="update_profile_button">Print</button>
        <a class="update_profile_button" href="<?=ROOT?>/reports/lost">Cancel</a>
</form>

