@extends('admin.index')
@section('content')

    <main class="mdl-layout__content">
        <div class="mdl-grid ui-cards">
            <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
                <h3>Contact card</h3>
            </div>

            <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">from: {{$record->telephone}}</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                      <small>The contact</small>
                        <p>name:{{$record->name}} </p>
                        <p>email: {{$record->g_mail}} </p>
                        <p>phone: {{$record->telephone}} </p>
                        <p>send at: {{$record->created_at}} </p>
                        <p>Text:{{$record->text}} </p>
                    </div>
                </div>
            </div>


@endsection
