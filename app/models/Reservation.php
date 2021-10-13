<?php

class Reservation extends Model
{
    protected $allowedColumns = [
        'reservation_id',
        'book_id',
        'member_id',
        'reserved_date',
        'expire_date',
       
    ];




    
}