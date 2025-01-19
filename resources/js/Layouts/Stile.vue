<script setup>
import Navigazione from '../Components/BarraNavigazione.vue'
</script>

<template>
    <v-app>
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
