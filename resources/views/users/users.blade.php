@extends('layouts.app')

@section('content')



    <h1 class="mt-3">Kullanıcılar</h1>
    <div class="row mb-3">
        @foreach($users as $user)
            <div class="col-md-3 mt-2">
                <div class="card" >
                    <div class="card-body">
                        <h4 class="card-title">{{ $user->first_name}} {{ $user->last_name}}</h4>
                        <p class="card-title">{{ $user->email}}</p>
                        <p class="card-title badge-dark ">{{ $user->user_type}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $users->links() }}
@endsection
