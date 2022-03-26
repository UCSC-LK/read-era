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
                    <div class="title">Check In Details</div>
                    <div>
                        <input type="button" id="scan-btn" class="scan_button" value="Scan"/>
                        <a class="add-new-item1" href="<?=ROOT?>/circulations/show_reservations">Reservations</a>
                        <a class="add-new-item1" href="<?=ROOT?>/circulations/add"><i class="fa fa-plus"></i> Check In</a>

                
                    </div>
                </div>
                <form class="search-form">
                            
                            <button id="circulationnicid"><i class="fa fa-search"></i></button>
                            <input name="find" id="circulationresult" value="<?=isset($_GET['find'])?$_GET['find']:'';?>" type="text" placeholder="search">

                </form>
                
                <div id="camera"></div>
             
                <?php if($rows):?>
                <table class="table table-striped table-hover">
                    <colgroup>
                            <col span="1" style="width: 30%;">
                            <col span="1" style="width: 10%;">
                            <col span="1" style="width: 20%;">
                            <col span="1" style="width: 10%;">
                            <col span="1" style="width: 10%;">
                            <col span="1" style="width: 12%;">
                          

                        </colgroup>
                    <tr><th>Title</th><th>CopyID</th><th>Member</th><th>Issued date</th><th>Deadline</th><th>Actions</th>
                    </tr>
            
                        <?php foreach ($rows as $row):?>
                            <tr><td><?=$row->book_id?></td><td><?=$row->copy_id?></td><td><?=$row->member_id?></td><td><?=get_date($row->issue_date)?></td><td><?=get_date($row->deadline)?></td>
                            <td> 
                                <div class="circulation-btn">
                                <a class="return-btn" href="<?=ROOT?>/circulations/return/<?=$row->id?>">Return</a>
                                <a class="renew-btn" href="<?=ROOT?>/circulations/renew/<?=$row->id?>"></i>Renew</a>
                               </div>
                        </td>
                        </tr>
                        
                        
                    <?php endforeach;?>
                    <?php else:?>
                        <h4>No issues were found at this time</h4>
                    <?php endif;?>
                </table>

                
                <?php $pager->display()?>



                
            
            </div>
            
        </div>
    </div>
</section>

<script>
    let button = document.querySelector("#circulationnicid");

    var _scannerIsRunning = false;
        var sound = new Audio("https://localhost/readeracir/Read-era/public/assets/barcode.wav");

        function startScanner() {
        Quagga.init({
            inputStream: {
                name: "Live",
                type: "LiveStream",
                target: document.querySelector('#camera'),
                        
                },
            decoder: {
                readers: ["code_39_reader"]
            }
        }, function (err) {
            if (err) {
                console.log(err);
                return
            }
            console.log("Initialization finished. Ready to start");
            Quagga.start();

            _scannerIsRunning = true;

        });

        Quagga.onDetected(function (data) {
            sound.play();	
            console.log(data.codeResult.code);
            document.getElementById("circulationresult").value = data.codeResult.code;
            button.click();
        });

        }
        document.getElementById("scan-btn").addEventListener("click", function () {
            if (_scannerIsRunning) {
                Quagga.stop();
            } else {
                startScanner();
            }
        }, false);
</script>



<?php $this->view('includes/footer')?>
