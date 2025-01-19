<template>
    <v-card
        color="grey-lighten-4"
        rounded="0"
        flat
    >
        <v-toolbar density="compact" color="black">
            <v-app-bar-nav-icon></v-app-bar-nav-icon>

            <Link href="/">
                <v-toolbar-title>Arkadiaonlus</v-toolbar-title>
            </Link>

            <v-spacer></v-spacer>

            <v-menu>
                <template v-slot:activator="{ props }">
                    <v-btn
                        v-bind="props"
                    >
                        <v-icon :icon="mdiAccount" />
                    </v-btn>
                </template>
                <v-list>
                    <Link :href="route('logout')" method="post">
                    <v-list-item>
                        <v-list-item-title>Logout</v-list-item-title>
                    </v-list-item>
                    </Link>
                </v-list>
            </v-menu>

            <Link href="/login" v-if="!$page.props.auth.user">
                <v-btn color="primary">
                    Login
                </v-btn>
            </Link>


        </v-toolbar>
    </v-card>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { mdiAccount } from '@mdi/js'
</script>

<style scoped>

</style>
