<script setup>
    import Navigazione from '../Components/BarraNavigazione.vue'
</script>

<template>
    <v-app class="gradient-background">
        <v-main>
            <header>
                <Navigazione />
            </header>

            <v-container>
                <slot />
            </v-container>
        </v-main>
    </v-app>
</template>

<style scoped>
.gradient-background {
    background: linear-gradient(to bottom, red, black);
    min-height: 100vh; /* Imposta l'altezza del contenitore */
}
</style>
