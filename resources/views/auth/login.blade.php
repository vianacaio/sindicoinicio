@extends('layouts.home')

@section('content')
<div class="container full-height">
    <div class="row full-height">

        <div id="login-container" class="small-12 medium-6 medium-offset-3 large-4 large-offset-4 columns full-height">

            <figure class="text-center">
              <img src="{{ asset('img/logo-big.png') }}" alt="">
            </figure>

            <form method="POST" action="{{ env('URL_ADMIN_LOGIN') }}">
                {{ csrf_field() }}

                

                    <div class="input-field col s12">

                        <?php $messageError = $errors->has('email') ? "data-error='{$errors->first('email')}'" : null ?>
                        <label for="email" {!! $messageError !!}>E-Mail</label>
                        <input id="email"
                               type="text"
                               class="validate {{$messageError ? 'invalid' : $messageError}}"
                               name="email"
                               value="{{ old('email') }}"
                               autofocus>

                    </div>

                    <div class="input-field col s12">

                        <?php $messageError = $errors->has('password') ? "data-error='{$errors->first('password')}'" : null ?>

                        <label for="password" {!! $messageError !!}>Senha</label>
                        <input id="password"
                               type="password"
                               class="validate {{$messageError ? 'invalid' : $messageError}}"
                               name="password"
                               value="{{ old('password') }}"
                               >

                    </div>

                    <div class="small-12 float-left">
                      <button class="button success small expanded"><i class="fa fa-user" aria-hidden="true"></i> Entrar</button>
                      <button class="button small expanded"><i class="fa fa-facebook-official" aria-hidden="true"></i> Entrar com o facebook</button>
                    </div>

                    <div class="input-field col s12">
                        <div class="checkbox">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember"> Lembrar-me</label>
                        </div>
                    </div>
                

                    <div class="input-field col s12">
                        <button type="submit" class="btn">Login</button>
                        <a class="btn btn-link" href="{{ url('/password/reset') }}">
                            Esqueceu sua senha?
                        </a>
                    </div>
                
            </form>

        </div>
    </div>
</div>
@endsection