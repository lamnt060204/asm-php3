<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2 class="text-center mb-4">Đăng nhập</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif
            </div>
            <form action="{{route('postRegister')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" id="name" class="form-control">
                    @error("name")
                    <p class="text text-danger">{{ $message  }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Email:</label>
                    <input type="email" name="email" id="text" class="form-control">
                    @error("email")
                    <p class="text text-danger">{{ $message  }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="Password" class="form-label">Password:</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @error("password")
                    <p class="text text-danger">{{ $message  }}</p>
                    @enderror
                </div>
                    @if(session("message"))
                    <p>{{ session("message") }}</p>
                    @endif
                    <a href="login">Đã có tài khoản</a>
                <button type="submit" class="btn btn-primary">Đăng nhập</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
