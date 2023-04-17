<?php
declare(strict_types=1);

class Bestelling{
    private int $id;
    private string $user;
    private string $broodje;


    public function __construct(int $id, string $user, string $broodje){
        $this->id = $id;
        $this->user = $user;
        $this->broodje = $broodje;
      
    }

    public function getId() : int{
        return $this->id;
    }

    public function getUser() : string{
        return $this->user;
    }

    public function getBroodje() : string{
        return $this->broodje;
    }

}
