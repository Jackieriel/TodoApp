@extends('layouts.app')

@section('title')
    Todo
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-new-task">
                    <div class="card-header">
                        <h3><a href="{{ url('/') }}">Todos</a></h3>
                    </div>

                    {{-- Flash messages --}}
                    <x-flashMessage />

                    <div class="card-body">
                        <form method="POST" action="{{ route('todos.store') }}">
                            @csrf
                            <div class="form-group full-form-width">
                                <label for="task">Add New Todo</label>
                                <input id="task" name="task" type="text" placeholder="Todo" autocomplete="off" required />
                                {{-- errors --}}
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Tasks</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            @foreach ($todos as $todo)
                                <tr>
                                    <td>
                                        @if ($todo->completed)
                                            <s>{{ $todo->task }}</s>
                                        @else
                                            {{ $todo->task }}
                                        @endif
                                    </td>

                                    <td class="text-right">
                                        @if (!$todo->completed)
                                            <a href="{{ route('todo.completed', $todo->id) }}"
                                                class="text-primary">Uncompleted!</a>

                                        @else
                                            <a href="{{ route('todo.uncompleted', $todo->id) }}"
                                                class="text-success">Completed!</a>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-primary btn-inline">
                                            Update </a>
                                        <a href="{{ route('todo.delete', $todo->id) }}" class="btn btn-danger btn-inline"
                                            onclick="return confirm('Are you sure want to delete this task?')"> x </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        {{-- {{ $todos->links() }} --}}
                        {{ $todos->appends(Request::all())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
