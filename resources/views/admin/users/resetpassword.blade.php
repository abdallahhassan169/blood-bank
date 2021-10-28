@extends('admin.index')
@section('content')

        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-card mdl-shadow--2dp employer-form" action="">
                <div class="mdl-card__title">
                    <h2>Form</h2>
                    <div class="mdl-card__subtitle">for name</div>
                </div>

                                <div class="mdl-card__supporting-text">
                                    <form action="{{route('updatepassword')}}" method="put" class="form">
                                      @csrf
                                        <div class="form__article">
                                            <h3>enter the name of the city</h3>

                                          <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input class="mdl-textfield__input" type="text"  name="governorate_id"  id="gov_name"/>
                                                  <label class="mdl-textfield__label" for="password" required>password</label>
                                            </div>
                                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <input class="mdl-textfield__input" type="text"  name="name"  id="gov_name"/>
                                                    <label class="mdl-textfield__label" for="new_password" required>new password</label>
                                                </div>

                                                    <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                        <input class="mdl-textfield__input" type="text"  name="name"  id="gov_name"/>
                                                        <label class="mdl-textfield__label" for="confirm_password" required>confirm password</label>
                                                    </div>
                                  @include('parts.validations_errors')
                                            </div>
                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" type="submit">
                                                <i class="material-icons">create</i>
                                                ADD City
                                            </button>


                                    </form>



@endsection
