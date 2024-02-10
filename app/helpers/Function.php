<?php
function message($type,$message)
{
    session()->flash('type',$type);
    session()->flash('message',$message);
}
