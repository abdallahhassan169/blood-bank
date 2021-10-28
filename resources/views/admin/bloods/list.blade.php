@extends('admin.index')
@section('content')

            <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h1 class="mdl-card__title-text">List of blood types</h1>
                    </div>
                    <div class="mdl-card__supporting-text no-padding">
                        <table class="mdl-data-table mdl-js-data-table">
                          @can('bloods-create')
                          <li class="mdl-list__item">
                            <a href="{{route('bloods.create')}}">
                              <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal">
                                  <i class="material-icons">create</i>
                                  Create blood type
                              </button>
                            </a>
                            @endcan
                            <tbody>
                            @include('flash::message')
                            @foreach($record as $record)
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric">{{$loop->iteration}}</td>
                                    <td class="mdl-data-table__cell--non-numeric">{{$record->name}} </td>
                                    <td class="mdl-data-table__cell--non-numeric">
                                      @can('bloods-edit')
                                      <a href="{{route('bloods.edit',$record->id)}}">
                                    <span class="label label--mini background-color--primary">edit</span>
                                      </a>
                                      @endcan
                                    </td>

                                    <td>
                                      <form class="blog-confirm" action="{{route('bloods.destroy',$record->id)}}" method="post">
                                        {{ csrf_field() }}
                                       {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-primary">delete</button>
                                  </form>

                                 </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>



@endsection
