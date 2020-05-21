<?php

namespace App\Http\Controllers\Traits;

trait Footer
{
    public function getFooter()
    {
        return (object) [
            'copyright' => '&copy; Croustille',
        ];
    }
}
