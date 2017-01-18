<template>
	

<div class="container full-height">
    <div class="row full-height">

        <div id="login-container" class="small-12 medium-6 medium-offset-3 large-4 large-offset-4 columns full-height">

            <!-- <figure class="text-center">
              <img src="{{ asset('img/logo-big.png') }}" alt="">
            </figure> -->

            <div class="row" v-if="error.error">
              
              <div class="col s12">
                <div class="card-panel red">
                  <span class="white-text">{{error.message}}</span>

                </div>  

              </div>

            </div>


            <form method="POST" @submit.prevent="login()">
                
                

                    <div class="input-field col s12">

                       
                        <label for="email" class="active">E-Mail</label>
                        <input id="email"
                               type="text"
                               class="validate"
                               name="email"
                               v-model="user.email" required autofocus>

                    </div>

                    <div class="input-field col s12">

                        
                        <label for="password" class="active">Senha</label>
                        <input id="password"
                               type="password"
                               class="validate"
                               name="password"
                               v-model="user.password">

                    </div>


                    <div class="row">
                    	<div class="input-field col s12">
                    			<button type="submit" class="btn">Login</button>
                    	</div>


                    </div>

                 <!--    <div class="small-12 float-left">
                      <button class="button success small expanded"><i class="fa fa-user" aria-hidden="true"></i> Entrar</button>
                      <button class="button small expanded"><i class="fa fa-facebook-official" aria-hidden="true"></i> Entrar com o facebook</button>
                    </div>

                    <div class="input-field col s12">
                        <div class="checkbox">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember"> Lembrar-me</label>
                        </div>
                    </div>
                 -->

                   <!--  <div class="input-field col s12">
                        <button type="submit" class="btn">Login</button>
                        <a class="btn btn-link" href="{{ url('/password/reset') }}">
                            Esqueceu sua senha?
                        </a>
                    </div> -->
                
            </form>

        </div>
    </div>
</div>



</template>


<script type="text/javascript">
	import Auth from '../services/auth';
	export default {
		data() {
			return {
				user: {
					email: '',
					password: ''
				},
        error: {
          error: false,
          message: ''
        }
			}
		},
		 methods: {
            login() {
                Auth.login(this.user.email, this.user.password)
                        .then( () => this.$router.go({name: 'dashboard'}))
                        .catch( response => {
                            switch(response.status) {
                                case 401:
                                    this.error.message = response.data.message;
                                    break
                                default:
                                    this.error.message = "Login failed."
                            }
                        })
                this.error.error = true;
            }
        }
    }
</script>