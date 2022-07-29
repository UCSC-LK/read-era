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
                <div class="title">Returned Books</div>
            </div>
            <form class="search-form" method="post" action="<?=ROOT?>/reports/generater">
                <div class="row">
                    <div class="col-25">
                        <label class="12">From Date</label>
                    </div>
                    <div class="col-75">
                        <input name="fromdate" type="date" value="<?=get_var('fromdate')?>" style="width: 200px;height: 60px;margin-right: 55px">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label class="12">To Date</label>
                    </div>
                    <div class="col-75">
                        <input name="todate" type="date" value="<?=get_var('todate')?>" style="width: 200px;height: 60px;margin-right: 55px">
                    </div>
                </div>
                <div class="row">
                    <input type="submit" value="Generate" style="width: 200px;height: 60px;margin-right: 55px">
                </div>
            </form>
            <?php if($rows):?>
            <table class="table table-striped table-hover">
                <tr><th>Title</th><th>Member</th><th>Issue Date</th><th>Deadline</th><th>Fine Amount</th>
                </tr>
                    <?php foreach ($rows as $row):?>
                        <tr><td><?=$row->book_id?></td><td><?=$row->member_id?></td><td><?=get_date($row->issue_date)?></td><td><?=get_date($row->deadline)?></td>
                            <td><?=$row->fine?></td></tr>
                    <?php endforeach;?>
                <?php else:?>
                    <h4>No return books were found at this time</h4>
                <?php endif;?>
            </table>
            <!--<a href="<?=ROOT?>/reports/generater" class="update_profile_button">Generate</a>-->
            <a href="<?=ROOT?>/reports" class="update_profile_button">Back</a>
        </div>
    </div>
</div>
</section>
<?php $this->view('includes/footer')?>







