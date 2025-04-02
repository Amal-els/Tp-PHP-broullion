<?php
class User 
{
    public function __construct(private int $id,private string $username,private string $email,private string $role){}
    
}