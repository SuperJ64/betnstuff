@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Games</a>
            </li>
            <li class="breadcrumb-item active">My Games</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">Games</div>
            <div class="card-body">

                @if($games->isEmpty())
                    You are not currently playing in any games
                @else
                    <dl>
                        @foreach($games as $game)
                            <dt>{{ $game->name }}</dt>
                        @endforeach
                    </dl>
                @endif
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
    <!-- /.container-fluid-->

@endsection
