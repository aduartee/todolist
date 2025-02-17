@extends('layouts.menu')
@section('title', 'Home')

@section('content')
<div class="container mx-auto px-4 bg-black text-white mt-10 w-6/12 h-lvh mb-10 rounded-lg p-10">
    <h1 class="text-xl font-bold ms-3 text-center">Add your task</h1>

    <div id="register-task-component">
        <register-task></register-task>
    </div>

    <div id="list-tasks-component">
        <list-tasks></list-tasks>
    </div>
</div>
@endsection

@vite('resources/js/registerTaskComponent.js')
@vite('resources/js/listTasksComponent.js')