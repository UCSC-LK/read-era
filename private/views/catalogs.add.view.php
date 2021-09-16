<?php $this->view('includes/header')?>

<?php $this->view('includes/nav')?>
<?php $this->view('includes/topbar')?>






<div class="home-content">

    <div class="content-box">
        <div class="box1 box">

            <h2 class="title">Add New item</h2>

            <div class="container">

            <form method="post">
                <?php if(count($errors) > 0):?>
                <div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
                    <strong>Errors</strong>
                    <?php foreach($errors as $error):?>
                        <br><?=$error?>
                    <?php endforeach;?>
                    
                </div>
                    <br><br>
                <?php endif;?>

                <div class="row">
                <div class="col-25">
                    <label for="fname">ISBN</label>
                </div>
                <div class="col-75">
                    <input autofocus class="form-control" value="<?=get_var('ISBN')?>" type="text" name="ISBN" placeholder="ISBN"><br><br>



                </div>
                <div class="col-25">
                    <label for="">CallNo</label>
                </div>
                <div class="col-75">
                    <input autofocus class="form-control" value="<?=get_var('CallNo')?>" type="text" name="CallNo" placeholder="CallNo"><br><br>

                </div>
                </div>

                <div class="row">
                <div class="col-25">
                    <label for="fname">LanguageCode</label>
                </div>
                <div class="col-75">
                    <input autofocus class="form-control" value="<?=get_var('LanguageCode')?>" type="text" name="LanguageCode" placeholder="LanguageCode"><br><br>
                </div>
                <div class="col-25">
                    <label for="">Author</label>
                </div>
                <div class="col-75">
                  <input autofocus class="form-control" value="<?=get_var('Author')?>" type="text" name="Author" placeholder="Author"><br><br>
                </div>
                </div>


                <div class="row">
                <div class="col-25">
                    <label for="lname">Title</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('Title')?>" type="text" name="Title" placeholder="Title"><br><br>
                </div>

                <div class="col-25">
                    <label for="">Sub Title</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('SubTitle')?>" type="text" name="SubTitle" placeholder="SubTitle"><br><br>
                </div>
                </div>



                <div class="row">
                <div class="col-25">
                    <label for="">Edition</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('Edition')?>" type="text" name="Edition" placeholder="Edition"><br><br>

                </div>

                <div class="col-25">
                    <label for="">Name of Publication</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('NameOfPublisher')?>" type="text" name="NameOfPublisher" placeholder="NameOfPublisher"><br><br>

                </div>
                </div>

                <div class="row">
                <div class="col-25">
                    <label for="">Place of Publication</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('PlaceOfPublication')?>" type="text" name="PlaceOfPublication" placeholder="PlaceOfPublication"><br><br>
                </div>

                <div class="col-25">
                    <label for="">Year of Publication</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('YearOfPublication')?>" type="text" name="YearOfPublication" placeholder="YearOfPublication"><br><br>

                </div>
                </div>

                <div class="row">
                <div class="col-25">
                    <label for="">Series</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('Series')?>" type="text" name="Series" placeholder="Series"><br><br>

                </div>

                <div class="col-25">
                    <label for="">General Code</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('GeneralNote')?>" type="text" name="GeneralNote" placeholder="GeneralNote"><br><br>


                </div>
                </div>

                <div class="row">
                <div class="col-25">
                    <label for="">Subject</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('Subject')?>" type="text" name="Subject" placeholder="Subject"><br><br>

            </div>

                <div class="col-25">
                    <label for="">URL</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('URL')?>" type="text" name="URL" placeholder="URL"><br><br>


                </div>
                </div>

                <div class="row">
                <div class="col-25">
                    <label for="">Added Entry</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('AddedEntry')?>" type="text" name="AddedEntry" placeholder="AddedEntry"><br><br>

                </div>

                <div class="col-25">
                    <label for="">Status</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('Status')?>" type="text" name="Status" placeholder="Status"><br><br>

                </div>
                </div>

                <div class="row">
                <div class="col-25">
                    <label for="subject">Statement of Responsibility</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('StatementOfResposiblity')?>" type="text" name="StatementOfResposiblity" placeholder="StatementOfResposiblity"><br><br>

            </div>

                <div class="col-25">
                    <label for="subject1">Physical Description</label>
                </div>
                <div class="col-75">
                <input autofocus class="form-control" value="<?=get_var('PhysicalDescription')?>" type="text" name="PhysicalDescription" placeholder="PhysicalDescription"><br><br>

                </div>
                </div>

                <div class="row">

                <a href="<?=ROOT?>/catalogs"><input type="submit" value="Add">

                <a class="cancel" href="<?=ROOT?>/catalogs">Cancel</a>

            </form>
            </div>

        </div>
        </div>
  </div>

  <?php $this->view('includes/footer')?>
