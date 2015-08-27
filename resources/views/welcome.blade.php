@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <section>This is appended to the master sidebar 1.</section>
    <section>This is appended to the master sidebar 2.</section>
    <section>This is appended to the master sidebar 3.</section>
    <section>This is appended to the master sidebar 4.</section>
    <section>This is appended to the master sidebar 5.</section>
    <section>This is appended to the master sidebar 6.</section>
    <section>This is appended to the master sidebar 7.</section>
@endsection

@section('content')
    <div id="scores"></div>
@endsection
