<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body class="bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-5 p-3 bg-light shadow br-int fit">
                @if (Session::get('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif

                @if (Session::get('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
                @endif

                <div class=" p-3 br-int">
                    <span>New task</span>
                    <hr>
                    <form action="addtask" method="post">
                        @csrf
                        <input type="text" name="task_name" class="form-control" placeholder="Write a task..." value="{{ old('task_name') }}">
                        <span style="color:red">@error('task_name'){{ $message }} @enderror</span>
                        <br>
                        <button type="submit" class="btn btn-outline-dark"> &plus; Add task </button>
                    </form>
                </div>


            </div>

            <div class="col-md-2"></div>

            <div class="col-md-5 br-int long shadow bg-light">
                <div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tasks</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $setTask)
                            <tr>
                                <td> {{ $setTask->taskName }} </td>
                                <td> <a href="delete/{{ $setTask->id }}" class="btn btn-danger"> Delete &times; </a> </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-md-5 p-3 bg-light br-int shadow">
                <span><b>Settings</b></span> <img draggable="false" src="{{ asset('icons/settings.svg') }}" alt="settings icons">
                <hr>

                <div class="row pl-2">
                    <h6> Langugage: English </h6>
                </div>
            </div>
        </div>

    </div>
</body>

</html>