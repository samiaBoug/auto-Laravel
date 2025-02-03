<template>

<form  class="modal">
    <div class="input-group">
        <label for="name" class="label">Nom :</label>
        <input type="text" id="name" name="name" class="input" v-model="product.name">
    </div>
    <div class="input-group">
        <label for="name" class="label">Description :</label>
        <input type="text" id="name" name="name" class="input" v-model="product.description">
    </div>
    <div class="input-group">
        <label for="price" class="label">Prix :</label>
        <input type="decimal" id="price" name="price" class="input" v-model="product.price" >
    </div>
    <div class="modal-actions">
        <button class="btn btn-Ajouter" @click="addProduct">Ajouter</button>
        <button @click="$emit('hideModal')" type="button" class="btn btn-Annuler">Annuler</button>
    </div>

</form>

</template>
<script setup>
import axios from 'axios';
import { ref , reactive , onMounted} from 'vue';
import CreateComponent from '../Components/CreateComponent.vue'


const emit = defineEmits(['productAdded', 'hideModal']);

// recuperer les donner dans view -> nsiftuhum l base de donner

const product= reactive({
    name : '',
    description :'',
    price : ''
})
const addProduct = (e)=>{
    e.preventDefault();
    axios.post('/products', product)
        .then(response=>{
            alert("Produit ajouté avec succès !");
            emit('productAdded', response.data.product);
            product.name = '';
            product.price = '';
            emit('hideModal');
        })
        .catch(error=>{
            if(error.response){
                alert("Échec de l'ajout : " + error.response.data.message);
            }
            console.error(error.message)
        });
}

</script>
<style scoped>
/* Modal Styling */
.modal {
    padding: 30px;
    border: solid 1px #ccc;
    border-radius: 10px;
    width: fit-content;
    position: fixed;
    top: 20%;
    left: 50%;
    transform: translateX(-50%);
    background-color: #e0f7fa;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    z-index: 999;
    display: flex;
    flex-direction: column;
    align-items: center;
    height: fit-content;

}

/* Input Styling */
.input-group {
    margin-bottom: 20px;
    width: 100%;
}

.label {
    display: block;
    font-size: 14px;
    color: #333;
    margin-bottom: 5px;
}

.input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 14px;
    transition: border 0.3s ease;
}

.input:focus {
    outline: none;
    border-color: #00796b;
}

/* Button Styling */
.btn {
    padding: 12px 20px;
    border: none;
    border-radius: 20px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin: 5px;
}

.btn:hover {
    font-weight: bold;
    opacity: 0.9;
}

/* Specific Button Styles */
.btn-Ajouter {
    background-color: #4CAF50;
    color: white;
}

.btn-Annuler {
    background-color: #d32f2f;
    color: white;
}

/* Layout adjustments */
.modal-actions {
    display: flex;
    justify-content: space-between;
    width: 100%;
}


</style>

