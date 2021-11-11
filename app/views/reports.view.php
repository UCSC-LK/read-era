<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<?php $this->view('includes/topbar')?>

<style>
    .add-new-item1{
        color: #0A2558;
    }
    .carta{
        display: inline-block;
        font-size: 20px;
        height: 50px;
        width: 300px;
        background: #0A2558;
        line-height: 30px;
        text-align: center;
        color: gainsboro;
        border-radius: 12px;
        margin: -15px 0 0 6px;
        align-content: center;
    }
</style>


<div class="home-content">


    <div class="content-box">
        <div class="box1 box">
            <div class="header">
                <div class="title">Report Categories</div><br>
                <br>
            </div>
            <div>
                <div class="row">
                    <div class="col-75">
                        <a class="add-new-item1 carta" href="<?=ROOT?>/reports/issue">Issued Books</a>
                    </div>
                    <div class="col-75">
                        <a class="add-new-item1 carta" href="<?=ROOT?>/catalogs/csv">Returned Books</a>
                    </div>
                    <div class="col-75">
                        <a class="add-new-item1 carta" href="<?=ROOT?>/catalogs/csv">TW and TWA</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-75">
                        <a class="add-new-item1 carta" href="<?=ROOT?>/reports/lost">Lost Books</a>
                    </div>
                    <div class="col-75">
                        <a class="add-new-item1 carta" href="<?=ROOT?>/reports/damage">Damaged Books</a>
                    </div>
                    <div class="col-75">
                        <a class="add-new-item1 carta" href="<?=ROOT?>/reports/fine">Fine</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-75">
                        <a class="add-new-item1 carta" href="<?=ROOT?>/reports/withdraw">Withdrawn Books</a>
                    </div>
                    <div class="col-75">
                        <a class="add-new-item1 carta" href="<?=ROOT?>/catalogs/csv">Inventory Missing</a>
                    </div>
                    <div class="col-75">
                        <a class="add-new-item1 carta" href="<?=ROOT?>/catalogs/csv">Inventory Report</a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
</section>




<?php $this->view('includes/footer')?>


