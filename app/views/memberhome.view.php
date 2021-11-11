<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<?php $this->view('includes/topbar')?>


<div class="home-content">
        <div style="margin-left:18px;">Your progress</div>
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

        <div class="content-box">
            <div class="box1 box">
                <div class="title">Library policies</div><br>
                <div style="font-size: 17px;">Maximum Reservations : 2</div>
                <div style="font-size:17px;">Maximum Borrowings : 2</div>
                <div style="font-size:17px;">Borrow time period: 2 weeks</div>
                <div style="font-size:17px;">Reservation valid time period: 2 weeks</div>
                
            </div>
            <div class="box2 box">
                <div class="title">Top Book Categories</div>
                <ul class="details2">
                    <li>
                        <a href="#">
                            <span class="category">Datastructure</span>
                        </a>
                        <span class="quan"><?=$arr[3]?></span>
                    </li>
                    <li>
                        <a href="#">
                            <span class="category">Programming</span>
                        </a>
                        <span class="quan"><?=$arr[2]?></span>
                    </li>
                    <li>
                        <a href="#">
                            <span class="category">Database</span>
                        </a>
                        <span class="quan"><?=$arr[3]?></span>
                    <li>
                   
                    
                </ul>
            </div>
        </div>
    </div>
</section>




<?php $this->view('includes/footer')?>

