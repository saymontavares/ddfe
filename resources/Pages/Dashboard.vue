<template>
    <h1>Bem vindo ao painel</h1>
    <Link :href="route('auth.logout')">Home</Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'

export default {
    components: {
        Link
    }
}
</script>

<style>

</style>