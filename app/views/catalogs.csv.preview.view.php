<?php $this->view('includes/header')?>

<body>
<br><br>
<h2 style="text-align:center;">Preview</h2><br><br>
<form action="" method="post" style="width:80%;margin-left:auto;margin-right:auto;">

<?php if($rows):?>
<?php foreach ($rows as $row):?>
<table style="table-layout: fixed" class="cataloging-table">

                   
               
                 
                <tr>
                <th>ISBN: </th>
                <td><?=$row->ISBN?></td>
                </tr>
                <tr>
                <th>CallNo: </th>
                <td><?=$row->CallNo?></td>
                </tr>
                <tr>
                    <th>LanguageCode: </th>
                    <td><?=$row->LanguageCode?></td>
                </tr>

                <tr>

                <th>Author: </th>
                <td><?=$row->Author?></td>
                </tr>
                <tr>
                    <th>Title: </th>
                    <td><?=$row->Title?></td>
                </tr>
                <tr>
                    <th>SubTitle: </th>
                    <td><?=$row->SubTitle?></td>
                </tr>
                <tr>
                    <th>StatementOfResposiblity: </th>
                    <td style="word-wrap: break-word"><?=$row->StatementOfResposiblity?></td>
                </tr>
                <tr>
                    <th>Edition: </th>
                    <td><?=$row->Edition?></td>
                </tr>
                <tr>
                    <th>PlaceOfPublication: </th>
                    <td><?=$row->PlaceOfPublication?></td>
                </tr>
                <tr>
                    <th>NameOfPublisher: </th>
                    <td><?=$row->NameOfPublisher?></td>
                </tr>
                <tr>
                    <th>YearOfPublication: </th>
                    <td><?=$row->YearOfPublication?></td>
                </tr>
                <tr>
                    <th>PhysicalDescription: </th>
                    <td><?=$row->PhysicalDescription?></td>
                </tr>
                <tr>
                    <th>Series: </th>
                    <td><?=$row->Series?></td>
                </tr>
                <tr>
                    <th>GeneralNote: </th>
                    <td><?=$row->GeneralNote?></td>
                </tr>
                <tr>
                    <th>Subject: </th>
                    <td><?=$row->Subject?></td>
                </tr>
                <tr>
                <th>URL: </th>
                    <td><?=$row->URL?></td>
                </tr>
                <tr>
                <th>AddedEntry: </th>
                <td><?=$row->AddedEntry?></td>
                </tr>
                <th>Item Type: </th>
                <td><?=$row->Type?></td>
                </tr>
                <th>Collection: </th>
                <td><?=$row->Collection?></td>
                </tr>
                <tr>
                <th>Status: </th>
                    <td><?=$row->Status?></td>
                </tr>
                <th>Damage State: </th>
                    <td><?=$row->damageState?></td>
                </tr>
                <tr>
                <th>Price(Rs.): </th>
                    <td><?=$row->price?></td>
                </tr>
                <tr>

                <th>Date: </th>
                    <td><?=get_date($row->date)?></td>
                </tr>

               

</table>
<br><br><br>
<?php endforeach;?>
<?php endif;?>
<br><br>


                <a href="<?=ROOT?>/cataloging/import"><input style="background-color: #0a2558;border: none;color: white;padding: 10px 10px;text-align: center;float:right;text-decoration: none;font-size: 15px;border-radius:5px;margin-left:7px;cursor: pointer;" value="Import">

                <a style="background-color: #0a2558;
  color: white;
  font-size: 15px;
  padding: 10px 15px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
  margin-bottom: 20px;
  text-decoration: none;" href="<?=ROOT?>/cataloging/csv_cancel">Cancel</a>

</form> 
</body>


