@extends('errors::minimal')

@section('title', __('errors.http.403.title'))
@section('code', '403')
@section('message', $exception->getMessage() ? __($exception->getMessage()) : __('errors.http.403.message'))
