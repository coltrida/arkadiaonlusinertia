<template>
    <Head title="Lista Vetture" />

    <h2 class="text-h3 text-center text-white my-2">Lista Vetture</h2>
    <v-data-table
        class="rounded elevation-1 custom-table"
        :items="props.listaVetture"
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
                        <v-card-text>Sei sicuro di eliminare la vettura con ID: <strong>{{ itemToDelete }}</strong>  ?</v-card-text>

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
                        <v-card-title>Modifica Vettura</v-card-title>

                        <v-form v-model="valid">
                            <v-container>
                                <v-row>
                                    <v-col
                                        cols="12"
                                        md="4"
                                    >
                                        <v-text-field
                                            v-model="formEdit.name"
                                            :rules="nomeEditRules"
                                            label="Nome"
                                            required
                                        ></v-text-field>
                                    </v-col>

                                </v-row>
                            </v-container>
                        </v-form>

                        <template v-slot:actions>
                            <v-spacer></v-spacer>

                            <v-btn @click="dialogEdit = false">Annulla</v-btn>
                            <v-btn @click="confirmEdit" color="primary">Conferma</v-btn>
                        </template>
                    </v-card>
                </v-dialog>

                <v-dialog
                    v-model="dialogResult"
                    max-width="400"
                    persistent
                >
                    <v-card color="light-blue-darken-4" class="pa-5">
                        <v-card-title>Informazione</v-card-title>
                        <v-card-text>{{ testoInfo }}</v-card-text>
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

const formEdit = useForm({
    name: null,
})

const props = defineProps({ listaVetture: Object });

const dialog = ref(false);
const dialogEdit = ref(false);
const dialogResult = ref(false);

const itemToDelete = ref(null);
const itemToEdit = ref(null);
const testoInfo = ref(null);

const valid = ref(false);

// Regole di validazione per il nome
const nomeEditRules = [
    value => {
        if (value) return true;
        return 'Il nome è obbligatorio.';
    }
];

// Funzione per aprire il dialogo di eliminazione
function openDialog(id) {
    itemToDelete.value = id; // Memorizza l'ID dell'elemento da eliminare
    dialog.value = true; // Apri il dialogo
}

// Funzione per aprire il dialogo di modifica
function openDialogEdit(item) {
    itemToEdit.value = item.id;
    formEdit.name = item.name;
    dialogEdit.value = true; // Apri il dialogo
}

// Funzione per confermare l'eliminazione
function confirmDelete() {
    form.delete('/eliminaCar/'+itemToDelete.value, {
        onSuccess: () => {
            testoInfo.value = 'Eliminazione elemento id = ' + itemToDelete.value + ' effettuato'
            dialogResult.value = true;
            setTimeout(() => (dialogResult.value = false), 3000)
        },
    })
    dialog.value = false; // Chiudi il dialogo
}

// Funzione per confermare la modifica
function confirmEdit() {
    formEdit.patch('/car/'+itemToEdit.value, {
        onSuccess: () => {
            testoInfo.value = 'Modifica elemento id = ' + itemToEdit.value + ' effettuata'
            dialogResult.value = true;
            setTimeout(() => (dialogResult.value = false), 3000)
        },
    })
    dialogEdit.value = false; // Chiudi il dialogo
}

// Configurazione delle intestazioni
const headers = [
    { title: "ID", key: "id" },
    { title: "Nome", key: "name" },
    { title: "azioni", key: "azioni" },
];
</script>

<style scoped>

</style>

