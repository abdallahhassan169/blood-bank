@extends('admin.index')
@section('content')

        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-card mdl-shadow--2dp employer-form" action="">
                <div class="mdl-card__title">
                    <h2>Form</h2>
                    <div class="mdl-card__subtitle">for name</div>
                </div>

                                <div class="mdl-card__supporting-text">
                                    <form action="{{route('cities.store')}}" method="post" class="form">
                                      @csrf
                                        <div class="form__article">
                                            <h3>enter the name of the city</h3>
                                            <div>
                                            <select name="governorate_id" for"governorate_id" id="capital" class="form-control my-3">
                                                <option >governorate</option>
                                                @foreach($governorates as $governorate)
                                                  <option value="{{$governorate->id}}">{{$governorate->name}}</option>
                                                @endforeach
                                            </select>
                                          </div>
                                                <div class="mdl-cell mdl-cell--6-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                    <input class="mdl-textfield__input" type="text"  name="name"  id="gov_name"/>
                                                    <label class="mdl-textfield__label" for="name" required>city name</label>
                                                </div>
                                  @include('parts.validations_errors')
                                            </div>
                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal" type="submit">
                                                <i class="material-icons">create</i>
                                                ADD City
                                            </button>


                                    </form>



@endsection
