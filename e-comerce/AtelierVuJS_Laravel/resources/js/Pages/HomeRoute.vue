<script setup>

</script>

<template>

    <h2>Add product</h2>
    <button @click="showForm">Ajouter produit</button>
    <div v-if="show" class="modal">
        <div>
        <form action="POST">
            <label for="">Nom :</label>
            <input type="text">
            <label for="">Prenom :</label>
            <input type="text" name="" id="">
            <label for="">Prix :</label>
            <input type="decimal">
            <button type="submit">Ajouter</button>
        </form>
        <button @click="hideForm">Annuler</button>
    </div>
    </div>
</template>

<script setup>
import { ref } from "vue";

const show= ref()
function showForm(){
    show.value = true
}
function hideForm(){
    show.value = false
}

</script>

<style >
.modal{
    background-color: rgb(168, 168, 168);
    width: 100vw;
    height: 100vh;
    position: fixed;
    display: flex;
    justify-content: center;
    align-content: center;
    left: ;
}
</style>