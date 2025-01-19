<template>
    <Head title="Lista Operatori" />

    <h2 class="text-h3 text-center text-white my-2">Lista Operatori</h2>
    <v-data-table
        class="rounded elevation-1"
        :items="props.listaOperatoriPaginate.data"
        :headers="headers"
    >
        <template v-slot:item.azioni="{ item }">
            <div :class="$vuetify.display.smAndDown ? 'flex justify-between' : ''">

                <v-btn size="small" color="red" @click="openDialog(item.id)">
                    <v-icon :icon="mdiTrashCan" />
                </v-btn>
                <v-dialog
                    v-model="dialog"
                    max-width="400"
                    persistent
                >
                    <v-card>
                        <v-card-title>Conferma Eliminazione</v-card-title>
                        <v-card-text>Sei sicuro di eliminare l'elemento con ID: <strong>{{ itemToDelete }}</strong>  ?</v-card-text>

                        <template v-slot:actions>
                            <v-spacer></v-spacer>

                            <v-btn @click="dialog = false">Annulla</v-btn>
                            <v-btn @click="confirmDelete" color="primary">Conferma</v-btn>
                        </template>
                    </v-card>
                </v-dialog>

                <v-btn size="small" color="primary" class="mx-2" @click="openDialogEdit(item)">
                    <v-icon :icon="mdiPencil" />
                </v-btn>
                <v-dialog
                    v-model="dialogEdit"
                    max-width="600"
                    persistent
                >
                    <v-card>
                        <v-card-title>Modifica Operatore</v-card-title>

                        <v-form v-model="valid">
                            <v-container>
                                <v-row>
                                    <v-col
                                        cols="12"
                                        md="4"
                                    >
                                        <v-text-field
                                            v-model="nomeEdit"
                                            :rules="nomeEditRules"
                                            label="Nome"
                                            required
                                        ></v-text-field>
                                    </v-col>

                                    <v-col
                                        cols="12"
                                        md="2"
                                    >
                                        <v-text-field
                                            v-model="oreSettEdit"
                                            label="Ore settim."
                                            required
                                        ></v-text-field>
                                    </v-col>

                                    <v-col
                                        cols="12"
                                        md="2"
                                    >
                                        <v-text-field
                                            v-model="oreSaldoEdit"
                                            label="Ore saldo"
                                            required
                                        ></v-text-field>
                                    </v-col>

                                    <v-col
                                        cols="12"
                                        md="4"
                                    >
                                        <v-text-field
                                            v-model="emailEdit"
                                            :rules="emailEditRules"
                                            label="E-mail"
                                            required
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-form>

                        <template v-slot:actions>
                            <v-spacer></v-spacer>

                            <v-btn @click="dialogEdit = false">Annulla</v-btn>
                            <v-btn @click="confirmDelete" color="primary">Conferma</v-btn>
                        </template>
                    </v-card>
                </v-dialog>

                <v-dialog
                    v-model="dialogResult"
                    max-width="400"
                    persistent
                >
                    <v-card>
                        <v-card-title>Informazione</v-card-title>
                        <v-card-text>{{ testoInfo }}</v-card-text>

                        <template v-slot:actions>
                            <v-spacer></v-spacer>

                            <v-btn @click="dialogResult = false">ok</v-btn>
                        </template>
                    </v-card>
                </v-dialog>

            </div>

        </template>
    </v-data-table>

</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import { mdiTrashCan, mdiPencil } from '@mdi/js';
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3'

const form = useForm();

const props = defineProps({ listaOperatoriPaginate: Object });
const dialog = ref(false);
const dialogEdit = ref(false);
const dialogResult = ref(false);

const itemToDelete = ref(null);
const testoInfo = ref(null);

const valid = ref(false);
const nomeEdit = ref('');
const oreSettEdit = ref('');
const oreSaldoEdit = ref('');
const emailEdit = ref('');

// Regole di validazione per il nome
const nomeEditRules = [
    value => {
        if (value) return true;
        return 'Il nome è obbligatorio.';
    }
];

// Regole di validazione per l'email
const emailEditRules = [
    value => {
        if (value) return true;
        return 'E-mail obbligatoria.';
    },
    value => {
        if (/.+@.+\..+/.test(value)) return true;
        return 'E-mail deve essere valida.';
    },
];

// Funzione per aprire il dialogo di eliminazione
function openDialog(id) {
    itemToDelete.value = id; // Memorizza l'ID dell'elemento da eliminare
    dialog.value = true; // Apri il dialogo
}

// Funzione per aprire il dialogo di modifica
function openDialogEdit(item) {
    nomeEdit.value = item.name;
    oreSettEdit.value = item.oresettimanali;
    oreSaldoEdit.value = item.oresaldo;
    emailEdit.value = item.email;
    dialogEdit.value = true; // Apri il dialogo
}

// Funzione per confermare l'eliminazione
function confirmDelete() {
    form.delete('/eliminaOperatore/'+itemToDelete.value, {
        onSuccess: () => {
            testoInfo.value = 'Eliminazione elemento id =' + itemToDelete.value + ' effettuato'
            dialogResult.value = true;
        },
    })
    dialog.value = false; // Chiudi il dialogo
}

// Configurazione delle intestazioni
const headers = [
    { title: "ID", key: "id" },
    { title: "Nome", key: "name" },
    { title: "Email", key: "email" },
    { title: "oresettimanali", key: "oresettimanali" },
    { title: "oresaldo", key: "oresaldo" },
    { title: "azioni", key: "azioni" },
];
</script>

<style scoped>
/* Stili personalizzati per l'header */
th {
    background-color: #132f65;
    text-transform: uppercase;
}
</style>
