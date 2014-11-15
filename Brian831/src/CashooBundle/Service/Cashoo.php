<?php

namespace Brian831\CashooBundle\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Cashoo{
    
    protected $dirname;

    public function __construct(ContainerInterface $container) {
        $base = $container->getParameter("kenerl.cache_dir");
        $this->setDir($base);
    }
    
    public function isCached(Request $request){
        return (file_exists($this->getFilename($request)));
    }
    
    public function setContent(Request $request, Response $response){
        $content = serialize($response);
        file_put_contents($this->getFilename($request), $content);
    }
    
    public function getContent(Request $request){
        return file_get_contents($this->getFilename($request));
    }
    
    protected function getFilename(Request $request){
        $index = serialize($request);
        $filename = $this->dirname . $index;
        return $filename;
    }
    
    protected function setDir($base){
        $dirname = $base . 'cashoo';
        if(!is_dir($dirname)){
            mkdir($dirname);
        }
        $this->dirname = $dirname;
    }
    
}