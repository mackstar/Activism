<?php

namespace Mackstar\Activism\Adapters;

interface AdapterInterface
{
    public function read($array);
    
    public function write($array);
    
    public function remove($array);
    
    public function update($array);
}
