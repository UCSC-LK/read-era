<?php

class items
{
    // table fields
    public $id;
    public $ISBN;
    public $Call_No;
    public $Language_Code;
    public $Title;
    public $Sub_Title;
    public $Satament_of_Responsibility;
    public $Edition;
    public $Place_of_Publication;
    public $Name_of_Publisher;
    public $Year_of_Publication;
    public $Physical_Description;
    public $Series;
    public $General_Code;
    public $Subject;
    public $URL;
    public $Added_Entry;
    public $Status;


    // message string
    public $id_msg;
    public $ISBN_msg;
    public $Call_No_msg;
    public $Language_Code_msg;
    public $Title_msg;
    public $Sub_Title_msg;
    public $Satament_of_Responsibility_msg;
    public $Edition_msg;
    public $Place_of_Publication_msg;
    public $Name_of_Publisher_msg;
    public $Year_of_Publication_msg;
    public $Physical_Description_msg;
    public $Series_msg;
    public $General_Code_msg;
    public $Subject_msg;
    public $URL_msg;
    public $Added_Entry_msg;
    public $Status_msg;


    // constructor set default value
    function __construct()
    {
        $id=$Call_No=$Year_of_Publication=0;
        $ISBN=$Language_Code=$Title=$Sub_Title=$Satament_of_Responsibility=$Edition=$Place_of_Publication=$Name_of_Publisher=$Physical_Description=$Series=$General_Code=$Subject=$URL=$Added_Entry=$Status="";
        $id_msg=$ISBN_msg=$Call_No_msg=$Language_Code_msg=$Title_msg=$Sub_Title_msg=$Satament_of_Responsibility_msg=$Edition_msg=$Place_of_Publication_msg=$Name_of_Publisher_msg=$Year_of_Publication_msg=$Physical_Description_msg=$Series_msg=$General_Code_msg=$Subject_msg=$URL_msg=$Added_Entry_msg=$Status_msg="";
    }
}

?>