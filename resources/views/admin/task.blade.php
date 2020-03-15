@extends('admin.base')
@section('main-content')
    <div class="col-lg-4">
        <ul >


            <li>
                <form method="POST" action="{{route('admin.saveTask')}}">
                    {{csrf_field()}}
                    <div class="form-row mb-3">
                        <label for="title">Название задачи</label>
                        <input name="title" type="text" class="form-control">
                    </div>
                    <div class="form-row">
                        <label for="status">Статус задачи</label>
                        <select name="status">
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row mb-3">
                        <label for="description">Название задачи</label>
                        <textarea type="text" name="description">Описание</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Создать задачу</button>
                </form>
            </li>
        </ul>

    </div>
@endsection