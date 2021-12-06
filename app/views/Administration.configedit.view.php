<?php  $this->view('includes/header') ?>
<?php  $this->view('includes/nav') ?>

<?php $this->view('includes/topbar')?>
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

            <h2 class="title">Update User Configuration</h2>
            <div class="container">
                <form method="post">
                    <?php if(count($errors) > 0):?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong style="color:red;">Errors:</strong>
                            <?php foreach($errors as $error):?>
                                <div style="color:red;"><?=$error?></div>
                            <?php endforeach;?>
                            
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div><br>
                    <?php endif;?>

                    <div class="row">
                        <div class="col-25">
                            <label for="Fine">Fine Amount</label>
                        </div>
                        <div class="col-75">
                            <input autofocus class="form-control" type="text" name="Fine" placeholder="Fine" value="<?=get_var('Fine',$row[0]->Fine)?>"><br>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-25">
                            <label for="Fine">Number Of Book For Reserved</label>
                        </div>
                        <div class="col-75">
                            <input autofocus class="form-control" type="text" name="no_book" placeholder="No of Books" value="<?=get_var('no_book',$row[0]->no_book)?>"><br>
                        </div>
                    </div>

                        <div class="row">
                            <div class="col-25">
                            <label for="Fine">Due To Days</label>
                            </div>
                        <div class="col-75">
                            <input autofocus class="form-control" type="text" name="Due_date" placeholder="Due Days" value="<?=get_var('Due_date',$row[0]->Due_date)?>"><br>
                        </div>
                        </div>
                    <div class="row">
                        <a href="<?=ROOT?>/administration/userconfig/"><input type="submit" value="Save">
                            <a class="cancel" href="<?=ROOT?>/administration/userconfig/">Cancel</a>
                </form>
            </div>

            </div>

        </div>
    </div>
</div>



<?php  $this->view('includes/footer') ?>








