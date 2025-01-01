@extends('front.master')

@section('profile-active','active')

@section('title', __('Profile'))

@section('content')

@include('front.partials.breadcrumb',['pageName' => __('Profile')])

<!-- Profile Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-secondary pr-3">{{ __('messages.user_profile') }}</span>
    </h2>
    <div class="row px-xl-5">
        
        <!-- Personal Information Form -->
        <div class="col-lg-6 mb-5">
            <div class="profile-form bg-light p-30">
                <h4 class="mb-4">{{ __('messages.personal_information') }}</h4>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form method="POST" action="{{ route('profile.update') }}" id="personalInfoForm" novalidate="novalidate">
                    @csrf <!-- لحماية النموذج -->
                    <div class="control-group mb-3">
                        <input type="text" class="form-control" name="first_name" value="{{ old('first_name', $user->name) }}" placeholder="{{ __('messages.EnterYourFirstName') }}" required />
                    </div>
                    <div class="control-group mb-3">
                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $user->last_name) }}" placeholder="{{ __('messages.EnterYourLastName') }}" required />
                    </div>
                    <div class="control-group mb-3">
                        <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" placeholder="{{ __('messages.EnterYourEmail') }}" required />
                    </div>
                    <div class="control-group mb-3">
                        <input type="text" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="{{ __('messages.EnterYourMobileNo') }}" required />
                    </div>
                    <button class="btn btn-primary" type="submit">{{ __('messages.SavePersonalInfo') }}</button>
                </form>
            </div>
        </div>
                
<!-- Address Information Form -->
<div class="col-lg-6 mb-5">
    <div class="profile-form bg-light p-30">
        <h4 class="mb-4">{{ __('messages.AddressInformation') }}</h4>
        <form method="POST" action="{{ route('profile.update') }}" id="addressForm">
            @csrf
            
            <!-- City -->
            <div class="control-group mb-3">
                <select class="form-control" name="city" required>
                    <option value="">{{ __('messages.SelectaCity') }}</option>
                    <option value="Amman" {{ old('city', $user->city) == 'Amman' ? 'selected' : '' }}>{{ __('messages.Amman') }}</option>
                    <option value="Zarqa" {{ old('city', $user->city) == 'Zarqa' ? 'selected' : '' }}>{{ __('messages.Zarqa') }}</option>
                    <option value="Irbid" {{ old('city', $user->city) == 'Irbid' ? 'selected' : '' }}>{{ __('messages.Irbid') }}</option>
                    <option value="Aqaba" {{ old('city', $user->city) == 'Aqaba' ? 'selected' : '' }}>{{ __('messages.Aqaba') }}</option>
                    <option value="Ajloun" {{ old('city', $user->city) == 'Ajloun' ? 'selected' : '' }}>{{ __('messages.Ajloun') }}</option>
                    <option value="Jarash" {{ old('city', $user->city) == 'Jarash' ? 'selected' : '' }}>{{ __('messages.Jarash') }}</option>
                    <option value="Mafraq" {{ old('city', $user->city) == 'Mafraq' ? 'selected' : '' }}>{{ __('messages.Mafraq') }}</option>
                    <option value="Ma\'an" {{ old('city', $user->city) == 'Ma\'an' ? 'selected' : '' }}>{{ __('messages.Ma\'an') }}</option>
                    <option value="Karak" {{ old('city', $user->city) == 'Karak' ? 'selected' : '' }}>{{ __('messages.Karak') }}</option>
                </select>
            </div>
            <!-- Address -->
            <div class="control-group mb-3">
                <input type="text" class="form-control" name="address" value="{{ old('address', $user->address) }}" placeholder="{{ __('messages.StreetName') }}" />
            </div>
            <!-- Building Name or Villa Number -->
            <div class="control-group mb-3">
                <input type="text" class="form-control" name="building" value="{{ old('building', $user->building) }}" placeholder="{{ __('messages.BuildingNameorVillaNumber') }}" />
            </div>
            <!-- Additional Description -->
            <div class="control-group mb-3">
                <textarea class="form-control" name="description" placeholder="{{ __('messages.AdditionalDescription') }}" rows="3">{{ old('description', $user->description) }}</textarea>
            </div>
            <!-- Submit Button -->
            <div>
                <button class="btn btn-primary py-2 px-4" type="submit">{{ __('messages.SaveAddressInfo') }}</button>
            </div>
        </form>
    </div>
</div>
        
    </div>

    <!-- Profile Image and Contact Details -->
<!-- Profile End -->

@endsection
