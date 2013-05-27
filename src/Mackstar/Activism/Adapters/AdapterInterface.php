<?php

namespace Mackstar\Activism\Adapters;

interface AdapterInterface
{
    public function read();
    
    public function write();
    
    public function remove();
    
    public function update();
}
