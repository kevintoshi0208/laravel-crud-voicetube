<?php

namespace App\Providers;

use App\Models\TodoList;
use App\Models\TodoListAttachment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        TodoList::creating([$this,'saveCreatedUser']);
        TodoListAttachment::creating([$this,'saveCreatedUser']);
    }

    public function saveCreatedUser($model)
    {
        $model->createdUser()->associate(Auth::user());
    }
}
