@extends('layouts.dashboard')
@section('content')
@section('breadcrumb')
<x-breadcrumb :items="[
    ]" />
@endsection
@role('user')
@include('dashboard.userIndex')
@endrole

@role('superadmin|admin')
@include('dashboard.adminIndex')
@endrole
@endsection