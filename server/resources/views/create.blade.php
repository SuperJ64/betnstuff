@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin') }}">Admin</a>
            </li>
            <li class="breadcrumb-item active">Create Game</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <h4 class="pull-left">Create Game</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('new.game') }}">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <label for="name">Pool Name</label>
                        <input class="form-control" id="name" type="text" aria-describedby="nameHelp"
                               placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="entry">Buy In</label>
                        <input class="form-control col-3" id="entry" type="number" placeholder="Weekly entry fee in credits">
                    </div>
                    <div class="form-group">
                        <select class="custom-select">
                            <option selected>Select a game type</option>
                            <option value="1">Default</option>
                            <option value="2">Ranking</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label" for="private">
                                <input class="form-check-input" type="checkbox" id="private">Private Game</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <h5>Payouts</h5>
                        <p>Set the percentage of the pool that gets payed out each week and for the end of the season.
                            For each payout schedule
                            the total percentage must equal 100%. In the weekly payouts schedule the value for season is
                            what gets carried over for the
                            season payouts. If season is 0% then there will be no payouts at the end of the season.
                            First must be greater then second etc.,
                            if you don't want a payout for a placing set the payout to 0.</p>
                        <div class="form-row">
                            <div class="col-5">
                                <legend class="col-form-legend">Weekly Payouts</legend>
                                <div class="form-group row">
                                    <label for="wfirst" class="col-sm-2 col-form-label">First</label>
                                    <div class="col-5 input-group">
                                        <input class="form-control" id="wfirst" type="number">
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="wsecond" class="col-sm-2 col-form-label">Second</label>
                                    <div class="col-5 input-group">
                                        <input class="form-control" id="wsecond" type="number">
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="wthird" class="col-sm-2 col-form-label">First</label>
                                    <div class="col-5 input-group">
                                        <input class="form-control" id="wthird" type="number">
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="season" class="col-sm-2 col-form-label">Season</label>
                                    <div class="col-5 input-group">
                                        <input class="form-control" id="season" type="number">
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <legend class="col-form-legend">Season Payouts</legend>
                                <div class="form-group row">
                                    <label for="sfirst" class="col-sm-2 col-form-label">First</label>
                                    <div class="col-5 input-group">
                                        <input class="form-control" id="sfirst" type="number">
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ssecond" class="col-sm-2 col-form-label">Second</label>
                                    <div class="col-5 input-group">
                                        <input class="form-control" id="ssecond" type="number">
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sthird" class="col-sm-2 col-form-label">First</label>
                                    <div class="col-5 input-group">
                                        <input class="form-control" id="sthird" type="number">
                                        <span class="input-group-addon">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('admin') }}" class="btn btn-outline-dark">Cancel</a>
                    </div>

                </form>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
    <!-- /.container-fluid-->

@endsection
