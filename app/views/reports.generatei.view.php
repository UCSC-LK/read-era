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
    <h3>Inventory Checking Report</h3>
    <table class="print-table">
        <tr>
            <th>Total books in the library </th>
            <td><?=$arr[0]?></td>
        </tr>
        <tr>
            <th>Total available books in the library </th>
            <td><?=$arr[1]?></td>
        </tr>
        <tr>
            <th>Total lost books </th>
            <td><?=$arr[2]?></td>
        </tr>

        <tr>
            <th>Total damaged books</th>
            <td><?=$arr[3]?></td>
        </tr>
        <tr>
            <th>Total withdrawn books</th>
            <td><?=$arr[6]?></td>
        </tr>
        <tr>
            <th>Total borrowed books</th>
            <td><?=$arr[4]?></td>
        </tr>
        <tr>
            <th>Total reserved books</th>
            <td><?=$arr[5]?></td>
        </tr>
    </table>
    <button onclick="window.print();" class="update_profile_button">Print</button>
    <a class="update_profile_button" href="<?=ROOT?>/reports/inventory">Cancel</a>
</form>



