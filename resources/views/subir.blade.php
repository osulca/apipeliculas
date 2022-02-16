<form method="post" action="/subir" enctype="multipart/form-data">
    <input type="file" name="archivo"/><br>
    <input type="submit" value="Guardar">
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

