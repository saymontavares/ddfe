<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div>
        <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow" />
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
          Faça o login na sua conta
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600">
          Ou
          {{ ' ' }}
          <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
            cadastre-se é GRÁTIS!
          </a>
        </p>

        <p class="mt-2 text-center text-sm text-red-500" v-show="$page.props.flash.message">
          {{ $page.props.flash.message }}
        </p>
      </div>
      <Form @submit="onSubmit" class="mt-8 space-y-6" v-slot="{ errors }">
        <div class="rounded-md shadow-sm -space-y-px">
          <div>
            <label for="email" class="sr-only">E-amil</label>
            <Field
              name="email"
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
              placeholder="E-mail"
              :class="{ 'border-red-500': errors.email }"
              :rules="{ email: true, required: true }"
              v-model="formLogin.email"
            />
            <!-- <ErrorMessage name="email" class="mb-2 text-xs text-red-600" as="p" /> -->
          </div>
          <div>
            <label for="password" class="sr-only">Senha</label>
            <Field
              name="password"
              type="password"
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
              :class="{ 'border-red-500': errors.password }"
              placeholder="Senha"
              :rules="{ required: true }"
              v-model="formLogin.senha"
            />
            <!-- <ErrorMessage name="password" class="mb-2 text-xs text-red-600" as="p" /> -->
          </div>
        </div>

        <div class="flex items-center justify-between">
          <div class="text-sm">
            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
              Esqueceu sua senha?
            </a>
          </div>
        </div>

        <div>
          <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <LockClosedIcon class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" aria-hidden="true" />
            </span>
            Log in
          </button>
        </div>
      </Form>
    </div>
  </div>
</template>

<script>
import { LockClosedIcon } from '@heroicons/vue/solid'
import { Form, Field, ErrorMessage } from 'vee-validate';

export default {
  components: {
    LockClosedIcon,
    Form,
    Field,
    ErrorMessage,
  },
  data() {
    return{
      formLogin: {
        email: null,
        senha: null
      }
    }
  },
  methods: {
      onSubmit() {
        this.$inertia.post(route('auth.login'), this.formLogin)
      }
  }
}
</script>