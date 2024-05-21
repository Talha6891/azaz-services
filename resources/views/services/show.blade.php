<x-app-layout>
    <div>
        {{--Breadcrumb start--}}
        <div class="mb-6">
            {{--BreadCrumb--}}
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle"/>
        </div>
        {{--Breadcrumb end--}}

        {{--Create equipment form start--}}
        <div class="card xl:col-span-2">
            <div class="card-body flex flex-col p-6">
                <div class="card-text h-full">
                    <form class="space-y-4">
                        <div class="grid md:grid-cols-2 gap-6">

                            {{-- name start --}}
                            <div class="input-area">
                                <label for="name" class="form-label">{{ __('Name') }}<span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="name" name="name" class="form-control"
                                           value="{{ old('name', $service->name) }}" required readonly>
                                </div>
                            </div>
                            {{-- name end --}}

                            {{-- category start --}}
                            <div class="input-area">
                                <label for="name" class="form-label">{{ __('Category') }}<span
                                        class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="name" name="name" class="form-control"
                                           value="{{ old('name', $service->category->name) }}" required readonly>
                                </div>
                            </div>
                            {{-- category end --}}

                            {{-- price start --}}
                            <div class="input-area">
                                <label for="price" class="form-label">{{ __('Service Price') }}</label>
                                <div class="relative">
                                    <input type="text" id="price" name="price" class="form-control"
                                           value="{{ old('price', $service->price ?? 'N/A') }}" readonly
                                    >
                                </div>
                            </div>
                            {{-- price end --}}


                            {{-- description start --}}
                            <div class="input-area">
                                <label for="description" class="form-label">{{ __('Description') }}</label>
                                <div class="relative">
                                    <textarea id="description" name="description" class="form-control"
                                              placeholder="Enter service description" readonly
                                    >{{ old('description', $service->description ?? 'N/A') }}</textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                                </div>
                            </div>
                            {{-- description end --}}

                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{--Create equipment form end--}}
    </div>

</x-app-layout>
