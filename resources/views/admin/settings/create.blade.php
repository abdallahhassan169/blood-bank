@extends('admin.index')
@section('content')
@include('flash::message')

        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-card mdl-shadow--2dp employer-form" action="">
                <div class="mdl-card__title">
                    <h2>Form</h2>
                    <div class="mdl-card__subtitle">for name</div>
                </div>

                                <div class="mdl-card__supporting-text">
                                    <form action="{{route('settings.store')}}" method="post" class="form">
                                      @csrf
                                        <div class="form__article">
                                            <h3>here you can set your settings</h3>

                                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <input class="mdl-textfield__input" type="text"  name="phone"  id="gov_name"/>
                                                    <label class="mdl-textfield__label" for="phone" required>phone</label>
                                                </div>

                                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <input class="mdl-textfield__input" type="text"  name="fb_link"  id="gov_name"/>
                                                    <label class="mdl-textfield__label" for="name" required>facebook link</label>
                                                </div>
                                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <input class="mdl-textfield__input" type="text"  name="whats_link"  id="gov_name"/>
                                                    <label class="mdl-textfield__label" for="whats_link" required>whats link</label>
                                                </div>

                                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <input class="mdl-textfield__input" type="text"  name="t_link"  id="gov_name"/>
                                                    <label class="mdl-textfield__label" for="t_link" required>twitter link</label>
                                                </div>

                                                  <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                      <input class="mdl-textfield__input" type="text"  name="setting_text"  id="gov_name"/>
                                                      <label class="mdl-textfield__label" for="settings_text" required>settings text</label>
                                                  </div>

                                                    <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                        <input class="mdl-textfield__input" type="text"  name="email"  id="gov_name"/>
                                                        <label class="mdl-textfield__label" for="email" required>google mail</label>
                                                    </div>

                                                    <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                          <input class="mdl-textfield__input" type="text"  name="about_app"  id="gov_name"/>
                                                          <label class="mdl-textfield__label" for="about_app" required>about app</label>
                                                    </div>
                                  @include('parts.validations_errors')
                                            </div>
                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" type="submit">
                                                <i class="material-icons">create</i>
                                                set
                                            </button>


                                    </form>



@endsection
