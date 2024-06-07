<x-guest-layout>
    <div class="auth-box h-full flex flex-col justify-center">
        <div class="mobile-logo text-center mb-6 lg:hidden flex justify-center">
            <div class="mb-10 inline-flex items-center justify-center">
                <x-application-logo />
                <span class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">DashCode</span>
            </div>
        </div>
        <div class="text-center 2xl:mb-10 mb-4">
            <h4 class="font-medium"> {{ __('Sign in') }}</h4>
            <div class="text-slate-500 text-base">
                {{ __('Sign in to your account to start using Dashcode') }}
            </div>
        </div>

        <!-- START::LOGIN FORM -->
        <x-login-form></x-login-form>
        <!-- END::LOGIN FORM -->
    </div>
</x-guest-layout>
