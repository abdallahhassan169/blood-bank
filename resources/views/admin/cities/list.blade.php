@extends('admin.index')
@section('content')


            <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h1 class="mdl-card__title-text">List of Cities</h1>
                    </div>

                                                  <form method="get">
                                                      <input type="text" name='name'></input>
                                                      <button type="submit">search</button>

                                                  </form>
                    <div class="mdl-card__supporting-text no-padding">
                        <table class="mdl-data-table mdl-js-data-table">
                          @can('category-delete')

                          <li class="mdl-list__item">
                            <a href="{{route('cities.create')}}">
                              <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal">
                                  <i class="material-icons">create</i>
                                  Create cities
                              </button>
                            </a>
                            @endcan
                            <tbody>
                              @include('flash::message')
@foreach($records as $record)
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric">{{$loop->iteration}}</td>
                                    <td class="mdl-data-table__cell--non-numeric">{{$record->name}} </td>
                                    <td class="mdl-data-table__cell--non-numeric"> </td>
                                    <td class="mdl-data-table__cell--non-numeric">
                                      @can('cities-edit')

                                      <a href="{{route('cities.edit',$record->id)}}">
                                    <span class="label label--mini background-color--primary">edit</span> </td>
                                  </a>
                                  @endcan
                                  @can('cities-delete')

                                    <td class="mdl-data-table__cell--non-numeric">
                                      <form class="blog-confirm" method="delete" action="{{route('cities.destroy',$record->id)}}">
                                        @endcan
                                    <td class="mdl-data-table__cell--non-numeric">
                                    <button type="submit" class="btn btn-primary">delete</span> </td>
                                  </form>
</td>
                                </tr>
@endforeach
                            </tbody>
                        </table>
                    </div>
@endsection
