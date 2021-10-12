<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<?php $this->view('includes/topbar')?>


<div class="home-content">
        <div class="overview-boxes">
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Books</div>
                    <div class="number">40,876</div>
                    <div class="indicator">
                        <i class='bx bx-up-arrow-alt'></i>
                        <span class="text">Up from yesterday</span>
                    </div>
                </div>
                <i class="fas fa-book cart"></i>
            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Members</div>
                    <div class="number">38,876</div>
                    <div class="indicator">
                        <i class='bx bx-up-arrow-alt'></i>
                        <span class="text">Up from yesterday</span>
                    </div>
                </div>
                <i class="fas fa-user cart two"></i>
            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Borrowed Books</div>
                    <div class="number">12,876</div>
                    <div class="indicator">
                        <i class='bx bx-up-arrow-alt'></i>
                        <span class="text">Up from yesterday</span>
                    </div>
                </div>
                <i class="fas fa-book-reader cart three"></i>

            </div>
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Return Books</div>
                    <div class="number">11,086</div>
                    <div class="indicator">
                        <i class='bx bx-down-arrow-alt down'></i>
                        <span class="text">Down From Today</span>
                    </div>
                </div>
                <i class="fas fa-undo-alt cart four"></i>
            </div>
        </div>

        <div class="content-box">
            <div class="box1 box">
                <div class="title">Recent Borrow Details</div>
                <div class="details">
                    <ul class="details1">
                        <li class="topic">Date</li>
                        <li><a href="#">02 Jan 2021</a></li>
                        <li><a href="#">02 Jan 2021</a></li>
                        <li><a href="#">02 Jan 2021</a></li>
                  
                    </ul>
                    <ul class="details1">
                        <li class="topic">Member</li>
                        <li><a href="#">Alex Doe</a></li>
                        <li><a href="#">David Mart</a></li>
                        <li><a href="#">Roe Parter</a></li>
                     
                    </ul>
                    <ul class="details1">
                        <li class="topic">Type</li>
                        <li><a href="#">Book</a></li>
                        <li><a href="#">Thesis</a></li>
                        <li><a href="#">Research Paper</a></li>
                     
                    </ul>
                    <ul class="details1">
                        <li class="topic">Total Books</li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">5</a></li>
                       
                    </ul>
                </div>
                <div class="button">
                    <a href="#">See All</a>
                </div>
            </div>
            <div class="box2 box">
                <div class="title">Top Book Categories</div>
                <ul class="details2">
                    <li>
                        <a href="#">
                            <span class="category">Computer Science</span>
                        </a>
                        <span class="quan">1107</span>
                    </li>
                    <li>
                        <a href="#">
                            <span class="category">Information Technology </span>
                        </a>
                        <span class="quan">1567</span>
                    </li>
                    <li>
                        <a href="#">
                            <span class="category">DataBase</span>
                        </a>
                        <span class="quan">1234</span>

                </ul>
            </div>
        </div>
    </div>
</section>




<?php $this->view('includes/footer')?>

