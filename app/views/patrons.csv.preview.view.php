<?php $this->view('includes/header')?>

<body>
<br><br>
<h2 style="text-align:center;">Preview</h2><br><br>
<form action="" method="post" style="width:80%;margin-left:auto;margin-right:auto;">

<?php if($rows):?>
<?php foreach ($rows as $row):?>
<table style="table-layout: fixed" class="cataloging-table">
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


</table>
<br><br><br>
<?php endforeach;?>
<?php endif;?>
<br><br>


                <a href="<?=ROOT?>/patrons/import"><input style="background-color: #0a2558;border: none;color: white;padding: 10px 10px;text-align: center;float:right;text-decoration: none;font-size: 15px;border-radius:5px;margin-left:7px;cursor: pointer;" value="Import">

                <a style="background-color: #0a2558;
  color: white;
  font-size: 15px;
  padding: 10px 15px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
  margin-bottom: 20px;
  text-decoration: none;" href="<?=ROOT?>/patrons/csv_cancel">Cancel</a>

</form> 
</body>


