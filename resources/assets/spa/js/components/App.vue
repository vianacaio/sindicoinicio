<template>
    <div id="app">

        <header> 


        </header>

        <main>
            
            <router-view></router-view>  
            
        </main>

        <footer class="page-footer">
            <div class="footer-copyright">
                <div class="container">
                    c {{ year }} <a class="grey-text text-lighten-4" href="http://www.sindicoamigo.com.br">Síndico Amigo</a>

                </div>

            </div>

        </footer>


    </div>
</template>





<script type="text/javascript">
    export default {
        
        data() {
            return {
                year: new Date().getFullYear()
            }
        }



//        data(){
//            return {
//                menus: [
//                    {name: "Dashboard", routeName:'dashboard'},
//                    {name: "Contas a pagar", routeName:'bill-pay.list', dropdownId:'bill-pay'},
//                    {name: "Contar a receber", routeName: 'bill-receive.list', dropdownId:'bill-receive'}
//                ],
//                menusDropdown: [
//                    {
//                        id: 'bill-pay', items: [
//                        {id: 0, name: "Listar contas", routeName:'bill-pay.list'},
//                        {id: 1, name: "Criar conta", routeName: 'bill-pay.create'}
//                    ]
//                    },
//                    {
//                        id: 'bill-receive', items: [
//                        {id: 0, name: "Listar contas", routeName: 'bill-receive.list'},
//                        {id: 1, name: "Criar conta", routeName: 'bill-receive.create'}
//                    ]
//                    }
//                ]
//            };
//        }
    };
</script>

<style type="text/css">
    
    #app {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
}

main {
    
    flex: 1 0 auto;
}


    
</style>