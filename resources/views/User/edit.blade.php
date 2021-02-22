@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">

                          <form method="POST" autocomplete="off" action="{{ route('updateUser') }}" enctype="multipart/form-data" aria-label="{{ __('Register') }}">

                        @if(Session::has('success'))
                        {{ Session::get('success') }} @php Session::forget('success'); @endphp
                        @endif

                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}"> <br/>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('NIK') }}</label>

                            <div class="col-md-6">
                                <input id="nik" type="number" value="{{$user->nik}}" class="form-control{{ $errors->has('nik') ? ' is-invalid' : '' }}" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==16) return false;" name="nik"  maxlength="16" required autofocus>

                                @if ($errors->has('nik'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nik') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{$user->first_name}}"  required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name"  value="{{$user->last_name}}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="tempat_lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tempat Lahir') }}</label>

                            <div class="col-md-6">
                                <input id="tempat_lahir" type="text" class="form-control{{ $errors->has('tempat_lahir') ? ' is-invalid' : '' }}" name="tempat_lahir" value="{{$user->tempat_lahir}}" required autofocus>

                                @if ($errors->has('tempat_lahir'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

                            <div class="col-md-6">
                                <input id="tanggal_lahir" type="date"  min="1960-01-01" max="2001-12-31"class="form-control{{ $errors->has('tanggal_lahir') ? ' is-invalid' : '' }}" name="tanggal_lahir" value="{{$user->tanggal_lahir}}" required autofocus>

                                @if ($errors->has('tanggal_lahir'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jk" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>

                        <div class="col-md-6">
                            @if($user->jk == 'Laki-Laki')
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" checked="" type="radio" name="jk" id="inlineRadio1" value="Laki-Laki">
                                <label class="form-check-label"  for="inlineRadio1">Laki Laki</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jk" id="inlineRadio2" value="Perempuan">
                             <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                        </div>
                        @else
                           <div class="form-check form-check-inline">
                                <input class="form-check-input"  type="radio" name="jk" id="inlineRadio1" value="Laki-Laki">
                                <label class="form-check-label"  for="inlineRadio1">Laki Laki</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input"  checked="" type="radio" name="jk" id="inlineRadio2" value="Perempuan">
                             <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                        </div>
                            @endif
                                          @if ($errors->has('jk'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="Provinsi" class="col-md-4 col-form-label text-md-right">{{ __('Provinsi ') }}</label>

                            <div class="col-md-6">

                            <select class="form-control" name="provinsi" id="select_provinsi" aria-label="Default select example">
                            <!-- <option value="{{$user->provinsi}}" selected="">{{$prov->provinsi}}</option> -->
                             @foreach ($provinsis as $key => $value)    
                                <option value="{{ $key }}">{{ $value }}</option>
                             @endforeach
                            </select>

                                @if ($errors->has('provinsi'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('provinsi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group row">
                            <label for="kabupaten" class="col-md-4 col-form-label text-md-right">{{ __('Kota/Kabupaten ') }}</label>

                            <div class="col-md-6">

                            <select class="form-control" name="kabupaten" id="select_kabupaten" aria-label="Default select example">
                               <option selected>--PILIH KOTA/KABUPATEN--</option>
                            </select>

                                @if ($errors->has('kabupaten'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kabupaten') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                         <div class="form-group row">
                            <label for="kecamatan" class="col-md-4 col-form-label text-md-right">{{ __('Kecamatan') }}</label>

                            <div class="col-md-6">

                            <select class="form-control" name="kecamatan" id="select_kecamatan" aria-label="Default select example">
                               <option selected>--PILIH KECAMATAN--</option>
                            </select>

                                @if ($errors->has('kecamatan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kecamatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="kelurahan" class="col-md-4 col-form-label text-md-right">{{ __('Kelurahan ') }}</label>

                            <div class="col-md-6">

                            <select class="form-control" name="kelurahan" id="select_kelurahan" aria-label="Default select example">
                               <option selected>--PILIH KELURAHAN--</option>
                            </select>

                                @if ($errors->has('kelurahan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kelurahan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                     <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" value="{{ $user->alamat }}" required autofocus>

                                @if ($errors->has('alamat'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status Pernikahan') }}</label>

                        <div class="col-md-6">
                            @if($user->status == 'Menikah')
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio3" value="Belum Menikah">
                                <label class="form-check-label" for="inlineRadio3">Belum Menikah</label>
                            </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" checked="" type="radio" name="status" id="inlineRadio4" value="Menikah">
                             <label class="form-check-label" for="inlineRadio4">Menikah</label>
                        </div>
                        @else
                         <div class="form-check form-check-inline">
                                <input class="form-check-input"checked="" type="radio" name="status" id="inlineRadio3" value="Belum Menikah">
                                <label class="form-check-label" for="inlineRadio3">Belum Menikah</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input"  type="radio" name="status" id="inlineRadio4" value="Menikah">
                             <label class="form-check-label" for="inlineRadio4">Menikah</label>
                        </div>
                                @endif    
                            </div>
                        </div>



                      <div class="form-group row">
                            <label for="telepon" class="col-md-4 col-form-label text-md-right">{{ __('Telepon') }}</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" value="+62"  name="telepon">+62</span>
                                </div>
                                <input  type="number" pattern="/^-?\.?\d*$/" onKeyPress="if(this.value.length==15) return false;"  class="form-control{{ $errors->has('telepon') ? ' is-invalid' : '' }}" name="telepon" value="{{ $user->telepon }}" required autofocus>

                                @if ($errors->has('telepon'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telepon') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Upload Foto KTP') }}</label>

                            <div class="col-md-6">
                                <input id="foto" type="file" class="form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}" name="foto" value="{{$user->foto}}" required>{{ $user->foto}}<p style="color: red;">*Max 2048KB|jpeg,png,jpg</p>

                                @if ($errors->has('foto'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('foto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                 
                                <button type="reset" value="Reset Form" class="btn btn-warning">
                                    {{ __('Reset') }}
                                </button>
                                <a  href="{{ url('/') }}" type="submit" class="btn btn-danger">
                                    {{ __('Kembali') }}
                                </a>
                            </div>

                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
 <script type="text/javascript">
    jQuery(document).ready(function ()
    {
            var provinsi = '{{$user->provinsi}}'
            var kabupaten = '{{$user->kabupaten}}'
            var kecamatan = '{{$user->kecamatan}}'
            var kelurahan = '{{$user->kelurahan}}'
            $('#select_provinsi').val(provinsi);
            if($('#select_provinsi').val()){
                getKabupaten(provinsi, kabupaten)

                if($('#select_kabupaten').val()){
                    getKecamatan(kabupaten, kecamatan)
                    $('#select_kecamatan').val(kecamatan);

                    if(kecamatan){
                        getKelurahan(kecamatan, kelurahan)
                        $('#select_kelurahan').val(kelurahan);
                    }
                }
            }

            jQuery('select[name="provinsi"]').on('change',function(){
                getKabupaten(jQuery(this).val())
            });


            jQuery('select[name="kabupaten"]').on('change',function(){
                getKecamatan(jQuery(this).val())
            });
            jQuery('select[name="kecamatan"]').on('change',function(){
               getKelurahan(jQuery(this).val())
            });


    });

    function getKabupaten(provinsiID, kabupatenId = 0){
       if(provinsiID){
          jQuery.ajax({
             url : 'getkabupaten/' +provinsiID,
             type : "GET",
             dataType : "json",
             success:function(data)
             {
                jQuery('select[name="kabupaten"]').empty();
                jQuery('select[name="kecamatan"]').empty();
                jQuery('select[name="kelurahan"]').empty();

                $('select[name="kabupaten"]').append('<option> Pilih kabupaten <option>');

                jQuery.each(data, function(key,value){
                   $('select[name="kabupaten"]').append('<option value="'+ key +'">'+ value +'</option>');

                });

                if(kabupatenId){
                    $('#select_kabupaten').val(kabupatenId)
                }
             }
          });
       }else{
          $('select[name="kabupaten"]').empty();
          $('select[name="kecamatan"]').empty();
          $('select[name="kelurahan"]').empty();

       }
    }

    function getKecamatan(kabupatenId, kecamatanId = 0){
       if(kabupatenId){
              jQuery.ajax({
                 url : 'getkecamatan/' +kabupatenId,
                 type : "GET",
                 dataType : "json",
                 success:function(data)
                 {
                    jQuery('select[name="kecamatan"]').empty();
                    jQuery('select[name="kelurahan"]').empty();
                    $('select[name="kecamatan"]').append('<option value="">Pilih Kecamatan</option>');

                    jQuery.each(data, function(key,value){
                       $('select[name="kecamatan"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });

                    if(kecamatanId){
                        $('#select_kecamatan').val(kecamatanId)
                    }
                 }
              });
           }else{
              $('select[name="kecamatan"]').empty();
              $('select[name="kelurahan"]').empty();
           }
    }

    function getKelurahan(kecamatanId, kelurahanId = 0){
        if(kecamatanId){
          jQuery.ajax({
             url : 'getkelurahan/' +kecamatanId,
             type : "GET",
             dataType : "json",
             success:function(data)
             {
                jQuery('select[name="kelurahan"]').empty();
                $('select[name="kelurahan"]').append('<option value="">Pilih Kelurahan</option>');

                jQuery.each(data, function(key,value){
                   $('select[name="kelurahan"]').append('<option value="'+ key +'">'+ value +'</option>');
                });

                if(kelurahanId){
                    $('#select_kelurahan').val(kelurahanId)
                }
             }
          });
       }else{
          $('select[name="kelurahan"]').empty();
       }
    }
    </script>
@endsection
