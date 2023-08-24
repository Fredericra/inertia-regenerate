<?php

namespace App\Http\Middleware;


use Inertia\Middleware;
use App\Models\Question;
use App\Models\Valiny;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            "auth"=>fn()=>Auth::check()?true:false,
            "user"=>fn()=>Auth::check()?Auth::user():null,
            "admin"=>fn()=>Auth::check() && Auth::user()->email==="admin@dev1234"?true:false,
            "donne"=>fn()=>Auth::check() && Auth::user()->email==="admin@dev1234"?Question::orderBy("id","desc")->get():null,
            "reponse"=>fn()=>Auth::check()?Question::all():null,
            "plus"=>fn()=>Auth::check() && Auth::user()->email==="admin@dev1234"?Valiny::with("admin")
            ->where("confirmed",false)
            ->orderBy("id","desc")
            ->get():null,
            "left"=>fn()=>Auth::check() && Auth::user()->email!=="admin@dev1234"?Valiny::with("admin")
            ->where(["confirmed"=>true,"admin_id"=>Auth::id()])
            ->orderBy("id","desc")
            ->get():null,
        ]);
    }
}
