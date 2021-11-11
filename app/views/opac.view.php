<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
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
            <div class="header">
                <div class="title">Online Public Access Catalog</div>
                <form class="search-form">
                    <button><i class="fa fa-search" ></i></button>
                    <input name="find" value="<?=isset($_GET['find'])?$_GET['find']:'';?>" type="text" placeholder="search">
                </form>
            </div>

            <?php if($rows):?>
                <?php foreach ($rows as $row):?>
                    <div class="book">
                        <div class="book-preview">
                            <h6>Title</h6>
                            <h2><?=$row->Title?></h2>
                            <a href="<?=ROOT?>/opac/show/<?=$row->id?>">View all details</a>
                        </div>
                        <div class="book-info">
                            <h3>ISBN: <?=$row->ISBN?></h3>
                            <h3>Author: <?=$row->Author?></h3>
                            <h3>Status: <?=$row->Status?></h3><br>
                            <br>
                            <?php if($row->Status == 'Available'):?>
                                <a href="<?=ROOT?>/opac/add_reservation/<?=$row->id?>"><button class="opac-btn">Reserve Book</button></a>
                            <?php elseif(in_array($row->id, $check)):?>
                           
                                <a href="<?=ROOT?>/opac/remove_reservation/<?=$row->id?>"><button class="opac-btn">Remove reservation</button></a>

                            
                            <?php endif;?>
                        </div>
                    </div>
                                    
           <?php endforeach;?>
            <?php else:?>
                <h4>No items were found at this time</h4>
            <?php endif;?>

            
            
        </div>

    </div>
</div>
</section>





<?php $this->view('includes/footer')?>


