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

            <h2 class="title">Edit Item</h2>

            <div class="container">

            <form method="post">
                <?php if(count($errors) > 0):?>
                <div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
                    <strong style="color:red;">Errors</strong>
                    <?php foreach($errors as $error):?>
                        <div style="color:red;"><?=$error?></div>
                    <?php endforeach;?>
                    
                </div>
                    <br><br>
                <?php endif;?>

                <div class="row">
                <div class="col-25">
                    <label for="fname">ISBN</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('ISBN',$row[0]->ISBN)?>" type="text" name="ISBN" placeholder="ISBN"><br><br>



                </div>
                <div class="col-25">
                    <label for="">CopyID</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('copy_id',$row[0]->copy_id)?>" type="text" name="copy_id" placeholder="CopyID"><br><br>

                </div>
                </div>

                <div class="row">
                <div class="col-25">
                    <label for="fname">Language Code</label>
                </div>
                <div class="col-75">
                         <select class="my-2 form-control" name="LanguageCode">
                            <option class="items" <?=get_select('LanguageCode','')?> value="<?=get_var('LanguageCode',$row[0]->LanguageCode)?>"><?=get_var('LanguageCode',$row[0]->LanguageCode)?></option>
                            <option class="items" <?=get_select('LanguageCode','eng')?> value="eng">eng</option>
                            <option class="items" <?=get_select('LanguageCode','snh')?> value="snh">snh</option>
                            <option class="items" <?=get_select('LanguageCode','tam')?> value="tam">tam</option>
                        </select>
                </div>
                <div class="col-25">
                    <label for="">Author</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('Author',$row[0]->Author)?>" type="text" name="Author" placeholder="Author"><br><br>
                </div>
                </div>


                <div class="row">
                <div class="col-25">
                    <label for="lname">Title</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('Title',$row[0]->Title)?>" type="text" name="Title" placeholder="Title"><br><br>
                </div>

                <div class="col-25">
                    <label for="">Sub Title</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('SubTitle',$row[0]->SubTitle)?>" type="text" name="SubTitle" placeholder="Subtitle"><br><br>
                </div>
                </div>



                <div class="row">
                <div class="col-25">
                    <label for="">Edition</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('Edition',$row[0]->Edition)?>" type="text" name="Edition" placeholder="Edition"><br><br>


                </div>

                <div class="col-25">
                    <label for="">Name of Publication</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('NameOfPublisher',$row[0]->NameOfPublisher)?>" type="text" name="NameOfPublisher" placeholder="Name of publisher"><br><br>

                </div>
                </div>

                <div class="row">
                <div class="col-25">
                    <label for="">Place of Publication</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('PlaceOfPublication',$row[0]->PlaceOfPublication)?>" type="text" name="PlaceOfPublication" placeholder="Place of publication"><br><br>
                </div>

                <div class="col-25">
                    <label for="">Year of Publication</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('YearOfPublication',$row[0]->YearOfPublication)?>" type="text" name="YearOfPublication" placeholder="Year of Publication"><br><br>

                </div>
                </div>

                <div class="row">
                <div class="col-25">
                    <label for="">Series</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('Series',$row[0]->Series)?>" type="text" name="Series" placeholder="Series"><br><br>

                </div>

                <div class="col-25">
                    <label for="">General Note</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('GeneralNote',$row[0]->GeneralNote)?>" type="text" name="GeneralNote" placeholder="General Note"><br><br>


                </div>
                </div>

                <div class="row">
                <div class="col-25">
                    <label for="">Subject</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('Subject',$row[0]->Subject)?>" type="text" name="Subject" placeholder="Subject"><br><br>

            </div>

                <div class="col-25">
                    <label for="">URL</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('URL',$row[0]->URL)?>" type="text" name="URL" placeholder="URL"><br><br>


                </div>
                </div>

                <div class="row">
                <div class="col-25">
                    <label for="">Added Entry</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('AddedEntry',$row[0]->AddedEntry)?>" type="text" name="AddedEntry" placeholder="Added Entry"><br><br>

                </div>

                <div class="col-25">
                    <label for="">Status</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('Status',$row[0]->Status)?>" type="text" name="Status" placeholder="Status"><br><br>

                </div>
                </div>

                <div class="row">
                <div class="col-25">
                    <label for="">Type</label>
                </div>
                <div class="col-75">
                    <select class="my-2 form-control" name="Type">
                        <option class="items" <?=get_select('Type','')?> value="<?=get_var('Type',$row[0]->Type)?>"><?=get_var('Type',$row[0]->Type)?></option>
                        <option class="items" <?=get_select('Type','Textbook')?> value="Textbook">Text book</option>
                        <option class="items" <?=get_select('Type','CD/DVD')?> value="CD/DVD">CD/DVD</option>
                        <option class="items" <?=get_select('Type','Magazine')?> value="Magazine">Magazine</option>
                    </select><br><br>
                </div>

                <div class="col-25">
                    <label for="">Collection</label>
                </div>
                <div class="col-75">
                    <select class="my-2 form-control" name="Collection">
                        <option class="items" <?=get_select('Collection','')?> value="<?=get_var('Collection',$row[0]->Collection)?>"><?=get_var('Collection',$row[0]->Collection)?></option>
                        <option class="items" <?=get_select('Collection','Lending')?> value="Lending">Lending</option>
                        <option class="items" <?=get_select('Collection','Reference')?> value="Reference">Reference</option>
                        <option class="items" <?=get_select('Collection','PermanentReference')?> value="Permanent Reference">Permanant Reference</option>
                        <option class="items" <?=get_select('Collection','CD/DVD')?> value="Reference">CD/DVD</option>
                        <option class="items" <?=get_select('Collection','Thesis')?> value="Thesis">Thesis</option>

                    </select><br><br>
                </div>
                </div>


                <div class="row">
                <div class="col-25">
                    <label for="subject">Statement of Responsibility</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('StatementOfResposiblity',$row[0]->StatementOfResposiblity)?>" type="text" name="StatementOfResposiblity" placeholder="Statement of Resposiblity"><br><br>

            </div>

                <div class="col-25">
                    <label for="subject1">Physical Description</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('PhysicalDescription',$row[0]->PhysicalDescription)?>" type="text" name="PhysicalDescription" placeholder="Physical Description"><br><br>

                </div>
                </div>

                <div class="row">
                <div class="col-25">
                    <label for="price">Price(Rupees)</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('price',$row[0]->price)?>" type="text" name="price" placeholder="Price (In rupees)"><br><br>

                </div>
                <div class="col-25">
                    <label for="">Damage Status</label>
                </div>
                <div class="col-75">
                    <select class="my-2 form-control" name="damageState">
                        <option class="items" <?=get_select('damageState','')?> value="<?=get_var('damageState',$row[0]->damageState)?>"><?=get_var('damageState',$row[0]->damageState)?></option>
                        <option class="items" <?=get_select('damageState','OK')?> value="OK">OK</option>
                        <option class="items" <?=get_select('damageState','D')?> value="D">D (Book is Damaged)</option>
                        <option class="items" <?=get_select('damageState','L')?> value="L">L (Lost)</option>
                        <option class="items" <?=get_select('damageState','W')?> value="W">W (Withdrawn)</option>
                        <option class="items" <?=get_select('damageState','TW')?> value="TW">TW (Temporarily Withdrawn)</option>
                        <option class="items" <?=get_select('damageState','TWA')?> value="TWA">TWA (Temporarily Withdrawn Archive)</option>
                        <option class="items" <?=get_select('damageState','NR')?> value="NR">NR (Not Returned)</option>
                        

                    </select><br><br>
                </div>

               
                </div>

                <div class="row">
                <div class="col-25">
                    <label for="">CallNo</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('CallNo',$row[0]->CallNo)?>" type="text" name="CallNo" placeholder="CallNo"><br><br>

                </div>

               
                </div>

                <div class="row">

                <a href="<?=ROOT?>/cataloging"><input type="submit" value="Save">

                <a class="cancel" href="<?=ROOT?>/cataloging">Cancel</a>
                   
            </form>
            </div>

        </div>
        </div>
  </div>

  <?php $this->view('includes/footer')?>
