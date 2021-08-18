<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laravel 7 PDF Example</title>
    
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-3">Laravel HTML to PDF Example</h2>

        <div class="d-flex justify-content-end mb-4">
            
        </div>

        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">DOB</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quoteItems as $quoteItem)
                <tr>
                    <th scope="row">{{ $quoteItem->id }}</th>
                    <td>{{ $quoteItem->name1 }}</td>
                    <td>{{ $quoteItem->name2 }}</td>
                    <td>{{ $quoteItem->qty }}</td>
                    <td>{{ $quoteItem->quote_price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>

</html>