


<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<?php $this->view('includes/topbar')?>

<style>
    .report-type{
        background-color: #0d3073;
        color: white;
        padding: 10px 15px;
        cursor: pointer;
        margin-left: 10px;
        display: inline-block;
        font-size: 20px;
        height: 50px;
        width: 300px;
        border-radius: 12px;
        text-align: center;
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
    .col-75{
        float: left;
        width: 30%;
        margin-top: 6px;
        margin-right: 20px;
    }
    .row{
        margin-bottom: 6px;
    }
    @media (max-width: 1000px) {
        .col-75{
            width: calc(100% / 1 - 35px);
        }
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
                        <a class="report-type" href="<?=ROOT?>/reports/issue">Issued Books</a>
                    </div>
                    <div class="col-75">
                        <a class="report-type" href="<?=ROOT?>/catalogs/csv">Returned Books</a>
                    </div>
                    <div class="col-75">
                        <a class="report-type" href="<?=ROOT?>/catalogs/csv">TW and TWA</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-75">
                        <a class="report-type" href="<?=ROOT?>/reports/lost">Lost Books</a>
                    </div>
                    <div class="col-75">
                        <a class="report-type" href="<?=ROOT?>/reports/damage">Damaged Books</a>
                    </div>
                    <div class="col-75">
                        <a class="report-type" href="<?=ROOT?>/reports/fine">Fine</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-75">
                        <a class="report-type" href="<?=ROOT?>/reports/withdraw">Withdrawn Books</a>
                    </div>
                    <div class="col-75">
                        <a class="report-type" href="<?=ROOT?>/catalogs/csv">Inventory Missing</a>
                    </div>
                    <div class="col-75">
                        <a class="report-type" href="<?=ROOT?>/reports/inventory">Inventory Report</a>
                    </div>
                </div>
                <!--<div class="row">
                    <div class="col-75">
                        <a class="report-type" href="<?=ROOT?>/reports/withdraw">Withdrawn Books</a>
                    </div>
                    <div class="col-75">
                        <a class="report-type" href="<?=ROOT?>/catalogs/csv">Inventory Missing</a>
                    </div>
                    <div class="col-75">
                        <a class="report-type" href="<?=ROOT?>/reports/inventory">Inventory Report</a>
                    </div>
                </div>-->

            </div>
        </div>

    </div>
</div>
</section>




<?php $this->view('includes/footer')?>



