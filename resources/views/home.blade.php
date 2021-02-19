@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                  
                  
  <div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h4 style="text-align: center;" class="card-title">PENDAFTAR TOTAL</h4>
        <h5 style="text-align: center;" class="card-text center">{{$countTotal}}</h5>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h4 style="text-align: center;" class="card-title">PENDAFTAR HARI INI</h4>
        <h5 style="text-align: center;" class="card-text">{{$countTotalDay}}</h5>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 style="text-align: center;" class="card-title">PENDAFTAR BULAN INI</h5>
        <h4 style="text-align: center;"class="card-text">{{$countTotalMonth}}</h4>
      </div>
    </div>
  </div>

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
