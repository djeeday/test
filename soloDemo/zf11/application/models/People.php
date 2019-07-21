<?php
class Application_Model_People
{
    private $people = 'Some people';
    
    public function getPeople(){
        return $this->people;
    }
}