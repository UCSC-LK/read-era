<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus'></i>
        <span class="logo_name">ReadEra</span>
    </div>
    <ul class="nav-links">
        <?php if(Auth::rank() == "Librarian" || Auth::rank() == "Library Staff"):?>

            <li>
                <a href="<?=ROOT?>/home" <?=($this->controller_name() == 'Home') ? 'class="active" ':''?>>
                    <i class="fas fa-border-all"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
        <?php else:?>
            <li>
            <a href="<?=ROOT?>/memberhome" <?=($this->controller_name() == 'MemberHome') ? 'class="active" ':''?>>
                <i class="fas fa-border-all"></i>
                <span class="links_name">Dashboard</span>
            </a>
            </li>
        <?php endif;?>

        <li>
            <a href="<?=ROOT?>/profile" <?=($this->controller_name() == 'Profile') ? 'class="active" ':''?>>
                <i class="fas fa-user-circle"></i>
                <span class="links_name">User Profile</span>
            </a>
        </li>
        <li>
            <a href="<?=ROOT?>/opac" <?=($this->controller_name() == 'Opac') ? 'class="active" ':''?>>
                <i class="fas fa-search"></i>
                <span class="links_name">OPAC</span>
            </a>
        </li>
        <?php if(Auth::rank() == "Librarian" || Auth::rank() == "Library Staff"):?>
        <li>
            <a href="<?=ROOT?>/administration" <?=($this->controller_name() == 'Administration') ? 'class="active" ':''?>>
                <i class="fas fa-user-cog"></i>
                <span class="links_name">Administration</span>
            </a>
        </li>
        <li>
            <a href="<?=ROOT?>/catalogs" <?=($this->controller_name() == 'Catalogs') ? 'class="active" ':''?>>
                <i class="fas fa-swatchbook"></i>
                <span class="links_name">Catalog</span>
            </a>
        </li>
        <li>
            <a href="<?=ROOT?>/patrons" <?=($this->controller_name() == 'Patrons') ? 'class="active" ':''?>>
                <i class="fas fa-users"></i>
                <span class="links_name">Patrons</span>
            </a>
        </li>
        <li>
            <a href="<?=ROOT?>/reports" <?=($this->controller_name() == 'Reports') ? 'class="active" ':''?>>
                <i class="fas fa-file-alt"></i>
                <span class="links_name">Reports</span>
            </a>
        </li>
        <li>
            <a href="<?=ROOT?>/circulations" <?=($this->controller_name() == 'Circulations') ? 'class="active" ':''?>>
                <i class="fas fa-cog"></i>
                <span class="links_name">Circulation</span>
            </a>
        </li>
        <?php endif;?>
         <li>
            <a href="<?=ROOT?>/calenders" <?=($this->controller_name() == 'Calenders') ? 'class="active" ':''?>>
                <i class="fas fa-calendar"></i>
                <span class="links_name">Calender</span>
            </a>
        </li>
       
        
        <li class="log_out">
            <a href="<?=ROOT?>/logout">
                <i class="fas fa-sign-out-alt"></i>
                <span class="links_name">Log out</span>
            </a>
        </li>
    </ul>
</div>