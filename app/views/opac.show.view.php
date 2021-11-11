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
                <div class="title">Details</div>
               
                <table style="table-layout: fixed" class="table table-striped table-hover">
               
                    <body>
               
                    <?php if($rows):?>
                         <?php foreach ($rows as $row):?>
                              <tr>
                              <th>ISBN: </th>
                              <td><?=$row->ISBN?></td>
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
                              <tr>
                              <th>Date: </th>
                                   <td><?=get_date($row->date)?></td>
                              </tr>


                         

                              
                         
                    <?php endforeach;?>
                    <?php endif;?>
                    </body>
       
                </table>
              
               
                <a class="item-show-back" href="<?=ROOT?>/opac">Back</button>
                </a>
                
            
            </div>
            
        </div>
    </div>
</section>




<?php $this->view('includes/footer')?>

