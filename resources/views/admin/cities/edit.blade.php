@extends('admin.index')
@section('content')

                <div class="mdl-card__supporting-text">
                    <form action="{{route('cities.update',$model->id)}}" method="post" class="form">
                      {{ csrf_field() }}
                     {{ method_field('PATCH') }}                  
                      <div class="form__article">
                            <h3>enter the name of the Governorate</h3>

                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text"  name="governorate_id"  id="gov_name"/>
                                    <label class="mdl-textfield__label" for="name" required>Governorate name</label>
                                </div>

                              <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                      <input class="mdl-textfield__input" type="text"  name="name"  id="gov_name"/>
                                      <label class="mdl-textfield__label" for="name" required>City name</label>
                                                      </div>
                  @include('parts.validations_errors')
                            </div>
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" type="submit">
                                <i class="material-icons">create</i>
                                ADD Governorate
                            </button>


                    </form>

@endsection
