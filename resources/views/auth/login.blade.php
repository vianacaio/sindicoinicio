@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <br>
        <br>
        <div class="col s8 offset-s2 z-depth-2">

            <h3 class="center">Síndico Amigo</h3>

            <form method="POST" action="{{ env('URL_ADMIN_LOGIN') }}">
                {{ csrf_field() }}

                <div class="row">

                    <div class="input-field col s12">

                        <?php $messageError = $errors->has('email') ? "data-error='{$errors->first('email')}'" : null ?>

                        <input id="email"
                               type="text"
                               class="validate {{$messageError ? 'invalid' : $messageError}}"
                               name="email"
                               value="{{ old('email') }}"
                               autofocus>

                        <label for="email" {!! $messageError !!}>E-Mail</label>

                    </div>

                </div>

                <div class="row">

                    <div class="input-field col s12">

                        <?php $messageError = $errors->has('password') ? "data-error='{$errors->first('password')}'" : null ?>

                        <input id="password"
                               type="password"
                               class="validate {{$messageError ? 'invalid' : $messageError}}"
                               name="password"
                               value="{{ old('password') }}"
                               >

                        <label for="password" {!! $messageError !!}>Senha</label>

                    </div>

                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <div class="checkbox">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember"> Lembrar-me</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <button type="submit" class="btn">Login</button>
                        <a class="btn btn-link" href="{{ url('/password/reset') }}">
                            Esqueceu sua senha?
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection