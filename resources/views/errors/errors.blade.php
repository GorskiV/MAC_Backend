@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <ul style="list-style: none">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif