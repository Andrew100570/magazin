@extends('admin.base')
@section('main-content')
        <form method="POST" action="{{route('admin.change')}}">
                {{csrf_field()}}
                <div class="form-row mb-3">
                        <label for="title">{{ $task->title }}</label>
                </div>
                <div class="form-row">
                <label for="title">Изменить название задания</label>
                </div>
                <div class="form-row mb-3">
                <input name="title" type="text" class="form-control">
                </div>
                <div class="form-row">
                        <label for="description">Изменить описание задачи</label>
                </div>
                <div class="form-row mb-3">
                        <textarea type="text" name="description"></textarea>
                </div>
                <div class="form-row">
                    <label for="status">Изменить статус задачи</label>
                </div>
                <div class="form-row">
                    <input name="id" type="hidden" value="{{ $task->id }}" class="form-control">
                        <select name="status">
                                @foreach($statuses as $status)
                                        <option value="{{ $status->id }}"  <?php if($task->id_status == $status->id) echo 'selected';?>>{{ $status->name }}</option>
                                @endforeach
                        </select>
                </div>
                <div class="form-row">
                        <label for="description">Добавить комментарий</label>
                </div>
                <div class="form-row mb-3">
                        <textarea type="text" name="comment"></textarea>
                </div>
                <div class="form-row">
                        <label for="description">Текущие комментарии</label>
                </div>
                <div class="form-row">
                        @foreach($comments as $comment)
                                @if($task->id == $comment->id_task)
                                        <label for="description">{{ $comment->id }}.</label>
                                        <span>{{ $comment->description }}</span>
                                @endif
                        @endforeach
                </div>

                <div class="form-row mb-3">
                    <button type="submit" class="btn btn-primary">Изменить данные</button>
                </div>
        </form>
        <a href="{{route('admin.task')}}">Вернуться на главную страницу</a>

@endsection