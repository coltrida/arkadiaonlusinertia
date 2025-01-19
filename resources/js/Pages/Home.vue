<template>
    <Head title="Home"/>

    <v-row :no-gutters="$vuetify.display.smAndDown">
        <v-col cols="12" sm="4" class="text-center">
            <v-btn
                block
                color="primary"
                size="x-large"
                :class="$vuetify.display.smAndDown ? 'mb-2' : ''"
            >
                Presenze Attività
            </v-btn>
        </v-col>
        <v-col cols="12" sm="4" class="text-center">
            <v-btn
                block
                color="primary"
                size="x-large"
                :class="$vuetify.display.smAndDown ? 'mb-2' : ''"
            >
                Presenze Operatori
            </v-btn>
        </v-col>
        <v-col cols="12" sm="4" class="text-center">
            <v-btn
                block
                color="primary"
                size="x-large"
                :class="$vuetify.display.smAndDown ? 'mb-2' : ''"
            >
                Inserisci Chilometri
            </v-btn>
        </v-col>
    </v-row>

    <v-row :no-gutters="$vuetify.display.smAndDown" :class="$vuetify.display.smAndDown ? '' : 'mt-2'">
        <v-col cols="12" sm="4" class="text-center">
            <v-btn
                block
                color="primary"
                size="x-large"
                :class="$vuetify.display.smAndDown ? 'mb-2' : ''"
            >
                Inserisci Vettura
            </v-btn>
        </v-col>
        <v-col cols="12" sm="4" class="text-center">
            <v-btn
                block
                color="primary"
                size="x-large"
                :class="$vuetify.display.smAndDown ? 'mb-2' : ''"
            >
                Inserisci Attività
            </v-btn>
        </v-col>
        <v-col cols="12" sm="4" class="text-center">
            <v-btn
                block
                color="primary"
                size="x-large"
                :class="$vuetify.display.smAndDown ? 'mb-2' : ''"
            >
                Inserisci Cliente
            </v-btn>
        </v-col>
    </v-row>

    <v-row :no-gutters="$vuetify.display.smAndDown" :class="$vuetify.display.smAndDown ? '' : 'mt-2'">
        <v-col cols="12" sm="4" class="text-center">
            <v-btn
                block
                color="primary"
                size="x-large"
                :class="$vuetify.display.smAndDown ? 'mb-2' : ''"
            >
                Statistiche
            </v-btn>
        </v-col>
        <v-col cols="12" sm="4" class="text-center">
            <v-btn
                block
                color="primary"
                size="x-large"
                :class="$vuetify.display.smAndDown ? 'mb-2' : ''"
            >
                Associa e Log
            </v-btn>
        </v-col>
        <v-col cols="12" sm="4" class="text-center">
            <v-btn
                block
                color="primary"
                size="x-large"
                :class="$vuetify.display.smAndDown ? 'mb-2' : ''"
            >
                Agricoltura
            </v-btn>
        </v-col>
    </v-row>

    <v-row :no-gutters="$vuetify.display.smAndDown" :class="$vuetify.display.smAndDown ? '' : 'mt-2'">
        <v-col cols="12" sm="4" class="text-center">
            <v-btn
                block
                color="primary"
                size="x-large"
                :class="$vuetify.display.smAndDown ? 'mb-2' : ''"
            >
                Aggiorna Database
            </v-btn>
        </v-col>
        <v-col cols="12" sm="4" class="text-center">
            <v-btn
                block
                color="primary"
                size="x-large"
                :class="$vuetify.display.smAndDown ? 'mb-2' : ''"
            >
                Inserisci Ricevuta
            </v-btn>
        </v-col>
        <v-col cols="12" sm="4" class="text-center">
            <v-btn
                block
                color="primary"
                size="x-large"
                :class="$vuetify.display.smAndDown ? 'mb-2' : ''"
            >
                Lista Operatori
            </v-btn>
        </v-col>
    </v-row>

</template>


<script setup>
import {Head} from '@inertiajs/vue3'
</script>

<style scoped>

</style>
