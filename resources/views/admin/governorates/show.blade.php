@extends('admin.index')
@section('content')

    <main class="mdl-layout__content">
        <div class="mdl-grid ui-cards">
            <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
                <h3>Basic cards</h3>
            </div>

            <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">       {{$record->name}}
</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                      <small>Cities</small>
                      @foreach($cities as $record)
                        <p>{{$record->name}}</p>
                      @endforeach
                    </div>
                </div>
            </div>


@endsection
