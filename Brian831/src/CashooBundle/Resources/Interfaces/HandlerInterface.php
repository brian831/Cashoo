<?php

namespace Brian831\CashooBundle\Resources\Interfaces;

interface HandlerInterface {
    
    
    public function exists($index);
    
    public function getCreatedAt($index);
    
    public function getContent($index);
    
    public function setContent($index,$content);
    
    public function delete($index);
    
}