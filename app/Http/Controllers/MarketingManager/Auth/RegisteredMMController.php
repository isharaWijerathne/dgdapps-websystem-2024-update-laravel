<?php

namespace App\Http\Controllers\MarketingManager\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\utils\StaticGenerator;
use App\Models\MarketingManager;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredMMController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view("admin.marketing.create-marketing-manager");;
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
       
        try {
            $request->validate([
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.MarketingManager::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
    
            //getUserId
            $next_mm_id = "";
            $last_created_mm = MarketingManager::query()->orderByDesc("mm_id")->first(); 
                if($last_created_mm == null){
                    $next_mm_id = "MMI-0001";
                 }else{
                    $next_mm_id = StaticGenerator::getNextId($last_created_mm->mm_id);
                }
    
    
            $mm = MarketingManager::create([
                'mm_id' => $next_mm_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_active' => true
            ]);

            return redirect()->back()->with("success","You have successfully created marketing manager account. ");
            // event(new Registered($mm));

            // Auth::guard('marketing_manager')->login($$mm);
    
            // return redirect(route('test-auth', absolute: false));

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with("error","Your action has been canceled");
        }
    }
}
