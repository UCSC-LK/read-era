<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<?php $this->view('includes/topbar')?>

<style>
    .update_profile_button{
        margin-right: 10px;
    }
    label{
        margin-right: 50px;
        width: 50px;
    }
    /*.col-25 {
        float: left;
        width: 30%;
        margin-top: 6px;
    }*/

    /* Floating column for inputs: 75% width */
    /*.col-75 {
        float: left;
        width: 45%;
        margin-top: 6px;
        margin-right: 20px;

    }*/
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
                <div class="title">Issued Books</div>
            </div>
            <div>
                <form class="search-form" method="post" action="<?=ROOT?>/reports/generate">
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
            </div>
            <?php if($rows):?>
                <table class="print-table">
                    <tr><th>Title</th><th>Member</th><th>Issue date</th><th>Deadline</th>
                    </tr>
                    <?php foreach ($rows as $row):?>
                        <tr><td><?=$row->book_id?></td><td><?=$row->member_id?></td><td><?=get_date($row->issue_date)?></td><td><?=get_date($row->deadline)?></td></tr>
                    <?php endforeach;?>
                </table>

                <div>
                    <a class="update_profile_button" href="<?=ROOT?>/reports">Back</a>
                </div>
            <?php else:?>
                <h3>No Issued books were found</h3>
            <?php endif;?>
        </div>
    </div>
</div>
</section>



<?php $this->view('includes/footer')?>




<!-- <div class="home-content">


    <div class="content-box">
        <div class="box1 box">
            <div class="header">
                <div class="title">Issued Books</div>
            </div>
            <form method="post" action="<?=ROOT?>/reports/generate">
               <input name="fromdate" type="date" value="<?=get_var('fromdate')?>">
                  
               <input name="todate" type="date" value="<?=get_var('todate')?>">
                   


               
            
                <input type="submit" value="Generate">
                
                <a href="<?=ROOT?>/reports" class="generate_button">Back</a>
            </form>
        </div>
    </div>
</div>
</section>
<?php $this->view('includes/footer')?> -->