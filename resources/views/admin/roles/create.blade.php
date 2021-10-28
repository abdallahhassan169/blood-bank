@extends('admin.index')
@section('content')
@inject('perm','App\Permission')
        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-card mdl-shadow--2dp employer-form" action="">
                <div class="mdl-card__title">
                    <h2>Form</h2>
                    <div class="mdl-card__subtitle">for name</div>
                </div>

                                <div class="mdl-card__supporting-text">
                                    <form action="{{route('roles.store')}}" method="post" class="form">
                                      @csrf
                                        <div class="form__article">
                                            <h3>create the Role</h3>

                                          <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text"  name="name"  id="name"/>
                                                  <label class="mdl-textfield__label" for="name" required>name</label>
                                            </div>
                                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <input class="mdl-textfield__input" type="text"  name="guard_name"  id="guard_name"/>
                                                    <label class="mdl-textfield__label" for="guard_name" >guard name</label>
                                                </div>
                                  @include('parts.validations_errors')
                                            </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permission:</strong>
            <br/>
            @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
        </div>
    </div>
</div>

                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" type="submit">
                                                <i class="material-icons">create</i>
                                                ADD Role
                                            </button>
                                            {!! Form::close() !!}


                                    </form>



@endsection
