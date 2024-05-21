<x-app-layout>
    <div>
        {{--Breadcrumb start--}}
        <div class="mb-6">
            {{--BreadCrumb--}}
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle"/>
        </div>
        {{--Breadcrumb end--}}

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        {{--Create equipment form start--}}
        <div class="card xl:col-span-2">
            <div class="card-body flex flex-col p-6">
                <div class="card-text h-full">
                    <form class="space-y-4" method="POST" action="{{ route('services.store') }}" >
                        @csrf
                        <div class="grid md:grid-cols-2 gap-6">

                            {{-- name start --}}
                            <div class="input-area">
                                <label for="name" class="form-label">{{ __('Name') }}<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="name" name="name" class="form-control"
                                           placeholder="Enter service name"
                                           value="{{ old('name') }}" required>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- name end --}}

                            {{--Category input start--}}
                            <div class="input-area">
                                <label for="category_id" class="form-label">{{ __('Category') }}<span class="text-red-500">*</span></label>
                                <select name="category_id" class="form-control">
                                    <option value="" selected disabled>
                                        {{ __('Select Category') }}
                                    </option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <iconify-icon class="absolute right-3 bottom-3 text-xl dark:text-white z-10"
                                              icon="material-symbols:keyboard-arrow-down-rounded"></iconify-icon>
                            </div>
                            {{--Category input end--}}



                            {{-- price start --}}
                            <div class="input-area">
                                <label for="price" class="form-label">{{ __('Service Price') }}</label>
                                <div class="relative">
                                        <input type="text" id="price" name="price" class="form-control"
                                                  placeholder="Enter service price" value="{{ old('price') }}"
                                         >
                                    <x-input-error :messages="$errors->get('price')" class="mt-2"/>
                                </div>
                            </div>
                            {{--  price end --}}

                            {{-- description start --}}
                            <div class="input-area">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <div class="relative">
                                        <textarea type="text" id="description" name="description" class="form-control"
                                                  placeholder="Enter service description"
                                        >{{ old('description') }}</textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                                </div>
                            </div>
                            {{--  description end --}}
                        </div>
                        <button class="btn flex justify-center btn-dark ml-auto">
                            {{ __('Save') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        {{--Create equipment form end--}}
    </div>

</x-app-layout>
