<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<?php $this->view('includes/topbar')?>




<div class="home-content">


    <div class="content-box">
        <div class="box1 box">
            <div class="row">

                <div class="col-md-12 head">
                    <div class="float-right">
                        <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i> Import</a>
                    </div>
                </div>

                <div class="col-md-12" id="importFrm" style="display: none;">
                    <form method="post" enctype="multipart/form-data">
                        <input type="file" name="file" />
                        <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
                        <a class="delete-back" href="<?=ROOT?>/patrons">Cancel</a>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>
</section>

<?php $this->view('includes/footer')?>
