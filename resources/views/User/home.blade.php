@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  @if(Auth::user()->email != 'admin@admin.com')
                    <ul class="list-group">
                      <li class="list-group-item">User         : {{Auth::user()->generate_code}}</li>
                      <li class="list-group-item">NIK          : {{Auth::user()->nik}}</li>
                      <li class="list-group-item">Nama Depan  : {{Auth::user()->first_name}}</li>
                      <li class="list-group-item">Nama Belakang    : {{Auth::user()->last_name}}</li>
                      <li class="list-group-item">Tempat Lahir : {{Auth::user()->tempat_lahir}}</li>
                      <li class="list-group-item">Jenis Kelamin : {{Auth::user()->jk}}</li>
                      <li class="list-group-item">Provinsi      : {{$prov->provinsi}}</li>
                      <li class="list-group-item">Kabupaten/Kota: {{$kab->kabupaten}}</li>
                      <li class="list-group-item">Kecamatan     : {{$kec->kecamatan}}</li>
                      <li class="list-group-item">Kelurahan     : {{$kel->kelurahan}}</li>
                      <li class="list-group-item">Alamat       : {{Auth::user()->alamat}}</li>
                      <li class="list-group-item">Status       : {{Auth::user()->status}}</li>
                      <li class="list-group-item">Telepon      : {{Auth::user()->telepon}}</li>
                      <li class="list-group-item">Email        : {{Auth::user()->email}}</li>
                      <li class="list-group-item"><img width="150px" src="{{ url('/data_file/'.Auth::user()->foto) }}"></li>
                    </ul>    
                    @else           
<div class="modal fade" id="messageBoard" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content message-modal">
            
        </div>
    </div>
</div>


                    <div class="table-responsive">

                <table class="table">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Kode User</th>
                      <th>NIK</th>
                      <th>Nama</th>
                   
                      <th>Telepon</th>
                      <th>Email</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php($no = 1 )

                    
                    @foreach($user as $users)
                    @if($users->email != 'admin@admin.com')
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$users->generate_code}}</td>
                      <td>{{$users->nik}}</td>
                      <td>{{$users->first_name}} {{$users->last_name}}</td>
                   
                      <td>{{$users->telepon}}</td>
                          
                          
                      <td>{{$users->email}}</td>
                      <td>

                      <a data-toggle="modal" id="getMessage" class="btn btn-primary btn-rounded m-b-10 m-1-5" data-target="#messageBoard" data-url="{{ route('showUser',['id'=>$users->id])}}" href="#."> Selengkapnya </a>
                      
                      <a href="{{ route('editUser',[$users->id]) }}"  class="btn btn-warning btn-rounded m-b-10 m-l-5">  <i class="fa fa-trash-o">Edit</i></a>



                      <a href="{{ route('deleteUser',[$users->id]) }}"  class="btn btn-danger btn-rounded m-b-10 m-l-5" onclick="return confirm('Hapus data ?')">  <i class="fa fa-trash-o">Hapus</i></a>
                     </td>
                    </tr>
                    @endif
                    
                    @endforeach
                  </tbody>
                </table>
            </div>
                @endif

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  $(document).on('click', '#getMessage', function(e){
        e.preventDefault();
        var url = $(this).data('url');
        $('.message-modal').html(''); 
        $('#modal-loader').show();     
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html'
        })
        .done(function(data){
           // console.log(data);  
            $('.message-modal').html('');    
            $('.message-modal').html(data); // load response 
            $('#modal-loader').hide();        // hide ajax loader   
        })
        .fail(function(){
            $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
            $('#modal-loader').hide();
        });
    });

</script>
@endsection
