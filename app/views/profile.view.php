<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<section class="home-section">
    <nav>
        <div class="sidebar-button">
            <!--<i class='bx bx-menu sidebarBtn'></i>-->
            <i class="fas fa-align-justify sidebarBtn "></i>
        </div>
       
        <div class="profile-details">
            <?php if($row):?>

                <?php
                    $image=get_image($row->image,$row->gender);
                    $_SESSION['new'] = $image;

                ?>
            <img src="<?=$image?>">
            <span class="admin_name"><?=Auth::getFirstname()?></span>

            <!--<i class='bx bx-chevron-down' ></i>-->
        </div>
    </nav>



<div class="home-content">
        

        <div class="content-box">
            <div class="box1 box">
                <div class="header">
                    <div class="title">Profile</div>
                    
                </div>
                
              
                  

                <div class="profile_content">

                    <div class="abcd">
                        <img class="user_img" src="<?=$image?>">
                        <div class="profile_name"><?=$row->firstname?> <?=$row->lastname?></div>
                    </div>
                    <table class="profile_table">
                
                    

                
                        <tr>
                            <th>First Name: </th>
                            <td><?=$row->firstname?></td>
                        </tr>
                        <tr>
                            <th>Last Name: </th>
                            <td><?=$row->lastname?></td>
                        </tr>
                        <tr>
                            <th>Email: </th>
                            <td><?=$row->email?></td>
                        </tr>

                        <tr>
                            <th>Gender: </th>
                            <td><?=$row->gender?></td>
                        </tr>
                        <tr>
                            <th>Rank: </th>
                            <td><?=$row->rank?></td>
                        </tr>
                        <tr>
                            <th>Date: </th>
                            <td><?=$row->date?></td>
                        </tr>
        
                       
                    
                </body>
            </table>
            


            </div>


            <a href="<?=ROOT?>/profile/edit" class="update_profile_button">Update</a>
            <?php else:?>
                <h3>That profile not found</h3>
            <?php endif;?>

               

               
                
                
            
            </div>
            
        </div>
    </div>
</section>




<?php $this->view('includes/footer')?>