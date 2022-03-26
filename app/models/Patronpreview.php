<?php

class Patronpreview extends Model
{
    protected $allowedColumns = [
        'firstname',
        'lastname',
        'email',
        'password',
        'gender',
        'rank',
        'date',
        'image',
        'address',
        'nic',
        'phone_num',
        'borrowed_books',
        'reserved_books',
    ];

}