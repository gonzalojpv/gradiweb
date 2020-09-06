import Vue from 'vue'
import Vuex from 'vuex'

import auth from './modules/auth'
import contact from './modules/contact'
import feedback from './modules/feedback'
import car from './modules/car'

Vue.use(Vuex)

const modules = {
    auth,
    contact,
    feedback,
    car,
};

const store = new Vuex.Store({
    modules,
});

// Automatically run the `init` action for every module,
// if one exists.
for (const moduleName of Object.keys(modules)) {
    if (modules[moduleName].actions && modules[moduleName].actions.init) {
        store.dispatch(`${moduleName}/init`)
    }
}

export {
    store
}
