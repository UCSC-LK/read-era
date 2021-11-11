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
</style>


<div class="home-content">


    <div class="content-box">
        <div class="box1 box">
            <div class="header">
                <div class="title">Issued Books</div>
            </div>
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
                    <input type="submit" value="Generate">
                    <a href="<?=ROOT?>/reports" class="generate_button">Back</a>
                </div>
            </form>
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