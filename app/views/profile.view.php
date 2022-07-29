<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<section class="home-section">
    <nav>
        <div class="sidebar-button">
            <!--<i class='bx bx-menu sidebarBtn'></i>-->
            <i class="fas fa-align-justify sidebarBtn" style="color: #081d45;font-size: 35px;"></i>
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
                    <div class="title">Profile Details</div>
                    
                    
                </div>
                <?php if($_SESSION['success'] == 19):?>
                <div id="display-success" style="width: 100%;border: 1px solid #D8D8D8;padding: 10px;border-radius: 5px;font-family: Arial;font-size: 11px;text-transform: uppercase;background-color: rgb(236, 255, 216);color: green;text-align: center;margin-top: 10px;">Profile updated Successfully</div>
                <br>
                <?php endif?>
                
              
                  

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
                            <th>NIC: </th>
                            <td><?=$row->nic?></td>
                        </tr>

                        <tr>
                            <th>Gender: </th>
                            <td><?=$row->gender?></td>
                        </tr>
                        <tr>
                            <th>Category: </th>
                            <td><?=$row->rank?></td>
                        </tr>
                        <tr>
                            <th>Phone Number: </th>
                            <td><?=$row->phone_num?></td>
                        </tr>
        
                       
                    
                </body>
            </table>
            


            </div>


            <a href="<?=ROOT?>/profile/edit" class="update_profile_button">Update</a>
            <a href="<?=ROOT?>/profile/progress" class="update_profile_button">Check My Activities</a>

            <?php else:?>
                <h3>That profile not found</h3>
            <?php endif;?>

               

               
                
                
            
            </div>
            
        </div>
    </div>
</section>




<?php $this->view('includes/footer')?>