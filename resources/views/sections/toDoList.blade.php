@extends('layout.layout')
@section('content')
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">

                    <div class="card">
                        <div class="card-body p-5">

                            <form action="{{route('create-task')}}" method="post"
                                  class="d-flex justify-content-center align-items-center mb-4">
                                @csrf
                                <div class="form-outline flex-fill">
                                    <input type="text" id="form2" name="name" class="form-control"/>
                                    <label class="form-label" for="form2">New task...</label>
                                </div>
                                <button type="submit" class="btn btn-info ms-2">Add</button>
                            </form>
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror

                        <!-- Tabs navs -->
                            @foreach($_GET as $getKey=>$getValue)
                                <ul class="nav nav-tabs mb-4 pb-2" id="ex1" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link @if($getKey === '/') active @endif" id="ex1-tab-1"
                                           data-mdb-toggle="tab" href="{{route('allToDo')}}"
                                           role="tab"
                                           aria-controls="ex1-tabs-1" aria-selected="true">All</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link @if($getKey === '/task-active') active @endif" id="ex1-tab-2"
                                           data-mdb-toggle="tab" href="{{route('activeTasks')}}"
                                           role="tab"
                                           aria-controls="ex1-tabs-2" aria-selected="false">Active</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link @if($getKey === '/task-done') active @endif" id="ex1-tab-3"
                                           data-mdb-toggle="tab" href="{{route('doneTasks')}}"
                                           role="tab"
                                           aria-controls="ex1-tabs-3" aria-selected="false">Completed</a>
                                    </li>
                                </ul>
                            @endforeach
                        <!-- Tabs navs -->

                            <!-- Tabs content -->
                            <table class="table mb-4">
                                <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Todo item</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1 ?>

                                @foreach($tasks as $task)
                                    <tr>
                                        <th scope="row">{{$no}}</th>
                                        <td>{{$task->name}}</td>
                                        <td>{{\App\Models\Tasks::getStatusLabel($task->done)}}</td>
                                        <td>
                                            @if($task->done)
                                                <a href="{{route('deleteTask',$task->id)}}" class="btn btn-danger"
                                                   style="">Delete</a>
                                            @else
                                                <a href="{{route('finishTask',$task->id)}}"
                                                   class="btn btn-success ms-1">Finished</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <?php $no++?>
                                @endforeach
                                </tbody>
                            </table>
                            @include('included.success-message')
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

