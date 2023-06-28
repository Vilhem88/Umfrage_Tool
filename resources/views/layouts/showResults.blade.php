@extends('master')
@section('content')
<a href="{{ route('home.index') }}">back</a>
<h3>Total Voters: {{ $voters }}</h3>

<table class="table">
    <thead>
      <tr>
        <th scope="col">Answer</th>
        <th scope="col">Votes in %</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($results as $key => $result )
        <tr>
            <th scope="row">{{ $key }}</th>
            <td><div class="text-center" style="background-color: green; width:{{ $result }}%;">{{ $result }}%</div></span></td>
        </tr>
        @endforeach
    </tbody>
  </table>    
@endsection