<?php

if(!function_exists('storeFile')){
    /**
     * Store file in the uploads disk;
     */
    function storeFile($fileInputName, $path)
    {
        $file = request()->$fileInputName;
        $name = time() .'_'. $file->getClientOriginalName();
        $file->storeAs($path, $name, 'uploads');
        return $name;
    }
}

if(!function_exists('success')){
    /**
     * Flash a success message with session;
     */
    function success($message)
    {
        return session()->flash('success', $message);
    }
}

if(!function_exists('warning')){
    /**
     * Flash a warning message with session;
     */
    function warning($message)
    {
        return session()->flash('warning', $message);
    }
}

if(!function_exists('error')){
    /**
     * Flash a error message with session;
     */
    function error($message)
    {
        return session()->flash('error', $message);
    }
}

if(!function_exists('setActiveClass')){
    /**
     * Set active class for sidebar list items.
     */
    function setActiveClass($route)
    {
        return request()->routeIs($route) ? 'active open' : '';
    }
}