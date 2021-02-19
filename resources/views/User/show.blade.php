
<div class="modal-header">
<h4 class="modal-title">Profil User</h4>
 <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <div class="popupMessageContainer">
        <ul class="list-group">
                      <li class="list-group-item">User         : {{$user->generate_code}}</li>
                      <li class="list-group-item">NIK          : {{$user->nik}}</li>
                      <li class="list-group-item">Nama Depan   : {{$user->first_name}}</li>
                      <li class="list-group-item">Nama Belakang   : {{$user->last_name}}</li>
                      <li class="list-group-item">Tempat Lahir : {{$user->tempat_lahir}}</li>
                      <li class="list-group-item">Jenis Kelamin : {{$user->jk}}</li>
                      
                     
                      <li class="list-group-item">Alamat       : {{$user->alamat}}</li>
                      <li class="list-group-item">Provinsi     : {{$prov->provinsi}}</li>
                      <li class="list-group-item">Kabupaten    : {{$kab->kabupaten}}</li>
                      <li class="list-group-item">Kecamatan    : {{$kec->kecamatan}}</li>
                      <li class="list-group-item">Kelurahan    : {{$kel->kelurahan}}</li>
                      <li class="list-group-item">Status       : {{$user->status}}</li>
                      <li class="list-group-item">Telepon      : {{$user->telepon}}</li>
                      <li class="list-group-item">Email        : {{$user->email}}</li>
                      <li class="list-group-item"><img width="150px" src="{{ url('/data_file/'.$user->foto) }}"></li>
                    </ul> 
    </div>  
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
</div>
</div>