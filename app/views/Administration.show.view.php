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
        <div class="title">Administrator Details</div>
       
        <table class="table">
                <body>

                <?php if($rows):?>
                    <?php foreach ($rows as $row):?>
                        <tr>
                            <th>Full Name: </th>
                            <td><?=$row->title?> <?=$row->firstname?> <?=$row->lastname?></td>
                        </tr>
                        <tr>
                            <th>Email Address: </th>
                            <td><?=$row->email?></td>
                        </tr>
                        <tr>
                            <th>Category: </th>
                            <td><?=$row->rank?></td>
                        </tr>
                        <tr>
                            <th>NIC: </th>
                            <td><?=$row->nic?></td>
                        </tr>
                        <tr>
                            <th>Phone Number: </th>
                            <td><?=$row->phone_num?></td>
                        </tr>
                        <tr>
                            <th>Gender: </th>
                            <td><?=$row->gender?></td>
                        </tr>

                            <th>Address: </th>
                            <td><?=$row->address?></td>
                        </tr>
                        <tr>
                            <th>Added Date: </th>
                            <td><?=get_date($row->date)?></td>
                        </tr>

                    <?php endforeach;?>
                <?php endif;?>
                </body>
            </table>
       
             <a class="item-show-back" href="<?=ROOT?>/Administration">Back</button></a>

        </div>

    </div>
    </div>
    </section>

<?php $this->view('includes/footer')?>