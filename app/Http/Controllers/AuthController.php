<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * نمایش صفحه ورود / ثبت‌نام
     */
    public function showAuth(): View
    {
        return view('auth.auth');
    }

    /**
     * ورود به حساب کاربری
     */
    public function login(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ], [
            'email.required'    => 'وارد کردن ایمیل الزامی است.',
            'email.email'       => 'فرمت ایمیل صحیح نیست.',
            'password.required' => 'وارد کردن رمز عبور الزامی است.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('auth')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

        if (! Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            return redirect()->route('auth')
                ->withErrors(['email' => 'ایمیل یا رمز عبور اشتباه است.'])
                ->withInput($request->except('password'));
        }

        $request->session()->regenerate();

        $user = Auth::user()->fresh();

        // اگر تیم نداشت بساز
        if (! $user->current_team_id) {
            $team = $this->createPersonalTeam($user);
        } else {
            $team = Team::find($user->current_team_id);

            // اگه عضو تیم نبود اضافه‌اش کن
            if ($team && ! $this->isMember($user->id, $team->id)) {
                $this->addToTeamMembers($user->id, $team->id, 'owner');
            }
        }

        $user = $user->fresh();

        return $this->redirectToDashboard($user);
    }

    /**
     * ثبت‌نام کاربر جدید
     */
    public function register(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms'    => ['accepted'],
        ], [
            'name.required'      => 'وارد کردن نام الزامی است.',
            'name.max'           => 'نام نباید بیشتر از ۲۵۵ کاراکتر باشد.',
            'email.required'     => 'وارد کردن ایمیل الزامی است.',
            'email.email'        => 'فرمت ایمیل صحیح نیست.',
            'email.unique'       => 'این ایمیل قبلاً ثبت‌نام شده است.',
            'password.required'  => 'وارد کردن رمز عبور الزامی است.',
            'password.min'       => 'رمز عبور باید حداقل ۸ کاراکتر باشد.',
            'password.confirmed' => 'رمز عبور و تکرار آن یکسان نیستند.',
            'terms.accepted'     => 'پذیرش قوانین و مقررات الزامی است.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('auth')
                ->withErrors($validator)
                ->withInput($request->except(['password', 'password_confirmation']))
                ->with('_form', 'register');
        }

        $user = DB::transaction(function () use ($request) {
            // ساخت یوزر
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // ✅ ساخت تیم شخصی + عضویت در team_members
            $this->createPersonalTeam($user);

            return $user->fresh();
        });

        Auth::login($user);

        return $this->redirectToDashboard($user);
    }

    /**
     * خروج از حساب کاربری
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth')
            ->with('success', 'با موفقیت از حساب کاربری خارج شدی.');
    }

    // ══════════════════════════════════════════════
    //                  PRIVATE HELPERS
    // ══════════════════════════════════════════════

    /**
     * ✅ ساخت تیم شخصی + ثبت در team_members
     */
    private function createPersonalTeam(User $user): Team
    {
        // Team model خودش slug رو از اسم تیم می‌سازه (GeneratesUniqueTeamSlugs)
        $team = Team::create([
            'name'        => $user->name . "'s Team",
            'is_personal' => true,
        ]);

        // ✅ ثبت در جدول team_members با role owner
        $this->addToTeamMembers($user->id, $team->id, 'owner');

        // ✅ ست کردن current_team_id روی یوزر
        $user->forceFill(['current_team_id' => $team->id])->save();

        return $team;
    }

    /**
     * ✅ اضافه کردن یوزر به team_members
     */
    private function addToTeamMembers(int $userId, int $teamId, string $role): void
    {
        // اگه قبلاً عضو بود، دوباره اضافه نکن
        if ($this->isMember($userId, $teamId)) {
            return;
        }

        DB::table('team_members')->insert([
            'team_id'    => $teamId,
            'user_id'    => $userId,
            'role'       => $role,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * چک کردن عضویت در تیم
     */
    private function isMember(int $userId, int $teamId): bool
    {
        return DB::table('team_members')
            ->where('team_id', $teamId)
            ->where('user_id', $userId)
            ->exists();
    }

    /**
     * ✅ ریدایرکت به داشبورد با slug تیم
     */
    private function redirectToDashboard(User $user): RedirectResponse
    {
        $user = $user->fresh();
        $team = Team::find($user->current_team_id);

        if (! $team) {
            return redirect('/')->with('error', 'تیمی یافت نشد.');
        }

        return redirect()
            ->route('dashboard', ['current_team' => $team->slug])
            ->with('success', 'خوش اومدی ' . $user->name . ' 👋');
    }
}
