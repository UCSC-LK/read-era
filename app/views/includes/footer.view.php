<script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
        sidebar.classList.toggle("active");
        if(sidebar.classList.contains("active")){
            sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
        }else
            sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
</script>

<script>


function display_image_name(file_name){
    document.querySelector(".file_info").innerHTML = file_name;
}
</script>


<script>
    function loading(){
        document.getElementById('laodingpopup').style.display='';
        document.getElementById('submitbutton').disabled = true;
    }
</script>

</body>
</html>