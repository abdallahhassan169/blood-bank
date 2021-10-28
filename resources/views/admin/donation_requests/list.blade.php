@extends('admin.index')
@section('content')

            <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <h1 class="mdl-card__title-text">List of Donation Requests</h1>
                    </div>

                                                  <form method="get">
                                                      <input type="text" name='name'></input>
                                                      <button type="submit">search</button>

                                                  </form>
                    <div class="mdl-card__supporting-text no-padding">
                        <table class="mdl-data-table mdl-js-data-table">
                          <li class="mdl-list__item">

                            <tbody>
                            @include('flash::message')
                            @foreach($records as $records)
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric">{{$loop->iteration}}</td>
                                    <td class="mdl-data-table__cell--non-numeric">{{$records->patient_phone}} </td>
                                    <td class="mdl-data-table__cell--non-numeric">{{$records->created_at}}
                                    </td>
                                    <td class="mdl-data-table__cell--non-numeric">{{$records->patient_name}}
                                    </td>

                                    <td>
                                      <form class="blog-confirm" action="{{route('donation_request.destroy',$records->id)}}" method="post">
                                        {{ csrf_field() }}
                                       {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-primary">delete</button>

                                  </form>
                                  </td>
                                  <td>
                                                                   <a href="{{route('donation_request.show',$records->id)}}">
                                                                   <button type="submit" class="btn btn-primary">show</button>
                                                                 </a>
                                 </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
@endsection
