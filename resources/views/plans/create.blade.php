<x-app-layout>
    <div class="space-y-8">
        <div class="block sm:flex items-center justify-between mb-6">
            {{-- Breadcrumb --}}
            <x-breadcrumb :pageTitle="$pageTitle" :breadcrumbItems="$breadcrumbItems" />

            {{-- show error --}}
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif
            {{-- end error --}}

            <div class="text-end">
                <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2 !px-3"
                    href="{{ route('plans.index') }}">
                    <iconify-icon class="text-lg mr-1" icon="ic:outline-arrow-back"></iconify-icon>
                    {{ __('Back') }}
                </a>
            </div>
        </div>

        {{-- Create Plan Card --}}
        <div class="rounded-md overflow-hidden">
            <div class="bg-white dark:bg-slate-800 px-5 pt-7 pb-3c">
                <form method="POST" action="{{ route('plans.store') }}">
                    @csrf
                    {{-- Create equipment form start --}}
                    <div class="grid md:grid-cols-2 gap-6">

                        {{-- name start --}}
                        <div class="input-area">
                            <label for="name" class="form-label">{{ __('Name') }}<span
                                    class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="Enter plan name" value="{{ old('name') }}" required>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>
                        {{-- name end --}}

                        {{-- price start --}}
                        <div class="input-area">
                            <label for="price" class="form-label">{{ __('Price') }}<span
                                    class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="text" id="price" name="price" class="form-control"
                                    placeholder="Enter price " value="{{ old('price') }}" required>
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>
                        </div>
                        {{-- price end --}}

                        {{-- duration start --}}
                        <div class="input-area">
                            <label for="duration" class="form-label">{{ __('Duration') }}<span
                                    class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="number" id="duration" name="duration" class="form-control"
                                    placeholder="Enter duration " value="{{ old('duration') }}" required>
                                <x-input-error :messages="$errors->get('duration')" class="mt-2" />
                            </div>
                        </div>
                        {{-- duration end --}}

                        {{-- duration unit start --}}
                        <div class="input-area">
                            <label for="duration_unit" class="form-label">{{ __('Duration Unit') }}
                                <span class="text-red-500">*</span>
                            </label>
                            <select id="duration_unit" name="duration_unit" class="form-control" required>
                                <option value="" selected disabled>
                                    {{ __('Select Duration Unit') }}
                                </option>
                                <option value="days">Day(s)</option>
                                <option value="month">Month(s)</option>
                                <option value="year">Year(s)</option>
                            </select>
                            <iconify-icon class="absolute right-3 bottom-3 text-xl dark:text-white z-10"
                                icon="material-symbols:keyboard-arrow-down-rounded"></iconify-icon>
                        </div>
                        {{-- duration unit end --}}

                        {{-- status start --}}
                        <div class="input-area">
                            <label for="status" class="form-label">{{ __('Status') }}<span
                                    class="text-red-500">*</span></label>
                            <select name="status" class="form-control" required>
                                <option value="" selected disabled>
                                    {{ __('Select status') }}
                                </option>
                                <option value="1">
                                    Active
                                </option>
                                <option value="0">
                                    Inactive
                                </option>
                            </select>
                            <iconify-icon class="absolute right-3 bottom-3 text-xl dark:text-white z-10"
                                icon="material-symbols:keyboard-arrow-down-rounded"></iconify-icon>
                        </div>
                        {{-- status end --}}


                        {{-- number_of_visits start --}}
                        <div class="input-area">
                            <label for="number_of_visits" class="form-label">{{ __('Number of Visits') }}<span
                                    class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="number" id="number_of_visits" name="number_of_visits" class="form-control"
                                    placeholder="Enter number  of visits " value="{{ old('number_of_visits') }}"
                                    required>
                                <x-input-error :messages="$errors->get('number_of_visits')" class="mt-2" />
                            </div>
                        </div>
                        {{-- duration end --}}


                        {{-- description start --}}
                        <div class="input-area">
                            <label for="description" class="form-label">{{ __('Description') }}</label>
                            <div class="relative">
                                <textarea id="description" name="description" class="form-control" placeholder="Enter plan description">{{ old('description') }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                        </div>
                        {{--  description end --}}
                    </div>


                    {{-- Choose Services --}}
                    <h3 class="font-semibold text-2xl text-black dark:text-white py-5 mt-8">{{ __('Choose Services') }}
                    </h3>
                    <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-7">
                        @foreach ($categories as $category)
                            <div class="card border border-slate-200">
                                <div class="card-header bg-slate-100 !p-3">
                                    <h4 class="p-0 text-lg uppercase">{{ $category->name }}</h4>
                                </div>
                                <!-- Card Body Start -->
                                <div class="p-4">
                                    <ul>
                                        @foreach ($category->services as $service)
                                            <li>
                                                <div class="flex items-center justify-between gap-x-3">
                                                    <label for="service_{{ $service->id }}"
                                                        class="capitalize">{{ $service->name }}
                                                        ({{ $service->price }})
                                                    </label>
                                                    <div class="flex items-center mr-2 sm:mr-4 mt-2 space-x-2">
                                                        <label
                                                            class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
                                                            <input name="services[]"
                                                                @if (in_array($service->id, old('services', []))) checked @endif
                                                                id="service_{{ $service->id }}"
                                                                value="{{ $service->id }}" type="checkbox"
                                                                class="sr-only peer">
                                                            <div
                                                                class="w-14 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:z-10 after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary-500">
                                                            </div>
                                                            <span
                                                                class="absolute left-1 z-20 text-xs text-white font-Inter font-normal opacity-0 peer-checked:opacity-100">On</span>
                                                            <span
                                                                class="absolute right-1 z-20 text-xs text-white font-Inter font-normal opacity-100 peer-checked:opacity-0">Off</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- Card Body End -->
                            </div>
                        @endforeach
                    </div>

                    <button
                        class="btn inline-flex justify-center w-full btn-dark dark:bg-slate-700 dark:text-slate-300 m-1 mt-6 !px-3 !py-2 my-8 ">
                        <span class="flex items-center">
                            <iconify-icon class="ltr:mr-2 rtl:ml-2" icon="ph:plus-bold"></iconify-icon>
                            <span>{{ __('Save') }}</span>
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
