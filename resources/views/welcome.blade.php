<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<div class="container">
    <h1>Calculator</h1>

    <form class="row g-3 flex-nowrap" method="POST" action="{{route('calculate')}}">
        @csrf
        <div class="col-auto">
            <label for="number_1" class="visually-hidden">Number 1</label>
            <input type="number" step="0.0000001" id="number_1" name="number_1"
                   class="form-control @if($errors->has('number_1')) is-invalid @endif"
                   placeholder="Number 1"
                   value="{{old('number_1')}}"
            />
            <div class="invalid-feedback">{{$errors->first('number_1')}}</div>
        </div>
        <div class="col-auto">
            <select class="form-select" aria-label="Default select example" name="operation">
                <option value="plus" @if(old('operation') === 'plus')selected @endif>+</option>
                <option value="minus" @if(old('operation') === 'minus')selected @endif>-</option>
                <option value="multiply" @if(old('operation') === 'multiply')selected @endif>*</option>
                <option value="divide" @if(old('operation') === 'divide')selected @endif>/</option>
            </select>
        </div>
        <div class="col-auto">
            <label for="number_2" class="visually-hidden">Number 2</label>
            <input type="number" step="0.0000001" id="number_2" name="number_2"
                   class="form-control @if($errors->has('number_2')) is-invalid @endif"
                   placeholder="Number 2"
                   value="{{old('number_2')}}"
            />
            <div class="invalid-feedback">{{$errors->first('number_2')}}</div>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">=</button>
        </div>
        <div class="col-auto">
            <label for="result" class="visually-hidden">Number 2</label>
            <input type="number" step="0.0000001" id="result" name="result"
                   class="form-control @if(session('error')) is-invalid @endif @if(session('result')) is-valid @endif"
                   placeholder="Result"
                   readonly
                   value="{{session('result')}}"
            />
            <div class="invalid-feedback">{{ session('error')}}</div>
        </div>
    </form>
</div>
</body>
</html>
