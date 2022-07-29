<section class="home-section">
    <nav>
        <div class="sidebar-button">
            <!--<i class='bx bx-menu sidebarBtn'></i>-->
            <i class="fas fa-align-justify sidebarBtn" style="color: #081d45;font-size: 35px;"></i>
        </div>
       
        <div class="profile-details">
               <?php
                  
                  $img = Auth::img();
                  if(isset($_SESSION['new']))
                  {
                    $image = $_SESSION['new'];
                  }
                  else{
                    $gender = Auth::gender();
                    $image=get_image($img,$gender);

                  }
                  
                
               ?>
            <img src="<?=$image?>">
            <span class="admin_name"><?=Auth::getFirstname()?> </span>

            <!--<i class='bx bx-chevron-down' ></i>-->
        </div>
    </nav>