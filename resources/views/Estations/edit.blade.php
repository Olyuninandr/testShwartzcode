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
                        <input type="time" name="openingTime" id="openingTime" class="form-control" value="{{ $city->openingTime }}">
                </div>
                <div class="col">
                    <label for="closingTime">по:</label>
                        <input type="time" name="closingTime" id="closingTime" class="form-control" value="{{ $city->closingTime }}">
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
