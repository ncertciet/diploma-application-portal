@extends('layouts.sidebar')

@section('content')
@php($user = Auth::user())

    <div class="hero-section">
        <div class="container-xl">
            <div class="page-header pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-title"><i class="far fa-file-alt mr-1"></i> Personal Details</h1>
                        <div class="page-header-subtitle">
                            Please Fill up the form carefully.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="container-fluid">
    <div class="inner-container container-xl">
        <div class="application-form shadow">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            @endif
            <form method="POST" action="{{route('application.step1.store')}}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-1">
                        <label for="name">1. Title <span class="mendat">*</span></label>
                        <select class="form-control  @error('title') is-invalid @enderror"  name="title" id="title"  value="{{ old('title') }}">

                            <option value="" disabled="true" selected="true">Title</option>
                            <option value="Mr.">Mr.</option>
                            <option value="Ms.">Ms.</option>
                            <option value="Dr.">Dr.</option>
                        </select>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="name">2. Full Name <span class="mendat">*</span></label>
                        <input type="text"  class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" value="{{ $user->name }}" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="gender">3. Gender <span class="mendat">*</span></label><br>
                        <div class="form-group mt-2 mb-0">
                            <div class="form-check-inline">
                                <label class="form-check-label" for="male">
                                    <input type="radio" class="form-check-input" id="male" value="Male" name="gender"  @error('gender') is-invalid @enderror value="{{ old('male') }}">Male
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="female">
                                    <input type="radio" class="form-check-input" id="female" value="Female" name="gender" @error('gender') is-invalid @enderror value="{{ old('female') }}">Female
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="transgender">
                                    <input type="radio" class="form-check-input" id="transgender" value="Transgender" name="gender" @error('gender') is-invalid @enderror value="{{ old('transgender') }}">Transgender
                                </label>
                            </div>
                        </div>
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        <label for="dob">4. Date of Birth <span class="mendat">*</span></label>
                        <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" id="dob"  value="{{ old('dob') }}">
                        @error('dob')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="nationality">5. Nationality <span class="mendat">*</span></label>
                        <input type="text" placeholder="Nationality" class="form-control @error('nationality') is-invalid @enderror" name="nationality" id="nationality"  value="{{ old('nationality') }}">
                        @error('nationality')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="product">6. State/UT <span class="mendat">*</span></label>
                        <select class="form-control product @error('sc_state') is-invalid @enderror" data-related-regime="#regime" name="sc_state" id="product"  value="{{ old('sc_state') }}">

                            <option value="" disabled="true" selected="true">Select State/UT</option>
                        </select>
                        @error('sc_state')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="regime">7. Study Centre <span class="mendat">*</span></label>

                        <select class="form-control regime @error('study_centre') is-invalid @enderror" data-related-category="" data-related-product="#product" name="study_centre" id="regime"  value="{{ old('study_centre') }}">
                            <option value="" selected="selected">Please select State/UT first</option>
                        </select>
                        @error('study_centre')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>


                <h4 class="text-primary mt-4">Present Address</h4>

                    <div class="form-row">
                        <div class="form-group col-sm-3">
                            <label for="p_address">8. Address <span class="mendat">*</span></label>
                            <textarea class="form-control @error('p_address') is-invalid @enderror" name="p_address" id="p_address"  value="{{ old('p_address') }}"></textarea>
                            @error('p_address')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="p_city">9. City <span class="mendat">*</span></label>
                            <input type="text" class="form-control @error('p_city') is-invalid @enderror" name="p_city" id="p_city" placeholder="City"  value="{{ old('p_city') }}">
                            @error('p_city')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="p_state">10. State <span class="mendat">*</span></label>
                            <select class="form-control @error('p_state') is-invalid @enderror" name="p_state" id="p_state"  value="{{ old('p_state') }}">
                                <option value="">Select State</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadar and Nagar Haveli">Daman and Diu, Dadar and Nagar Haveli</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Puducherry">Puducherry</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                            @error('p_state')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="p_zip">11. Pin Code <span class="mendat">*</span></label>
                            <input type="number" class="form-control @error('p_zip') is-invalid @enderror" name="p_zip" id="p_zip" placeholder="Pin Code"  value="{{ old('p_zip') }}">
                            @error('p_zip')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <label for="p_telephone">12. Telephone <small>(Optional)</small></label>
                            <input type="text" class="form-control @error('p_telephone') is-invalid @enderror" name="p_telephone" id="p_telephone" placeholder="e.g. 123-456-7890"  value="{{ old('p_telephone') }}">
                            <small class="text-primary">Format: 123-456-7890</small>
                            @error('p_telephone')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="p_mobile">13. Mobile <span class="mendat">*</span></label>
                            <input type="tel" class="form-control @error('p_mobile') is-invalid @enderror" name="p_mobile" id="p_mobile" placeholder="e.g. 9999999999"  value="{{ old('p_mobile') }}">
                            <small class="text-primary">Format: Phone number with 6-9 and remaing 9 digit with 0-9</small>
                            @error('p_mobile')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="p_email">14. Email <span class="mendat">*</span></label>
                            <input type="email" readonly class="form-control @error('p_email') is-invalid @enderror" name="p_email" id="p_email" placeholder="Email"  value="{{ $user->email }}">
                            @error('p_email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                   
                    {{-- <h4 class="text-primary mt-4">Present Occupation and Official Address</h4>

                    <div class="form-row">
                        <div class="form-group col-sm-3">
                            <label for="occupation">Occupation</label>
                            <input type="text" class="form-control @error('occupation') is-invalid @enderror" name="occupation" id="occupation" placeholder="Occupation"  value="{{ old('occupation') }}">
                            @error('occupation')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="o_address">Address</label>
                            <textarea class="form-control @error('o_address') is-invalid @enderror" name="o_address" id="o_address"  value="{{ old('o_address') }}"></textarea>
                            @error('o_address')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="o_city">City</label>
                            <input type="text" class="form-control @error('o_city') is-invalid @enderror" name="o_city" id="o_city" placeholder="City"  value="{{ old('o_city') }}">
                            @error('o_city')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-2">
                            <label for="o_state">State</label>
                            <select class="form-control @error('o_state') is-invalid @enderror" name="o_state" id="o_state"  value="{{ old('o_state') }}">
                                <option value="">Select State</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadar and Nagar Haveli">Daman and Diu, Dadar and Nagar Haveli</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Puducherry">Puducherry</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                            @error('o_state')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-2">
                            <label for="o_zip">Pin Code</label>
                            <input type="number" class="form-control @error('o_zip') is-invalid @enderror" name="o_zip" id="o_zip" placeholder="Pin Code"  value="{{ old('o_zip') }}">
                            @error('o_zip')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="form-row justify-content-end mt-3">
                        <div class="col-sm-6 text-right">
                            <button type="submit" name="action" value="save" class="btn btn-primary btn-lg mr-3">Save</button>
                            <button type="submit" name="action" value="save-continue" class="btn btn-success btn-lg">Save & Continue</button>
                        </div>
                    </div>

            </form>

        </div>
    </div>
</div>



 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


 <script>
    var products = [
            {
                "name": "Andhra Pradesh", "id": "Andhra Pradesh",
                "regimes": [{"name": "Regional Institute of Education, Mysuru", "id": "Regional Institute of Education, Mysuru"}]
            },
            {
                "name": "Andman and Nicobar Islands", "id": "Andman and Nicobar Islands",
                "regimes": [{"name": "Regional Institute of Education, Bhubaneswar", "id": "Regional Institute of Education, Bhubaneswar"}]
            },
            {
                "name": "Arunachal Pradesh", "id": "Arunachal Pradesh",
                "regimes": [{"name": "North East Regional Institute of Education (NERIE), Shillong", "id": "North East Regional Institute of Education (NERIE), Shillong"}]
            },
            {
                "name": "Assam", "id": "Assam",
                "regimes": [{"name": "North East Regional Institute of Education (NERIE), Shillong", "id": "North East Regional Institute of Education (NERIE), Shillong"}]
            },
            {
                "name": "Bihar", "id": "Bihar",
                "regimes": [{"name": "Regional Institute of Education, Bhubaneswar", "id": "Regional Institute of Education, Bhubaneswar"}]
            },
            {
                "name": "Chandigarh", "id": "Chandigarh",
                "regimes": [{"name": "Department of Educational Psychology and Foundations of Education NCERT, New Delhi", "id": "Department of Educational Psychology and Foundations of Education NCERT, New Delhi"}]
            },
            {
                "name": "Chhattisgarh", "id": "Chhattisgarh",
                "regimes": [{"name": "Regional Institute of Education, Bhopal", "id": "Regional Institute of Education, Bhopal"}]
            },
            {
                "name": "Daman and Diu, Dadra and Nagar Haveli", "id": "Daman and Diu, Dadra and Nagar Haveli",
                "regimes": [{"name": "Regional Institute of Education, Bhopal", "id": "Regional Institute of Education, Bhopal"}]
            },
            /*{
                "name": "Daman and Diu", "id": "Daman and Diu",
                "regimes": [{"name": "Regional Institute of Education, Bhopal", "id": "Regional Institute of Education, Bhopal"}]
            },*/
            {
                "name": "Delhi-NCR (viz.,Delhi, Gurgaon, Faridabad, Noida, Ghaziabad and other surrounding areas)", "id": "Delhi-NCR (viz.,Delhi, Gurgaon, Faridabad, Noida, Ghaziabad and other surrounding areas)",
                "regimes": [{"name": "Department of Educational Psychology and Foundations of Education NCERT, New Delhi", "id": "Department of Educational Psychology and Foundations of Education NCERT, New Delhi"}]
            },
            {
                "name": "Goa", "id": "Goa",
                "regimes": [{"name": "Regional Institute of Education, Bhopal", "id": "Regional Institute of Education, Bhopal"}]
            },
            {
                "name": "Gujrat", "id": "Gujrat",
                "regimes": [{"name": "Regional Institute of Education, Bhopal", "id": "Regional Institute of Education, Bhopal"}]
            },
            {
                "name": "Haryana", "id": "Haryana",
                "regimes": [{"name": "Regional Institute of Education, Ajmer", "id": "Regional Institute of Education, Ajmer"}]
            },
            {
                "name": "Himachal Pradesh", "id": "Himachal Pradesh",
                "regimes": [{"name": "Regional Institute of Education, Ajmer", "id": "Regional Institute of Education, Ajmer"}]
            },
            {
                "name": "Jammu and Kashmir", "id": "Jammu and Kashmir",
                "regimes": [{"name": "Regional Institute of Education, Ajmer", "id": "Regional Institute of Education, Ajmer"}]
            },
            {
                "name": "Jharkhand", "id": "Jharkhand",
                "regimes": [{"name": "Regional Institute of Education, Bhubaneswar", "id": "Regional Institute of Education, Bhubaneswar"}]
            },
            {
                "name": "Karnataka", "id": "Karnataka",
                "regimes": [{"name": "Regional Institute of Education, Mysuru", "id": "Regional Institute of Education, Mysuru"}]
            },
            {
                "name": "Kerala", "id": "Kerala",
                "regimes": [{"name": "Regional Institute of Education, Mysuru", "id": "Regional Institute of Education, Mysuru"}]
            },
            {
                "name": "Ladakh", "id": "Ladakh",
                "regimes": [{"name": "Regional Institute of Education, Ajmer", "id": "Regional Institute of Education, Ajmer"}]
            },
            {
                "name": "Lakshadweep", "id": "Lakshadweep",
                "regimes": [{"name": "Regional Institute of Education, Mysuru", "id": "Regional Institute of Education, Mysuru"}]
            },
            {
                "name": "Madhya pradesh", "id": "Madhya pradesh",
                "regimes": [{"name": "Regional Institute of Education, Bhopal", "id": "Regional Institute of Education, Bhopal"}]
            },
            {
                "name": "Maharashtra", "id": "Maharashtra",
                "regimes": [{"name": "Regional Institute of Education, Bhopal", "id": "Regional Institute of Education, Bhopal"}]
            },
            {
                "name": "Manipur", "id": "Manipur",
                "regimes": [{"name": "North East Regional Institute of Education (NERIE), Shillong", "id": "North East Regional Institute of Education (NERIE), Shillong"}]
            },
            {
                "name": "Meghalaya", "id": "Meghalaya",
                "regimes": [{"name": "North East Regional Institute of Education (NERIE), Shillong", "id": "North East Regional Institute of Education (NERIE), Shillong"}]
            },
            {
                "name": "Mizoram", "id": "Mizoram",
                "regimes": [{"name": "North East Regional Institute of Education (NERIE), Shillong", "id": "North East Regional Institute of Education (NERIE), Shillong"}]
            },
            {
                "name": "Nagaland", "id": "Nagaland",
                "regimes": [{"name": "North East Regional Institute of Education (NERIE), Shillong", "id": "North East Regional Institute of Education (NERIE), Shillong"}]
            },
            {
                "name": "Odisha", "id": "Odisha",
                "regimes": [{"name": "Regional Institute of Education, Bhubaneswar", "id": "Regional Institute of Education, Bhubaneswar"}]
            },
            {
                "name": "Puducherry", "id": "Puducherry",
                "regimes": [{"name": "Regional Institute of Education, Mysuru", "id": "Regional Institute of Education, Mysuru"}]
            },
            {
                "name": "Punjab", "id": "Punjab",
                "regimes": [{"name": "Regional Institute of Education, Ajmer", "id": "Regional Institute of Education, Ajmer"}]
            },
            {
                "name": "Rajasthan", "id": "Rajasthan",
                "regimes": [{"name": "Regional Institute of Education, Ajmer", "id": "Regional Institute of Education, Ajmer"}]
            },
            {
                "name": "Sikkim", "id": "Sikkim",
                "regimes": [{"name": "North East Regional Institute of Education (NERIE), Shillong", "id": "North East Regional Institute of Education (NERIE), Shillong"}]
            },
            {
                "name": "Tamil Nadu", "id": "Tamil Nadu",
                "regimes": [{"name": "Regional Institute of Education, Mysuru", "id": "Regional Institute of Education, Mysuru"}]
            },
            {
                "name": "Telangana", "id": "Telangana",
                "regimes": [{"name": "Regional Institute of Education, Mysuru", "id": "Regional Institute of Education, Mysuru"}]
            },
            {
                "name": "Tiripura", "id": "Tiripura",
                "regimes": [{"name": "North East Regional Institute of Education (NERIE), Shillong", "id": "North East Regional Institute of Education (NERIE), Shillong"}]
            },
            {
                "name": "Uttar Pradesh", "id": "Uttar Pradesh",
                "regimes": [{"name": "Regional Institute of Education, Ajmer", "id": "Regional Institute of Education, Ajmer"}]
            },
            {
                "name": "UttaraKhanad", "id": "UttaraKhanad",
                "regimes": [{"name": "Regional Institute of Education, Ajmer", "id": "Regional Institute of Education, Ajmer"}]
            },
            {
                "name": "West Bengal", "id": "West Bengal",
                "regimes": [{"name": "Regional Institute of Education, Bhubaneswar", "id": "Regional Institute of Education, Bhubaneswar"}]
            }

        ];

        $(function () {
            $.each(products, function (index, value) {
                $(".product").append('<option value="' + value.id + '">' + value.name + '</option>');
            });

            $('.product').on('change', function (e) {
                loadRegimeOptions($(this));
            });

            $('.regime').on('change', function () {
                loadCategories($(this));
            });
        });

        var loadRegimeOptions = function ($productElement) {
            var $regimeElement = $($productElement.data('related-regime'));
            var $categoryElement = $($regimeElement.data('related-category'));

            var selectedProductIndex = $productElement[0].selectedIndex - 1;

            $regimeElement.html('');
            $.each(products[selectedProductIndex].regimes, function (index, value) {
                $regimeElement.append('<option value="' + value.id + '">' + value.name + '</option>');
            });
            //...and blank out category since it no longer applies
            $categoryElement.html('<option>-- Select --</option>');
        };

        var loadCategories = function($regimeElement) {
            var $productElement = $($regimeElement.data('related-product'));
            var $categoryElement = $($regimeElement.data('related-category'));

            var selectedProductIndex = $productElement[0].selectedIndex - 1;
            var selectedRegimeIndex = $regimeElement[0].selectedIndex - 1;

            $categoryElement.html('<option>-- Select --</option>');
            $.each(products[selectedProductIndex].regimes[selectedRegimeIndex].categories, function (index, value) {
                $categoryElement.append('<option value="' + value.id + '">' + value.name + '</option>');
            });
        };
    </script>




@endsection
