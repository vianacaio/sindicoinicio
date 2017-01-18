<template>

	

<div class="container full">
    <div class="row full-height">

        <div class="col s8 offset-s2 z-depth-2">
        <h5 class="center">Efetuando logout...</h5>

            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                   <div class="circle-clipper left">
                 <div class="circle"></div>
                </div><div class="gap-patch">
              <div class="circle"></div>
            </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>     

        </div>
    </div>
</div>



</template>


<script type="text/javascript">
	import Auth from '../services/auth';
	export default {

      ready() {
        setTimeout(() => {
          this.logout();
        }, 1000);

      },
		
		 methods: {
            logout() {
                let goToLogin =  () => this.$router.go({name: 'auth.login'});
                Auth.logout() 
                        .then(goToLogin())
                        .catch(goToLogin());
            
            }
        }
    }
</script>