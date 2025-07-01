@section('title', 'Dashboard Admin | Company Settings')
<?php $page = 'Dashboard_admin'; ?>

@extends('partials.maindashboard')
@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Company</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Settings - Company</li>
            </ul>
        </div>

        <div class="card h-100 p-0 radius-12 overflow-hidden">
            <div class="card-body p-40">
                <form action="#">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">Full
                                    Name <span class="text-danger-600">*</span></label>
                                <input type="text" class="form-control radius-8" id="name"
                                    placeholder="Enter Full Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="email" class="form-label fw-semibold text-primary-light text-sm mb-8">Email
                                    <span class="text-danger-600">*</span></label>
                                <input type="email" class="form-control radius-8" id="email"
                                    placeholder="Enter email address">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="number" class="form-label fw-semibold text-primary-light text-sm mb-8">Phone
                                    Number</label>
                                <input type="email" class="form-control radius-8" id="number"
                                    placeholder="Enter phone number">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="Website" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Website</label>
                                <input type="url" class="form-control radius-8" id="Website"
                                    placeholder="Website URL">
                            </div>
                        </div>
                        <!-- Province -->
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="province" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Province <span class="text-danger-600">*</span>
                                </label>
                                <select id="province" name="province" class="form-control radius-8 form-select">
                                    <option selected disabled>Select Province</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->kode }}">{{ $province->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- City -->
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="city" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    City <span class="text-danger-600">*</span>
                                </label>
                                <select id="city" name="city" class="form-control radius-8 form-select">
                                    <option selected disabled>Select City</option>
                                </select>
                            </div>
                        </div>

                        <!-- District -->
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="district" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    District <span class="text-danger-600">*</span>
                                </label>
                                <select id="district" name="district" class="form-control radius-8 form-select">
                                    <option selected disabled>Select District</option>
                                </select>
                            </div>
                        </div>

                        <!-- Village -->
                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="village" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Village <span class="text-danger-600">*</span>
                                </label>
                                <select id="village" name="village" class="form-control radius-8 form-select">
                                    <option selected disabled>Select Village</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="mb-20">
                                <label for="zip" class="form-label fw-semibold text-primary-light text-sm mb-8"> Zip
                                    Code <span class="text-danger-600">*</span></label>
                                <input type="text" class="form-control radius-8" id="zip" placeholder="Zip Code">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-20">
                                <label for="address" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                    Address* <span class="text-danger-600">*</span></label>
                                <input type="text" class="form-control radius-8" id="address"
                                    placeholder="Enter Your Address">
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center gap-3 mt-24">
                            <button type="reset"
                                class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-40 py-11 radius-8">
                                Reset
                            </button>
                            <button type="submit"
                                class="btn btn-primary border border-primary-600 text-md px-24 py-12 radius-8">
                                Save Change
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('#province').on('change', function() {
            let kode_provinsi = $(this).val();
            $('#city').html('<option selected disabled>Loading...</option>');
            $.get("{{ route('get.cities') }}", {
                kode_provinsi: kode_provinsi
            }, function(data) {
                $('#city').html('<option selected disabled>Select City</option>');
                $('#district').html('<option selected disabled>Select District</option>');
                $('#village').html('<option selected disabled>Select Village</option>');
                $.each(data, function(i, city) {
                    $('#city').append(`<option value="${city.kode}">${city.nama}</option>`);
                });
            });
        });
    </script>


@endsection
