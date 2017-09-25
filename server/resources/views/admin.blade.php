@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin') }}">Admin</a>
            </li>
            <li class="breadcrumb-item active">Admin</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <h4 class="pull-left">Games</h4>
                <div class="pull-right">
                    <a href="{{ route('create.game') }}" class="btn btn-outline-primary">Create Game</a>
                </div>
            </div>
            <div class="card-body">

                @if($games->isEmpty())
                    You have not created any games
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
