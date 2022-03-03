@extends('theme.layout.base_layout')
@section('title', 'Hashed Url')
@section('content')
<div class="col col-md-12">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addModal">Generate Hashed  URL (#)</h5>
        </div>
        <div class="modal-body">
            <div class="card">
                <form action="{{route('generate_url')}}" method="post">
                    @csrf
                    <div class="row form-group">
                        <div class="col col-md-2">
                            <label for="file-input" class=" form-control-label"><strong>Select Options</label></strong>
                        </div>
                        <div class="col-12 col-md-10">
                            <input type="checkbox" name="enable_ip_address_tracking" {{Session::has('enable_ip_address_tracking') ? 'checked' :''}}>
                            <label for="file-input" class="form-control-label">Tracking IP Address &nbsp </label>
                            
                            <input type="checkbox" name="enable_url_referal_tracking" {{Session::has('enable_url_referal_tracking') ? 'checked' :''}}>
                            <label for="file-input" class="form-control-label">Tracking Referer URL &nbsp</label>
                            
                            <input type="checkbox" name="enable_device_type_tracking" {{Session::has('enable_device_type_tracking') ? 'checked' :''}}>
                            <label for="file-input" class="form-control-label">Tracking Device Type &nbsp</label>
                            
                            <input type="checkbox" name="browser_and_version_tracking" {{Session::has('browser_and_version_tracking') ? 'checked' :''}}>
                            <label for="file-input" class="form-control-label">Tracking Browser & Version &nbsp </label>
                            
                            <br>
                            <input type="checkbox" name="operating_and_version_tracking" {{Session::has('operating_and_version_tracking') ? 'checked' :''}}>
                            <label for="file-input" class=" form-control-label">Tracking Operating System & Version &nbsp</label>
                            
                           
                            <input type="checkbox" name="single_use" {{Session::has('single_use') ? 'checked' :''}}>
                            <label for="file-input" class=" form-control-label">Single Use &nbsp</label>
                            
                            <input type="checkbox" name="enforce_https" {{Session::has('enforce_https') ? 'checked' :''}}>
                            <label for="file-input" class=" form-control-label">Enforce HTTPS &nbsp</label>
                            
                            <input type="checkbox" name="query_parameter_forwording" {{Session::has('query_parameter_forwording') ? 'checked' :''}}>
                            <label for="file-input" class=" form-control-label">Forwarding Query Parameters (<i style="color:red">work is pending, Dont use </i>)&nbsp </label>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-2">
                            <label for="file-input" class="form-control-label"><strong>Short URL Keys</strong></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Short Url Custom Key e.g ASHFFAF3636363SDGsdfsd456456" name="custome_key" value="{{old('custome_key')}}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-2">
                            <label for="file-input" class="form-control-label"><strong>Short URL Validity</strong></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Short URL Validity e.g 01/03/2022 To 24/03/22" name="url_validity" value="{{old('url_validity')}}">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-2">
                            <label for="file-input" class="form-control-label"><strong>Redirect Status Code </strong></label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder=" Redirect Staus Code e.g 302, 304 etc" name="http_redirect" id="http_redirect" value="{{old('http_redirect')}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2">
                            <label for="file-input" class=" form-control-label required"><strong>Original URL</strong></label>
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" placeholder="https://...Enter Origin URL (https or http)" name="url" value="{{old('url')}}" class="form-control">
                            @if ($errors->has('url'))
                                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                    <span class="badge badge-pill badge-danger">Error</span>
                                    {{ $errors->first('url') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>

                    @if(session()->has('short_url'))
                        <div class="row form-group">
                            <div class="col col-md-2">
                                <label for="file-input" class=" form-control-label"><strong>Hashed URL (Unique)</strong></label>
                            </div>
                            <div class="col-md-6">
                                <br>
                                <p>{{ session('short_url') }}</p>
                                <br>
                                <a class="btn btn-primary" href="{{ session('short_url') }}">Click To Open</a>
                                <br>
                                <br>
                                <div class="col-md-10 sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        Short URL Generated Successfully.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(session()->has('error'))
                    <div class="row form-group">
                            <div class="col col-md-2">
                               
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6 sufee-alert alert with-close alert-danger alert-dismissible fade show">{{session('error')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <p class="required"> <strong>Note : </strong>Star is mendatory</p>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Generate</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Add-->
@endsection