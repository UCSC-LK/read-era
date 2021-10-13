<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<?php $this->view('includes/topbar')?>

    <div class="home-content">
        <div class="content-box">
    <div class="box1 box">
        <div class="title">Patron Details</div>
       
            <table class="table">
                <body>

                <?php if($rows):?>
                    <?php foreach ($rows as $row):?>
                        <tr>
                            <th>First Name: </th>
                            <td><?=$row->firstname?></td>
                        </tr>
                        <!--<tr>
                            <th>Middle Name: </th>
                            <td><?=$row->middlename?></td>
                        </tr>-->
                        <tr>
                            <th>Last Name: </th>
                            <td><?=$row->lastname?></td>
                        </tr>

                        <tr>
                            <th>Email Address: </th>
                            <td><?=$row->email?></td>
                        </tr>
                        <tr>
                            <th>Rank: </th>
                            <td><?=$row->rank?></td>
                        </tr>
                        <!--<tr>
                            <th>NIC: </th>
                            <td><?=$row->nic?></td>
                        </tr>
                        <tr>
                            <th>Phone Number: </th>
                            <td><?=$row->phone_num?></td>
                        </tr>-->
                        <tr>
                            <th>Gender: </th>
                            <td><?=$row->gender?></td>
                        </tr>
                        <tr>
                            <th>Date: </th>
                            <td><?=get_date($row->date)?></td>
                        </tr>
                    <?php endforeach;?>
                <?php endif;?>
                </body>
            </table>
       
             <a class="item-show-back" href="<?=ROOT?>/patrons">Back</button></a>

        </div>

    </div>
    </div>
    </section>

<?php $this->view('includes/footer')?>