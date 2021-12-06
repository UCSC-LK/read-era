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
                <div class="title">Inventory Checking Report</div>
            </div>
            <table class="table table-striped table-hover">
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
            <a href="<?=ROOT?>/reports/generatei" class="update_profile_button">Generate</a>
            <a href="<?=ROOT?>/reports" class="update_profile_button">Back</a>
        </div>
    </div>
</div>
</section>
<?php $this->view('includes/footer')?>






