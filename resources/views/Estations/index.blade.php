@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-left">
        <a href="{{ route('estationAdd') }}">
            <button type="button" class=" ml-4 btn btn-primary">Додати станцію</button>
        </a>
    </div>
    <br>
    <div class="container">
        <form class="form-inline" method="GET" action="{{ route('estationsFiltered') }}">
            {{ csrf_field() }}

            <div class="form-row align-items-center">
                <div class="col-auto">

                <select name="city" id="city" class="form-control">
                    <option disabled selected>Виберіть місто</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{$city->name}}</option>
                    @endforeach
                </select>
                </div>
                <div class="col-auto">
                    <div class="form-group form-check">
                        <input type="hidden" name="isOpen" value="0" class="form-check-input" id="isOpen">
                        <input type="checkbox" name="isOpen" value="1" class="form-check-input" id="isOpen">
                        <label class="form-check-label" for="isOpen">Показати тільки відкриті</label>
                    </div>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2">Вибрати</button>
                    <a href="{{ route('estations') }}">
                        <button type="button" class="ml-3 btn btn-danger mb-2">Скинути</button>
                    </a>
            </div>
            </div>

        </form>

    </div>

    <div class="container">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Місто</th>
                <th scope="col">Адреса</th>
                <th scope="col">Робочі години</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($stations as $station)
                <tr>
                    <td>{{ $station->getCityName->name }}</td>
                    <td>{{ $station->streetName }}, {{ $station->buildingNumber }}</td>
                    <td>{{ $station->openingTime }}.00 - {{ $station->closingTime }}.00</td>
                <td>
                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Операція
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="{{ route('estationShow', $station->id) }}">Редагувати</a>
                        <a class="dropdown-item" href="{{ route('estationDelete', $station->id) }}">Видалити</a>
                    </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

    <div class="d-flex justify-content-center">
        {{ $stations->links() }}
    </div>



@endsection
