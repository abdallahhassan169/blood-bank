@extends('admin.index')
@section('content')
<div>
            <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                    </div>
                    <div class="mdl-card__supporting-text no-padding">
                        <table class="mdl-data-table mdl-js-data-table">
                          <li class="mdl-list__item">

                            <tbody>

                              <form method="get">
                                  <input type="text" name='name'></input>
                                  <button type="submit">search</button>

                              </form>
                            @include('flash::message')
                            @foreach($records as $records)
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric">{{$loop->iteration}}</td>
                                    <td class="mdl-data-table__cell--non-numeric">{{$records->phone}} </td>
                                    <td class="mdl-data-table__cell--non-numeric">{{$records->name}}
                                    </td>
                                    <td class="mdl-data-table__cell--non-numeric">{{$records->e_mail}}
                                    </td>

                                    <td>
                                      <form class="blog-confirm" action="{{route('donation_request.destroy',$records->id)}}" method="post">
                                        {{ csrf_field() }}
                                       {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-primary">delete</button>
                                  </form>
                                 </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>

@endsection
