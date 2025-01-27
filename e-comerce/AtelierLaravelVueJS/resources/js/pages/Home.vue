<template>
    <h1>Hi from Home</h1>
        <button @click="showModal" class="btn show-modal-btn">Ajouter produit</button>
        <form  v-if="show" class="modal">
            <div class="input-group">
                <label for="name" class="label">Nom :</label>
                <input type="text" id="name" name="name" class="input" v-model="product.name">
            </div>
            <div class="input-group">
                <label for="price" class="label">Prix :</label>
                <input type="decimal" id="price" name="price" class="input" v-model="product.price">
            </div>
            <div class="modal-actions">
                <button class="btn btn-Ajouter" @click="addProduct">Ajouter</button>
                <button @click="hideModal" type="button" class="btn btn-Annuler">Annuler</button>
            </div>
        </form>
        <div>
            <table>
            <tr>
            <td>Id </td>
            <td>Nom de produit</td>
            <td>Prix</td>
            </tr>
            <tr v-for="prod in products">
            <td >{{ prod.id }}</td>
            <td >{{ prod.name }}</td>
            <td>{{ prod.price }}</td>
            </tr>

            </table>
        </div>

</template>

<script setup>
import axios from 'axios';
import { ref , reactive , onMounted} from 'vue';

const show = ref(false); // Reactive show state

function showModal() {
    show.value = true; // Show modal
}

function hideModal() {
    show.value = false; // Hide modal
}
//jebt data mn route et affichitha fl page
const products = ref([])
const fetchData = async()=>{
    const response = await fetch('/products');
    const data = await response.json()
    return products.value = data.products
}
fetchData()

// recuperer les donner dans view -> nsiftuhum l base de donner


const product= reactive({
    name : '',
    price : ''
})
const addProduct = (e)=>{
    e.preventDefault();
    axios.post('/products', product)
        .then(response=>{
            alert("Produit ajouté avec succès !");
            products.value.push(response.data.product);
            product.name = '';
            product.price = '';
            hideModal();
        })
        .catch(error=>{
            if(error.response){
                alert("Échec de l'ajout : " + error.response.data.message);
            }
            console.error(error.message)
        });

        // n afficher star jdid

}


</script>

<style scoped>
/* Modal Styling */
.modal {
    padding: 30px;
    border: solid 1px #ccc;
    border-radius: 10px;
    width: 300px;
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

.show-modal-btn {
    background-color: #1976d2;
    color: white;
    padding: 10px 15px;
    font-size: 16px;
    border-radius: 20px;
    margin-top: 20px;
}

.show-modal-btn:hover {
    background-color: #1565c0;
}
</style>
