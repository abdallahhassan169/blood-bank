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
                                    <form action="{{route('roles.update',record->id)}}" method="post" class="form">
                                      {{ csrf_field() }}
                                      {{ method_field('PATCH') }}                                          <div class="form__article">
                                            <h3>update the Role</h3>

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
                                            @foreach($perm->all() as $permission)
                                            <div class="form-check form-check-inline">
                                              <input class="form-check-input" type="checkbox" name="permissions[]"  >
                                              {{$permission->name}}
                                              <hr>
                                            </div>
                                            @endforeach

                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" type="submit">
                                                <i class="material-icons">create</i>
                                                Update Role
                                            </button>


                                    </form>



@endsection
