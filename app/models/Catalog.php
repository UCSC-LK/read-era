<?php

class Catalog extends Model
{
    protected $allowedColumns = [
        'ISBN',
        'CallNo',
        'LanguageCode',
        'Author',
        'Title',
        'SubTitle',
        'StatementOfResposiblity',
        'Edition',
        'PlaceOfPublication',
        'NameOfPublisher',
        'YearOfPublication',
        'PhysicalDescription',
        'Series',
        'GeneralNote',
        'Subject',
        'URL',
        'AddedEntry',
        'Type',
        'Collection',
        'Status',
        'date',
       
    ];

    
   

    //protected $table = 'users';
    public function validate($DATA)
    {
        $this->errors=array();
        if(empty($DATA['ISBN']) || !preg_match('/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/', $DATA['ISBN']))
        {
            $this->errors['ISBN'] = "The Input given for ISBN is not valid";
        }

        if($this->where('ISBN',$DATA['ISBN']))
        {
            $this->errors['ISBN'] = "That ISBN is already in use";
        }

        if(empty($DATA['CallNo']) || !preg_match('/^[A-Za-z0-9]+( [A-Za-z0-9\s]+)*$/', $DATA['CallNo']))
        {
            $this->errors['CallNo'] = "The Input given for CallNo is not valid";
        }

        $langcodes = ['eng','snh','tam'];
        if(empty($DATA['LanguageCode']) || !in_array($DATA['LanguageCode'], $langcodes))
        {
            $this->errors['LanguageCode'] = "The Input given for Language Code is not valid";
        }

        

        if(empty($DATA['Author']) || !preg_match('/^[a-zA-Z]+([a-zA-Z\s,.?]+)*$/', $DATA['Author']))
        {
            $this->errors['Author'] = "The Input given for Author is not valid";
        }

        if(empty($DATA['Title']) || !preg_match("/^[a-zA-Z0-9]+([a-zA-Z0-9\s,.;&!-:()'?]+)*$/", $DATA['Title']))
        {
            $this->errors['Title'] = "The Input given for Title is not valid";
        }

        if(empty($DATA['SubTitle']) || !preg_match("/^[a-zA-Z0-9]+([a-zA-Z0-9\s,.;&!-:()'?]+)*$/", $DATA['SubTitle']))
        {
            $this->errors['SubTitle'] = "The Input given for Subtitle is not valid";
        }

        if(empty($DATA['StatementOfResposiblity']) || !preg_match('/^[A-Za-z0-9]+( [A-Za-z0-9\s,-=.?]+)*$/', $DATA['StatementOfResposiblity']))
        {
            $this->errors['StatementOfResposiblity'] = "The Input given for Statement of Resposiblity is not valid";
        }

        if(empty($DATA['Edition']) || !preg_match('/^[A-Za-z0-9]+( [A-Za-z0-9\s]+)*$/', $DATA['Edition']))
        {
            $this->errors['Edition'] = "The Input given for Edition is not valid";
        }

        if(empty($DATA['PlaceOfPublication']) || !preg_match('/^[A-Za-z]+( [A-Za-z\s]+)*$/', $DATA['PlaceOfPublication']))
        {
            $this->errors['PlaceOfPublication'] = "The Input given for Place of Publication is not valid";
        }

        if(empty($DATA['NameOfPublisher']) || !preg_match('/^[A-Za-z]+( [A-Za-z\s]+)*$/', $DATA['NameOfPublisher']))
        {
            $this->errors['NameOfPublisher'] = "The Input given for Name Of Publisher is not valid";
        }

        if(empty($DATA['YearOfPublication']) || !preg_match('/^[0-9]+$/', $DATA['YearOfPublication']))
        {
            $this->errors['YearOfPublication'] = "The Input given for Year Of Publication is not valid";
        }

        if(empty($DATA['PhysicalDescription']) || !preg_match('/^[a-zA-Z0-9]+([a-zA-Z0-9\s,.;:-=()?]+)*$/', $DATA['PhysicalDescription']))
        {
            $this->errors['PhysicalDescription'] = "The Input given for Physical Description is not valid";
        }

        if(empty($DATA['Series']) || !preg_match('/^[A-Za-z0-9]+( [A-Za-z0-9\s]+)*$/', $DATA['Series']))
        {
            $this->errors['Series'] = "The Input given for Series is not valid";
        }

        if(empty($DATA['GeneralNote']) || !preg_match('/^[a-zA-Z0-9]+([a-zA-Z0-9\s,.;:()-=?]+)*$/', $DATA['GeneralNote']))
        {
            $this->errors['GeneralNote'] = "The Input given for General Note is not valid";
        }

        if(empty($DATA['Subject']) || !preg_match('/^[A-Za-z0-9]+( [A-Za-z0-9\s]+)*$/', $DATA['Subject']))
        {
            $this->errors['Subject'] = "The Input given for Subject is not valid";
        }

        if(empty($DATA['URL']) || !preg_match('%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i', $DATA['URL']))
        {
            $this->errors['URL'] = "The Input given for URL is not valid";
        }

        if(empty($DATA['AddedEntry']) || !preg_match('/^[a-zA-Z0-9]+([a-zA-Z0-9\s,.-=;:()?]+)*$/', $DATA['AddedEntry']))
        {
            $this->errors['AddedEntry'] = "The Input given for Added Entry is not valid";
        }

        if(empty($DATA['Status']) || !preg_match('/^[A-Za-z]+( [A-Za-z\s]+)*$/', $DATA['Status']))
        {
            $this->errors['Status'] = "The Input given for Status is not valid";
        }

    


      

        if(count($this->errors) == 0)
        {
            return true;
        }
        return false;
    }

    public function validate2($DATA)
    {
        $this->errors=array();
        if(empty($DATA['ISBN']) || !preg_match('/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/', $DATA['ISBN']))
        {
            $this->errors['ISBN'] = "The Input given for ISBN is not valid";
        }

       

        if(empty($DATA['CallNo']) || !preg_match('/^[A-Za-z0-9]+( [A-Za-z0-9\s]+)*$/', $DATA['CallNo']))
        {
            $this->errors['CallNo'] = "The Input given for CallNo is not valid";
        }

        $langcodes = ['eng','snh','tam'];
        if(empty($DATA['LanguageCode']) || !in_array($DATA['LanguageCode'], $langcodes))
        {
            $this->errors['LanguageCode'] = "The Input given for Language Code is not valid";
        }
        // if(empty($DATA['LanguageCode']) || !preg_match('/^[0-9]*$/', $DATA['LanguageCode']))
        // {
        //     $this->errors['LanguageCode'] = "The Input given for LanguageCode is not valid";
        // }

        if(empty($DATA['Author']) || !preg_match('/^[a-zA-Z]+([a-zA-Z\s,.?]+)*$/', $DATA['Author']))
        {
            $this->errors['Author'] = "The Input given for Author is not valid";
        }

        if(empty($DATA['Title']) || !preg_match("/^[a-zA-Z0-9]+([a-zA-Z0-9\s,.;&!-:()'?]+)*$/", $DATA['Title']))
        {
            $this->errors['Title'] = "The Input given for Title is not valid";
        }

        if(empty($DATA['SubTitle']) || !preg_match("/^[a-zA-Z0-9]+([a-zA-Z0-9\s,.;&!-:()'?]+)*$/", $DATA['SubTitle']))
        {
            $this->errors['SubTitle'] = "The Input given for Subtitle is not valid";
        }

        if(empty($DATA['StatementOfResposiblity']) || !preg_match('/^[A-Za-z0-9]+( [A-Za-z0-9\s,-=.?]+)*$/', $DATA['StatementOfResposiblity']))
        {
            $this->errors['StatementOfResposiblity'] = "The Input given for Statement of Resposiblity is not valid";
        }

        if(empty($DATA['Edition']) || !preg_match('/^[A-Za-z0-9]+( [A-Za-z0-9\s]+)*$/', $DATA['Edition']))
        {
            $this->errors['Edition'] = "The Input given for Edition is not valid";
        }

        if(empty($DATA['PlaceOfPublication']) || !preg_match('/^[A-Za-z]+( [A-Za-z\s]+)*$/', $DATA['PlaceOfPublication']))
        {
            $this->errors['PlaceOfPublication'] = "The Input given for Place of Publication is not valid";
        }

        if(empty($DATA['NameOfPublisher']) || !preg_match('/^[A-Za-z]+( [A-Za-z\s]+)*$/', $DATA['NameOfPublisher']))
        {
            $this->errors['NameOfPublisher'] = "The Input given for Name Of Publisher is not valid";
        }

        if(empty($DATA['YearOfPublication']) || !preg_match('/^[0-9]+$/', $DATA['YearOfPublication']))
        {
            $this->errors['YearOfPublication'] = "The Input given for Year Of Publication is not valid";
        }

        if(empty($DATA['PhysicalDescription']) || !preg_match('/^[a-zA-Z0-9]+([a-zA-Z0-9\s,.;:-=()?]+)*$/', $DATA['PhysicalDescription']))
        {
            $this->errors['PhysicalDescription'] = "The Input given for Physical Description is not valid";
        }

        if(empty($DATA['Series']) || !preg_match('/^[A-Za-z0-9]+( [A-Za-z0-9\s]+)*$/', $DATA['Series']))
        {
            $this->errors['Series'] = "The Input given for Series is not valid";
        }

        if(empty($DATA['GeneralNote']) || !preg_match('/^[a-zA-Z0-9]+([a-zA-Z0-9\s,.;:()-=?]+)*$/', $DATA['GeneralNote']))
        {
            $this->errors['GeneralNote'] = "The Input given for General Note is not valid";
        }

        if(empty($DATA['Subject']) || !preg_match('/^[A-Za-z0-9]+( [A-Za-z0-9\s]+)*$/', $DATA['Subject']))
        {
            $this->errors['Subject'] = "The Input given for Subject is not valid";
        }

        if(empty($DATA['URL']) || !preg_match('%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i', $DATA['URL']))
        {
            $this->errors['URL'] = "The Input given for URL is not valid";
        }

        if(empty($DATA['AddedEntry']) || !preg_match('/^[a-zA-Z0-9]+([a-zA-Z0-9\s,.;-=:()?]+)*$/', $DATA['AddedEntry']))
        {
            $this->errors['AddedEntry'] = "The Input given for Added Entry is not valid";
        }

        if(empty($DATA['Status']) || !preg_match('/^[A-Za-z]+( [A-Za-z\s]+)*$/', $DATA['Status']))
        {
            $this->errors['Status'] = "The Input given for Status is not valid";
        }

    


      

        if(count($this->errors) == 0)
        {
            return true;
        }
        return false;
    }


    
}