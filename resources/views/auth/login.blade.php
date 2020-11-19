@extends('layouts.auth')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Файл хадгалах санд нэвтрэх</div>
            <div class="panel-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Үүпс!</strong> @lang('quickadmin.qa_there_were_problems_with_input'):
                    <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form class="form-horizontal"
                      role="form"
                      method="POST"
                      action="{{ url('login') }}">
                    <input type="hidden"
                           name="_token"
                           value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-md-4 control-label">Шуудан</label>

                        <div class="col-md-6">
                            <input type="email"
                                   class="form-control"
                                   name="email"
                                   value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Нууц үг</label>

                        <div class="col-md-6">
                            <input type="password"
                                   class="form-control"
                                   name="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                           <!-- <a href="{{ route('auth.password.reset') }}">Нууц үгээ мартсан</a>
                            <br>-->
                            <a href="{{ route('auth.register') }}">Бүртгэл үүсгэх</a>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <label>
                                <input type="checkbox"
                                       name="remember"> Хадгалах
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit"
                                    class="btn btn-primary"
                                    style="margin-right: 15px;">
                                Нэвтрэх
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection