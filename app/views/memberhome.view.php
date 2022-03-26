<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<?php $this->view('includes/topbar')?>


<div class="home-content">
        <div style="margin-left:18px;font-size:20px;">Your progress</div>
        <div class="overview-boxes">
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Reserved books</div>
                    <div class="number"><?=$arr[0]?></div>
                   
                </div>
                <i class="fas fa-book cart"></i>
            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Borrowed books</div>
                    <div class="number"><?=$arr[1]?></div>
                    
                </div>
                <i class="fas fa-book cart two"></i>
            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Overdue Books</div>
                    <div class="number">0</div>
                    
                </div>
                <i class="fas fa-book-reader cart three"></i>

            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Fine Remaining</div>
                    <div class="number">0</div>
                   
                </div>
                <i class="fas fa-book-reader cart three"></i>

            </div>
            
        </div>

        <div class="content-boxx">
            <div class="box1x box">
                <div class="titlex">Library Policies</div><br>
                <div class="policy-details">Maximum Reservations : <?=$arr[8]?></div>
                <div class="policy-details">Maximum Borrowings : <?=$arr[7]?></div>
                <div class="policy-details">Borrow Time Period: <?=$arr[5]?> days</div>
                <div class="policy-details">Reservation Time Period: <?=$arr[6]?> days</div>
                
            </div>
            <div class="box2x box">
                <div class="titlex">Top Book Categories</div>
                <ul class="details2x">
                    <li>
                        <a href="#">
                            <span class="categoryx">Datastructure</span>
                        </a>
                        <span class="quan"><?=$arr[3]?></span>
                    </li>
                    
                    <li>
                        <a href="#">
                            <span class="categoryx">Programming</span>
                        </a>
                        <span class="quan"><?=$arr[2]?></span>
                    </li>
                    <li>
                        <a href="#">
                            <span class="categoryx">Database</span>
                        </a>
                        <span class="quan"><?=$arr[3]?></span>
                    <li>
                  
                   
                    
                </ul>
            </div>
        </div>
    </div>
</section>




<?php $this->view('includes/footer')?>

