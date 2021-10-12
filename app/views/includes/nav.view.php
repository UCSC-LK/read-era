<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus'></i>
        <span class="logo_name">ReadEra</span>
    </div>
    <ul class="nav-links">
     
        <li>
            <a href="<?=ROOT?>/home" class="active">
                <i class="fas fa-border-all"></i>
                <span class="links_name">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="<?=ROOT?>/profile">
                <i class="fas fa-user-circle"></i>
                <span class="links_name">User Profile</span>
            </a>
        </li>
        <li>
            <a href="<?=ROOT?>/opac">
                <i class="fas fa-search"></i>
                <span class="links_name">OPAC</span>
            </a>
        </li>
        <?php if(Auth::rank() == "librarian"):?>
        <li>
            <a href="<?=ROOT?>/administration">
                <i class="fas fa-user-cog"></i>
                <span class="links_name">Administration</span>
            </a>
        </li>
        <li>
            <a href="<?=ROOT?>/catalogs">
                <i class="fas fa-swatchbook"></i>
                <span class="links_name">Catalog</span>
            </a>
        </li>
        <li>
            <a href="<?=ROOT?>/patrons">
                <i class="fas fa-users"></i>
                <span class="links_name">Patrons</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-file-alt"></i>
                <span class="links_name">Reports</span>
            </a>
        </li>
        <li>
            <a href="<?=ROOT?>/circulations">
                <i class="fas fa-cog"></i>
                <span class="links_name">Circulation</span>
            </a>
        </li>
        <?php endif;?>

        <li>
            <a href="#">
                <i class="fas fa-house-user"></i>
                <span class="links_name">About Us</span>
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