<h1>Customers</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="">
                <h2>Search content in database using Laravel</h2>
                <div class="form-group">
                    <input type="text" name="names" placeholder="Search by name and surname" class="form-control"/>
                    <input type="text" name="other" placeholder="Search by 'blocked', 'email', and 'phone'" class="form-control"/>
                    <input type="submit" class="btn btn-primary" value="Search"/>
                </div>
            </form>
        </div>
        <div class="col-md-10">
            <table class="table">
                @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->blocked }}</td> 
                    <td>{{ $customer->lastname }}</td> 
                    <td>{{ $customer->phone }}</td> 
                    <td>{{ $customer->email }}</td> 
                    <td>{{ $customer->registration_date }}</td>
                </tr>
                @endforeach
            </table>
            {{ $customers->links() }}
        </div>
    </div>
</div>