<?php

class Circulation extends Model
{
    protected $allowedColumns = [
        'circulation_id',
        'book_id',
        'member_id',
        'issue_date',
        'deadline',
        'returned_date',
        'fine',
       
    ];




    
}