<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-Learning</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    {{-- <link href="{{ asset('admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('admin/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('admin/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('admin/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('admin/build/css/custom.min.css') }}" rel="stylesheet"> --}}
</head>

<style>
    /* .login {
        background: url("{{ asset('images/login_background.jpg') }}") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    } */
</style>

<body>
    <div class="vh-100">
        <div class="container py-5 h-100">
            <div class="text-center mb-5">
                <h3>Sign Up</h3>
            </div>
            <div class="row d-flex justify-content-center align-items-center">
                <form action="{{ route('postUserInfo') }}" method="post" class="col-12 col-md-8 col-lg-6 col-xl-5">
                    {{ csrf_field() }}
                    @if (isset($errors))
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endif
                    @if (Session::has('success'))
                        <div class='alert alert-success'>
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('unsuccess'))
                        <div class='alert alert-danger'>
                            {{ Session::get('unsuccess') }}
                        </div>
                    @endif
                    <div class="form-outline mb-4">
                        <select name="user_type" id="user_type" class="form-control">
                            <option value="{{ \App\Libraries\Enumerations\UserTypes::$STUDENT }}">Student</option>
                            <option value="{{ \App\Libraries\Enumerations\UserTypes::$TEACHER }}">Teacher</option>
                        </select>
                    </div>
                    <div id="student_more_">
                        <div class="form-outline mb-4">
                            @isset($departments)
                                <select name="department_id" id="" class="form-control">
                                    @foreach ($departments as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            @endisset
                        </div>
                        <div class="form-outline mb-4">
                            <select name="academic_year" id="" class="form-control">
                                <option value="{{ 1 }}">Năm 1</option>
                                <option value="{{ 2 }}">Năm 2</option>
                                <option value="{{ 3 }}">Năm 3</option>
                                <option value="{{ 4 }}">Năm 4</option>
                            </select>
                        </div>
                    </div>
                    <script>
                        var selectElement = document.getElementById("user_type");
                        var pElement = document.getElementById("student_more_");

                        selectElement.addEventListener("change", function() {
                            if (this.value === "0") {
                                pElement.style.display = "block";
                            } else {
                                pElement.style.display = "none";
                            }
                        });
                    </script>

                    <div class="form-outline mb-4">
                        <input type="text" class="form-control" placeholder="Name" name="name" required="" />
                    </div>


                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" required name="email" id="email_id" placeholder="Email"
                            class="form-control" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" required name="password" id="form2Example2" class="form-control"
                            placeholder="Password" />
                    </div>

                    <!-- Password confirmation -->
                    <div class="form-outline mb-4">
                        <input type="password" required name="password_confirmation" class="form-control"
                            placeholder="Confirm Password " />
                    </div>
                    <input id="" type="hidden" name="urlPath" value="{{ $urlPath }}">

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                        <div class="col d-flex justify-content-center">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" name="remember" type="checkbox" value=""
                                    id="form2Example31" checked />
                                <label class="form-check-label" for="form2Example31"> Remember me </label>
                            </div>
                        </div>

                        <div class="col">
                            <!-- Simple link -->
                            <a href="{{ route('login') }}">Sign In</a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>

                    <!-- Register buttons -->
                    <div class="text-center">

                        <p>or sign up with:</p>
                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-facebook-f"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-google"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-twitter"></i>
                        </button>

                        <button type="button" class="btn btn-link btn-floating mx-1">
                            <i class="fab fa-github"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>
