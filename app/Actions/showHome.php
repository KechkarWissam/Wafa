<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;

class showHome
{
    use AsAction;

    public function handle()
    {
        return view('admin.layouts.master')
            ->with([
                'page_title' => "Page d'accueil"
            ]);
    }
}
