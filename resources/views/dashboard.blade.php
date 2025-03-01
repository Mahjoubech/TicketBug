@extends('layouts.layout')
@section('content')

  <!-- Main content -->
  <div class="flex-grow p-6">

    @include('layouts.head')
    @include('shared.statistiq')

        @include('shared.search')

        @include('shared.fillter')

        @include('shared.teckettable')
     </div>

     @include('shared.cmmnter')

    @include('shared.sub_teck')
@endsection
