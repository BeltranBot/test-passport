@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <div>
                      <button id="user">user</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous">
</script>
<script>
  /* globals $ */ 

  $(function () {
    var token = $('meta[name="csrf-token"]').attr('content')

    $('#user').on('click', function (event) {
      $.ajax({
        url: '/api/user',
        headers: {
          'X-CSRF-TOKEN': token,
          'X-Requested-With': 'XMLHttpRequest',
        },
        dataType: 'json',
        success: function (data) {
          console.log('sucess', data)          
        },
        error: function (err) {
          console.log('error', err)
        }
      })
    })
  })
</script>

@endsection
