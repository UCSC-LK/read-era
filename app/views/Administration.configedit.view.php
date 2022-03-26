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
                    

                    <div class="row">
                        <div class="col-25">
                            <label for="initialFine">Initial Fine</label>
                        </div>
                        <div class="col-75">
                            <input autofocus class="form-control" type="text" name="initialFine" placeholder="Intitial Fine" value="<?=get_var('initialFine',$row[0]->initialFine)?>"><br>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-25">
                            <label for="finePerHour">Fine Per Hour</label>
                        </div>
                        <div class="col-75">
                            <input autofocus class="form-control" type="text" name="finePerHour" placeholder="Fine per hour" value="<?=get_var('finePerHour',$row[0]->finePerHour)?>"><br>
                        </div>
                    </div>

                   
                
                        <div class="row">
                            <div class="col-25">
                            <label for="BorrowPeriod">Borrow Period</label>
                            </div>
                        <div class="col-75">
                            <input autofocus class="form-control" type="text" name="BorrowPeriod" placeholder="Borrow Period" value="<?=get_var('BorrowPeriod',$row[0]->BorrowPeriod)?>"><br>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                            <label for="ReservedPeriod">Reserve Period</label>
                            </div>
                        <div class="col-75">
                            <input autofocus class="form-control" type="text" name="ReservedPeriod" placeholder="Reservation Period" value="<?=get_var('ReservedPeriod',$row[0]->ReservedPeriod)?>"><br>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                            <label for="max_borrow">Maximum Borrowings</label>
                            </div>
                        <div class="col-75">
                            <input autofocus class="form-control" type="text" name="max_borrow" placeholder="Maximum Borrowings" value="<?=get_var('max_borrow',$row[0]->max_borrow)?>"><br>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                            <label for="max_reserve">Maximum Reservations</label>
                            </div>
                        <div class="col-75">
                            <input autofocus class="form-control" type="text" name="max_reserve" placeholder="Maximum Reservations" value="<?=get_var('max_reserve',$row[0]->max_reserve)?>"><br>
                        </div>
                        </div>
                        
                    <div class="row">
                        <a href="<?=ROOT?>/administration/userconfig/"><input type="submit" value="Save">
                            <a class="cancel" href="<?=ROOT?>/administration/configuration/">Cancel</a>
                </form>
            </div>

            </div>

        </div>
    </div>
</div>



<?php  $this->view('includes/footer') ?>








