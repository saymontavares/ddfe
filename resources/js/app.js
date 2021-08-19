require('./bootstrap');

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import { defineRule, configure } from "vee-validate";
import AllRules from "@vee-validate/rules";

Object.keys(AllRules).forEach(rule => {
  defineRule(rule, AllRules[rule]);
});

InertiaProgress.init()

createInertiaApp({
  resolve: name => import(`./../Pages/${name}`),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})