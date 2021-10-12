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
        'Status',
        'date',
       
    ];

    
   

    //protected $table = 'users';
    public function validate($DATA)
    {
        $this->errors=array();
        if(empty($DATA['ISBN']) || !preg_match('/^[a-zA-Z]+$/', $DATA['ISBN']))
        {
            $this->errors['ISBN'] = "Only letters allowed in ISBN";
        }

        if(empty($DATA['CallNo']) || !preg_match('/^[0-9]+$/', $DATA['CallNo']))
        {
            $this->errors['CallNo'] = "Only Numbers allowed in CallNo";
        }

        if(empty($DATA['LanguageCode']) || !preg_match('/^[a-zA-Z]+$/', $DATA['LanguageCode']))
        {
            $this->errors['LanguageCode'] = "Only letters allowed in LanguageCode";
        }

        if(empty($DATA['Author']) || !preg_match('/^[a-zA-Z]+$/', $DATA['Author']))
        {
            $this->errors['Author'] = "Only letters allowed in Author";
        }

        if(empty($DATA['Title']) || !preg_match('/^[a-zA-Z]+$/', $DATA['Title']))
        {
            $this->errors['Title'] = "Only letters allowed in Title";
        }

        if(empty($DATA['SubTitle']) || !preg_match('/^[a-zA-Z]+$/', $DATA['SubTitle']))
        {
            $this->errors['SubTitle'] = "Only letters allowed in SubTitle";
        }

        if(empty($DATA['StatementOfResposiblity']) || !preg_match('/^[a-zA-Z]+$/', $DATA['StatementOfResposiblity']))
        {
            $this->errors['StatementOfResposiblity'] = "Only letters allowed in StatementOfResposiblity";
        }

        if(empty($DATA['Edition']) || !preg_match('/^[a-zA-Z]+$/', $DATA['Edition']))
        {
            $this->errors['Edition'] = "Only letters allowed in Edition";
        }

        if(empty($DATA['PlaceOfPublication']) || !preg_match('/^[a-zA-Z]+$/', $DATA['PlaceOfPublication']))
        {
            $this->errors['PlaceOfPublication'] = "Only letters allowed in PlaceOfPublication";
        }

        if(empty($DATA['NameOfPublisher']) || !preg_match('/^[a-zA-Z]+$/', $DATA['NameOfPublisher']))
        {
            $this->errors['NameOfPublisher'] = "Only letters allowed in NameOfPublisher";
        }

        if(empty($DATA['YearOfPublication']) || !preg_match('/^[0-9]+$/', $DATA['YearOfPublication']))
        {
            $this->errors['YearOfPublication'] = "Only letters allowed in YearOfPublication";
        }

        if(empty($DATA['PhysicalDescription']) || !preg_match('/^[a-zA-Z]+$/', $DATA['PhysicalDescription']))
        {
            $this->errors['PhysicalDescription'] = "Only letters allowed in PhysicalDescription";
        }

        if(empty($DATA['Series']) || !preg_match('/^[a-zA-Z]+$/', $DATA['Series']))
        {
            $this->errors['Series'] = "Only letters allowed in Series";
        }

        if(empty($DATA['GeneralNote']) || !preg_match('/^[a-zA-Z]+$/', $DATA['GeneralNote']))
        {
            $this->errors['GeneralNote'] = "Only letters allowed in GeneralNote";
        }

        if(empty($DATA['Subject']) || !preg_match('/^[a-zA-Z]+$/', $DATA['Subject']))
        {
            $this->errors['Subject'] = "Only letters allowed in Subject";
        }

        if(empty($DATA['URL']) || !preg_match('/^[a-zA-Z]+$/', $DATA['URL']))
        {
            $this->errors['URL'] = "Only letters allowed in URL";
        }

        if(empty($DATA['AddedEntry']) || !preg_match('/^[a-zA-Z]+$/', $DATA['AddedEntry']))
        {
            $this->errors['AddedEntry'] = "Only letters allowed in AddedEntry";
        }

        if(empty($DATA['Status']) || !preg_match('/^[a-zA-Z]+$/', $DATA['Status']))
        {
            $this->errors['Status'] = "Only letters allowed in Status";
        }

    


      

        if(count($this->errors) == 0)
        {
            return true;
        }
        return false;
    }


    
}