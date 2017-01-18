import LocalStorage from './services/localStorage';
import appConfig from './services/appConfig';


require('materialize-css');

window.Vue = require('vue');

// require('jquery');
// require('bootstrap-sass');

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from "laravel-echo"

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });


require('vue-resource');
Vue.http.options.root = appConfig.api_url;

require('./services/interceptors');
require('./router');

