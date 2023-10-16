@extends('layouts.user')
@section('contents')
<link rel="stylesheet" href="{{ asset('dashmin/css/tahapan.css') }}">
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card corona-gradient-card">
      <div class="card-body py-0 px-0 px-sm-3">
        <div class="row align-items-center">
          <div class="col-4 col-sm-3 col-xl-2">
            <img src="{{asset('dashmin/images/dashboard/Group126@2x.png')}}" class="gradient-corona-img img-fluid" alt="">
          </div>
          <div class="col-2 col-sm-7 col-xl-8 p-0">
           
            <h4 >Semangat <b style="color: yellow">{{ Auth::user()->name}}</b> !
            </h4>
            <p class="mb-0 font-weight-normal d-none d-sm-block" style="color: white">Keberhasilan adalah hasil dari upaya yang tak kenal lelah. Lihat Progressmu disini ya!</p>
          </div>
          <div class="col-3 col-sm-2 col-xl-2 ps-0 text-center">
            <span>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2 id="heading">Sign Up Your User Account</h2>
                <p>Fill all form field to go to next step</p>
                <form id="msform">
                  <!-- progressbar -->
                    <ul id="progressbar">
                        @foreach ($tahapan_pengajuan as $p)
                            <li><strong>{{ $p->tahapan->name }}</strong></li>
                        @endforeach
                        {{-- <li class="active" id="account"><strong>Account</strong></li>
                        <li id="personal"><strong>Personal</strong></li>
                        <li id="payment"><strong>Image</strong></li>
                        <li id="payment"><strong>Image</strong></li>
                        <li id="payment"><strong>Image</strong></li>
                        <li id="confirm"><strong>Finish</strong></li> --}}
                    </ul>
                    <div class="progress">
                    	<div class="progress-bar" id="progress-bar" style="background-color: green"></div>
                      <div class="progress-text" id="progress-text">
                        {{round(( $tahapan_pengajuan->count() < 1 ? 0 : ($tahapan_pengajuan->where('status', 1)->count()*100)/$tahapan_pengajuan->count())) }}
                      </div>
                	</div>
                    <br>
                    <!-- fieldsets -->
                    <fieldset>
                        <div class="form-card">
                        	<div class="row">
                        		<div class="col-7">
                            		{{-- <h2 class="fs-title">Account Information:</h2> --}}
                            	</div>
                            	<div class="col-5">
                            		{{-- <h2 class="steps">Step 1 - 4</h2> --}}
                            	</div>
                            </div>
                            {{-- <label class="fieldlabels">Email: *</label>
                            <input type="email" name="email" placeholder="Email Id"/>
                            <label class="fieldlabels">Username: *</label>
                            <input type="text" name="uname" placeholder="UserName"/>
                            <label class="fieldlabels">Password: *</label>
                            <input type="password" name="pwd" placeholder="Password"/>
                            <label class="fieldlabels">Confirm Password: *</label>
                            <input type="password" name="cpwd" placeholder="Confirm Password"/> --}}
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next"/>
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                        		<div class="col-7">
                            		{{-- <h2 class="fs-title">Personal Information:</h2> --}}
                            	</div>
                            	<div class="col-5">
                            		{{-- <h2 class="steps">Step 2 - 4</h2> --}}
                            	</div>
                            </div>
                            {{-- <label class="fieldlabels">First Name: *</label>
                            <input type="text" name="fname" placeholder="First Name"/>
                            <label class="fieldlabels">Last Name: *</label>
                            <input type="text" name="lname" placeholder="Last Name"/>
                            <label class="fieldlabels">Contact No.: *</label>
                            <input type="text" name="phno" placeholder="Contact No."/>
                            <label class="fieldlabels">Alternate Contact No.: *</label>
                            <input type="text" name="phno_2" placeholder="Alternate Contact No."/> --}}
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next"/>
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                        		<div class="col-7">
                            		{{-- <h2 class="fs-title">Personal Information:</h2> --}}
                            	</div>
                            	<div class="col-5">
                            		{{-- <h2 class="steps">Step 2 - 4</h2> --}}
                            	</div>
                            </div>
                            {{-- <label class="fieldlabels">First Name: *</label>
                            <input type="text" name="fname" placeholder="First Name"/>
                            <label class="fieldlabels">Last Name: *</label>
                            <input type="text" name="lname" placeholder="Last Name"/>
                            <label class="fieldlabels">Contact No.: *</label>
                            <input type="text" name="phno" placeholder="Contact No."/>
                            <label class="fieldlabels">Alternate Contact No.: *</label>
                            <input type="text" name="phno_2" placeholder="Alternate Contact No."/> --}}
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next"/>
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                        		<div class="col-7">
                            		{{-- <h2 class="fs-title">Personal Information:</h2> --}}
                            	</div>
                            	<div class="col-5">
                            		{{-- <h2 class="steps">Step 2 - 4</h2> --}}
                            	</div>
                            </div>
                            {{-- <label class="fieldlabels">First Name: *</label>
                            <input type="text" name="fname" placeholder="First Name"/>
                            <label class="fieldlabels">Last Name: *</label>
                            <input type="text" name="lname" placeholder="Last Name"/>
                            <label class="fieldlabels">Contact No.: *</label>
                            <input type="text" name="phno" placeholder="Contact No."/>
                            <label class="fieldlabels">Alternate Contact No.: *</label>
                            <input type="text" name="phno_2" placeholder="Alternate Contact No."/> --}}
                        </div>
                        <input type="button" name="next" class="next action-button" value="Next"/>
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                        		<div class="col-7">
                            		{{-- <h2 class="fs-title">Image Upload:</h2> --}}
                            	</div>
                            	<div class="col-5">
                            		{{-- <h2 class="steps">Step 3 - 4</h2> --}}
                            	</div>
                            </div>
                            {{-- <label class="fieldlabels">Upload Your Photo:</label>
                            <input type="file" name="pic" accept="image/*">
                            <label class="fieldlabels">Upload Signature Photo:</label>
                            <input type="file" name="pic" accept="image/*"> --}}
                        </div>
                        <input type="button" name="next" class="next action-button" value="Submit"/>
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                        	<div class="row">
                        		<div class="col-7">
                            		{{-- <h2 class="fs-title">Finish:</h2> --}}
                            	</div>
                            	<div class="col-5">
                            		{{-- <h2 class="steps">Step 4 - 4</h2> --}}
                            	</div>
                            </div>
                            <br><br>
                            <h2 class="purple-text text-center"><strong>Selamat!</strong></h2>
                            <br>
                            {{-- <div class="row justify-content-center">
                                <div class="col-3">
                                    <img src="https://i.imgur.com/GwStPmg.png" class="fit-image">
                                </div>
                            </div> --}}
                            {{-- <br><br> --}}
                            <div class="row justify-content-center">
                                <div class="col-7 text-center">
                                    <h5 class="purple-text text-center">Anda telah berhasil melewati semua tahap seleksi dan telah diterima untuk bekerja!</h5>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
	</div>
</div>

@endsection
@push('script')
    <script>
      let progress = $("#progress-text").text();
      $("#progress-bar").css(
        "width", `${parseInt(progress)}%`
      )
    </script>
    {{-- <script src="{{ asset('dashmin/js/tahapan.js') }}"></script> --}}
@endpush