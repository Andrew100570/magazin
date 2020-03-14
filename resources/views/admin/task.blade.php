@extends('admin.base')
@section('main-content')
    <div class="col-lg-4">
        <ul >


            <li>
                <form method="POST" action="">
                    <div class="form-row mb-3">
                        <label for="name">Название задачи</label>
                        <input name="name" type="text" class="form-control">
                    </div>
                    <div class="form-row">
                        <label for="email">Статус задачи</label>
                        <select>
                            @foreach($statuses as  $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Создать задачу</button>
                </form>
            </li>
        </ul>

    </div>
@endsection