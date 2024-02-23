<?php

namespace App\Traits;

trait FetchCompanyData
{
    public function getCompanyData()
    {
        $user = auth()->user();
        if ($user && $user->company) {
            return $user->company;
        }
        return null;
    }
}
