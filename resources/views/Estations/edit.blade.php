@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('estationUpdate', $estation->id) }}">
            {{ csrf_field() }}
            <div class="row">

                <div class="col">
                    <label for="streetName">Назва вулиці</label>
                    <input type="text" name="streetName" value="{{ $estation->streetName }}" class="form-control" id="streetName">
                </div>
                <div class="col">
                    <label for="buildingNumber">Номер</label>
                    <input name="buildingNumber" value="{{ $estation->buildingNumber }}" class="form-control" id="buildingNumber">
                </div>
                <div class="col">
                    <label for="cityId">Місто</label>
                    <select name="cityId" id="cityId" class="form-control">
                        <option value="{{$estation->cityId}}"
                                selected>{{$estation->getCityName->name}}</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{$city->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label for="openingTime">Часи роботи з:</label>
                    <select name="openingTime" id="openingTime" class="form-control">
                        @for($i=0; $i<=24; $i++)
                            <option value="{{ $i }}"
                                    @if($estation->openingTime == $i) selected @endif
                            >{{$i}}</option>
                        @endfor
                    </select>
                </div>
                <div class="col">
                    <label for="closingTime">по:</label>
                    <select name="closingTime" id="closingTime" class="form-control">

                        @for($i=0; $i<=24; $i++)
                            <option value="{{ $i }}"
                                    @if($estation->closingTime == $i) selected @endif>
                                {{$i}}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
            <br>
            <a href="{{$_SERVER['HTTP_REFERER']}}">
                <button type="button" class="btn btn-primary">Назад</button>
            </a>
            <button type="submit" class="ml-3 btn btn-success">Зберегти зміни</button>


        </form>
    </div>
@endsection
