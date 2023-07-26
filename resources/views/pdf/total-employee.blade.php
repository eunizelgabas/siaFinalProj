<html>
    <head>
        <title>Expense Summary</title>

    </head>
    <style>
        *{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 13pt;
        }

        h1{
            font-size: 22pt;

        }

        table{
            border-collapse: collapse;

        }
        table th, table td{
            padding:2px;
            border: 1px solid #333;
        }

    </style>

    <body>
        <div style="text-align:center; padding-bottom:12pt; border-bottom: 1px solid #333">
            <strong>Expense Tracker Manager</strong> <br>
            {{-- <img src="{{public_path('images/mdc-logo.jpg')}}" style="height: 100px; justify-center" alt="MDC Bank, Inc."><br> --}}

        </div>

        <h1 style="padding-bottom: 10pt; border-bottom: 1px solid #333">Employee Summary</h1>

        <table>
            @foreach ($employees as $employee )
            <tr>
                <th>Name</th>
                <td>{{$employee->last_name}}, {{$employee->first_name}}</td>
            </tr>
            <tr>
                <th>Department</th>
                <td>{{$employee->department}}</td>
            </tr>

            <tr>
                <th>Position</th>
                <td>{{$employee->position}}</td>
            </tr>

            <tr>
                <th>Phone Number</th>
                <td>{{$employee->phone_no}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$employee->email}}</td>
            </tr>
            <br>
            <table style=" width: 100%">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Expense</th>
                        <th>Description</th>
                        <th>Amount</th>
                    </tr>
                </thead>

                <tbody >
                     @foreach ($employee->expenses as $txn )
                    <tr>
                        <td>
                            {{$txn->date}}
                        </td>
                        <td style="text-align: right">
                            {{$txn->name}}
                        </td>
                        <td style="text-align: right">
                            {{$txn->description}}
                        </td>
                        <td style="text-align: right">
                            {{$txn->amount}}
                        </td>

                    </tr>

                @endforeach

                </td>
                </tbody>
            </table>
            <hr>
            @endforeach


        </table>



        <hr>


    </body>
</html>
