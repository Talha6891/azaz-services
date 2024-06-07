<x-app-layout>
    <div class="space-y-8">
        <div class="block sm:flex items-center justify-between mb-6">
            {{-- Breadcrumb --}}
            <x-breadcrumb :pageTitle="$pageTitle" :breadcrumbItems="$breadcrumbItems" />

            <div class="text-end">
                <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2 !px-3"
                    href="{{ route('plans.index') }}">
                    <iconify-icon class="text-lg mr-1" icon="ic:outline-arrow-back"></iconify-icon>
                    {{ __('Back') }}
                </a>
            </div>
        </div>

        {{-- Plan Details Card --}}
        <div class="rounded-md overflow-hidden">
            <div class="bg-white dark:bg-slate-800 px-5 pt-7 pb-3">
                <h2 class="text-2xl font-semibold mb-4">{{ $plan->name }}</h2>

                {{-- Plan Details --}}
                <div class="grid md:grid-cols-2 gap-6">
                    {{-- Name --}}
                    <div class="input-area">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <div class="relative">
                            <input type="text" id="name" class="form-control" value="{{ $plan->name }}" readonly>
                        </div>
                    </div>

                    {{-- Price --}}
                    <div class="input-area">
                        <label for="price" class="form-label">{{ __('Price') }}</label>
                        <div class="relative">
                            <input type="text" id="price" class="form-control" value="{{ $plan->price }}" readonly>
                        </div>
                    </div>

                    {{-- Duration --}}
                    <div class="input-area">
                        <label for="duration" class="form-label">{{ __('Duration') }}</label>
                        <div class="relative">
                            <input type="text" id="duration" class="form-control" value="{{ $plan->duration }} {{ $plan->duration_unit }}" readonly>
                        </div>
                    </div>

                    {{-- Status --}}
                    <div class="input-area">
                        <label for="status" class="form-label">{{ __('Status') }}</label>
                        <div class="relative">
                            <input type="text" id="status" class="form-control" value="{{ $plan->status ? 'Active' : 'Inactive' }}" readonly>
                        </div>
                    </div>

                    {{-- Number of Visits --}}
                    <div class="input-area">
                        <label for="number_of_visits" class="form-label">{{ __('Number of Visits') }}</label>
                        <div class="relative">
                            <input type="text" id="number_of_visits" class="form-control" value="{{ $plan->number_of_visits }}" readonly>
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="input-area">
                        <label for="description" class="form-label">{{ __('Description') }}</label>
                        <div class="relative">
                            <textarea id="description" class="form-control" readonly>{{ $plan->description }}</textarea>
                        </div>
                    </div>
                </div>

                {{-- Services --}}
                <h3 class="font-semibold text-2xl text-black dark:text-white py-5 mt-8">{{ __('Services') }}</h3>
                <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-7">
                    @foreach ($plan->services as $service)
                        <div class="card border border-slate-200">
                            <div class="card-header bg-slate-100 !p-3">
                                <h4 class="p-0 text-lg uppercase">{{ $service->name }}</h4>
                            </div>
                            <!-- Card Body Start -->
                            <div class="p-4">
                                <p>{{ $service->description }}</p>
                                <p>{{ __('Price: ') }} {{ $service->price }}</p>
                            </div>
                            <!-- Card Body End -->
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
