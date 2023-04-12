<!DOCTYPE html>
<html lang="en">

<head>
    <!-- New -->
    <title>privacy policy</title>
    <!-- all the meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- all the css files -->
    <link rel="shortcut icon" href="{{ asset('assets/uploads/logo/'.get_settings('favicon')) }}" />
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('assets/vendors/bootstrap-5.1.3/css/bootstrap.min.css') }}"
    />

    <!--Custom css-->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('assets/css/swiper-bundle.min.css') }}"
    />

    
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}" />
    <!-- Datepicker css -->
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}" />
    <!-- Select2 css -->
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}" />

    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('assets/vendors/bootstrap-icons-1.8.1/bootstrap-icons.css') }}"
    />

    <!--Toaster css-->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('assets/css/toastr.min.css') }}"
    />

    <!-- Calender css -->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('assets/calender/main.css') }}"
    />

    <script src="{{ asset('assets/vendors/jquery/jquery-3.6.0.min.js') }}"></script>

</head>

<body>
<section class="home-section">
<div class="home-content">
<div class="main_content">
<div class="mainSection-title">
    <div class="row">
      <div class="col-12">
        <div
          class="d-flex justify-content-between align-items-center flex-wrap gr-15"
        >
          <div class="d-flex flex-column">
            <h4>{{ get_phrase('privacy policy') }}</h4>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="eSection-wrap">
                      <div class="fpb-7">
                          <h5>
                            @if(isset($policy))
                            {!!html_entity_decode($policy->policy)!!}
                            @else
                            no policies yet
                            @endif
                          </h5>
                      </div>
        </div>
    </div>
</div>
        </div>
</div>
</section>
</body>
</html>