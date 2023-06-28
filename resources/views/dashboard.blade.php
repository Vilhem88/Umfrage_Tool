@extends('master')
@section('content')
   @include('layouts.navbar')
    <div class="col-6 offset-2">
        <x-sessions/>
        <h2 class="text-center mb-3 mt-3" >Here you can create your own Question</h2>
        <form id="form" method="post" action="{{ route('questions.store') }}">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="" name="title">
                    </div>
                    @error('title')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="question" class="form-label">Question</label>
                        <input type="text" class="form-control @error('question') is-invalid @enderror" id="" name="question">
                    </div>
                    @error('question')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                      <x-dynamic-input/>
                      <x-dynamic-input/>
                    <div id="newRow"></div>
                    <button id="addRow" type="button" class="btn btn-info">Add Row</button>
                    <div class="text-center" >
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
