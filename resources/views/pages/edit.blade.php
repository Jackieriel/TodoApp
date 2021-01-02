@extends('layouts.app')

@section('title')
    Update
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{-- @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif --}}

                <div class="card card-new-task">
                    <div class="card-header"><h3><a href="{{url('/')}}">Todos</a></h3></div>
                </div>
                <div class="card">
                    <div class="card-header">Update Todo</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <td class="">
                                    <form class="full-form-width" method="POST" action="{{ route('todo.update', $todo->id) }}">
                                        @csrf
                                        <div class="form-group">
                                            {{-- <label for="task">Task</label> --}}
                                            <input id="task" name="task" type="text" value="{{$todo->task}}"  
                                                required />
                                            {{-- errors --}}
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
