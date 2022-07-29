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
    <?php if($row):?>
        <div class="card-group justify-content-center">
            <form method="post">
                <h3>Are you Sure You Want To Delete This Administrator?</h3>
                <input disabled autofocus class="form-control" type="text" name="firstname,lastname" placeholder="First Name" value="<?=get_var('firstname',$row[0]->firstname)?> <?=get_var('lastname',$row[0]->lastname)?>"><br><br>
                <input type="hidden" name="id">
                <input class="btn btn-danger float-end" type="submit" value="Delete">
                <a class="delete-back" href="<?=ROOT?>/administration">Cancel</a>
            </form>
        </div>
    <?php else:?>
        <div style="text-align: center">
            That Administrater was not found!!!<br><br>
            <br><br>
            <a class="delete-back" href="<?=ROOT?>/Administration">Cancel</a>
        </div>
    <?php endif;?>

        </div>

    </div>
</div>
</section>

<?php  $this->view('includes/footer') ?>







