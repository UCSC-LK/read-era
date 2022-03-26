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






