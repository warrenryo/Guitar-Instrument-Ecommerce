<?php

namespace App\Http\Controllers\Auth;

use App\Models\Brands;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\StringCategory;
use App\Models\AccessoryCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\GuitarEffectsCategory;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $categories = Category::where('status','1')->get();
        $brands = Brands::where('status','1')->get();
        $accessCategories = AccessoryCategory::where('status','1')->get();
        $stringsCategory = StringCategory::where('status', '1')->get();
        $gEffectsCat = GuitarEffectsCategory::where('status', '1')->get(); 
        return view('auth.login',compact('categories','brands','accessCategories','stringsCategory','gEffectsCat'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(Auth::user()->authenticated());
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
