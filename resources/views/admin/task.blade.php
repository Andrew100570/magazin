@extends('admin.base')
@section('main-content')
    <div style="width: 100%">
        <ul class="table-style">

            <li style="width: 100%" >

                <table style="width: 80%" border="1">
                    <tr >
                        @foreach($statuses as $status)
                            <th >{{ $status->name }}</th>
                        @endforeach
                    </tr>
                    <tr >
                        <td >
                            <ul class="table-style-ul" >
                            @foreach($taskOne as $taskOnes)
                               <li style="list-style-type: none;">
                                   <ul class="table-style">
                                       <li>{{ $taskOnes->title }}</li>
                                       <li>{{ $taskOnes->description }}</li>
                                       <li><a href="{{route('admin.editing',['id' => $taskOnes->id])}}">Редактировать</a></li>
                                       <li>Кол-во комментариев:</li>
                                   </ul>
                                   </li>
                            @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul class="table-style-ul" >
                            @foreach($taskTwo as $taskTwos)
                                    <li style="list-style-type: none;">
                                        <ul class="table-style">
                                            <li>{{ $taskTwos->title }}</li>
                                            <li>{{ $taskTwos->description }}</li>
                                            <li><a href="{{route('admin.editing',['id' => $taskTwos->id])}}">Редактировать</a></li>
                                            <li>Кол-во комментариев:</li>
                                        </ul>
                                    </li>
                            @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul class="table-style-ul" >
                            @foreach($taskThree as $taskThrees)
                                    <li style="list-style-type: none;">
                                        <ul class="table-style">
                                            <li>{{ $taskThrees->title }}</li>
                                            <li>{{ $taskThrees->description }}</li>
                                            <li><a href="{{route('admin.editing',['id' => $taskThrees->id])}}">Редактировать</a></li>
                                            <li>Кол-во комментариев:</li>
                                        </ul>
                                    </li>
                            @endforeach
                            </ul>
                        </td>
                    </tr>

                </table>
            </li>



            <li class="table-style-ul">
                <form method="POST" action="{{route('admin.saveTask')}}">
                    {{csrf_field()}}
                    <div class="form-row mb-3">
                        <label for="title">Название задачи</label>
                        <input name="title" type="text" class="form-control">
                    </div>
                    <div class="form-row">
                        <label for="status">Статус задачи</label>
                    </div>
                    <div class="form-row">
                        <select name="status">
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row">
                        <label for="description">Описание задачи</label>
                    </div>
                        <div class="form-row mb-3">
                        <textarea type="text" name="description"></textarea>
                    </div>
    <div class="form-row mb-3">
                    <button type="submit" class="btn btn-primary">Создать задачу</button>
             </div>
        </form>
            </li>
        </ul>

    </div>
@endsection