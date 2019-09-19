<!-- @extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
ZZZZZZZZZZZZZZZZZZ

        <!-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div> -->

        <div class="container">
        @if(isset($details))
            <h5> The Search results for<b> {{ $query }} </b> are :</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Genre</th>
                        <th>Developer</th>
                        <th>OS</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($details as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->description}}</td>
                        <td>{{$user->genre}}</td>
                        <td>{{$user->developer}}</td>
                        <td>{{$user->os}}</td>
                        <td>{{$user->date}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    
    </div>
</div>
@endsection
 -->