<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Percentile</title>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <h2>
                    Percentile
                </h2>
                <div>
                    @if (isset($errors) && count($errors) > 0)
                        @foreach ($errors as $error)
                            <div>
                                {{ $error }}
                            </div>  
                        @endforeach                      
                    @endif
                    @if (isset($students) && count($students) === 0)
                        No students data is present in file
                    @else
                        <table>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Score</th>
                                <th>Percentile</th>
                            </tr>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student['id'] }}</td>
                                    <td>{{ $student['name'] }}</td>
                                    <td>{{ $student['score'] }}</td>
                                    <td>{{ $student['percentile'] }}</td>
                                </tr>  
                            @endforeach                          
                        </table>
                    @endif  

                </div>
            </div>
        </div>
    </body>
</html>
