<template>
    <h1>Listes de produits</h1>
        <button @click="showModal" class="btn show-modal-btn">Ajouter produit</button>
        <div >
            <CreateComponent v-if="show" @hideModal= "hideModal" @productAdded = "addNewProduct"
                 />
        </div>
        <div>
            <table>
            <tr>
            <td>Id </td>
            <td>Nom de produit</td>
            <td>Description</td>
            <td>Prix</td>
            <td>Action</td>
            </tr>
            <tr v-for="prod in products">
            <td >{{ prod.id }}</td>
            <td >{{ prod.name }}</td>
            <td >{{ prod.description }}</td>
            <td>{{ prod.price }}</td>
            <td>
            <button type="" @click="deleteProduct(prod.id)" >Suprimer</button>
            <button type="">Modifier</button>
            </td>

            </tr>

            </table>
        </div>

</template>

<script setup>
import axios from 'axios';
import { ref , reactive , onMounted} from 'vue';
import CreateComponent from '../Components/CreateComponent.vue'

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
onMounted(() => {
    fetchData(); // Fetch products when the component is mounted
});

// emit products
function addNewProduct(newProduct){
    products.value.push(newProduct)
}

// delete
const deleteProduct=  async (id)=>{
    if (confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')) {
        try {
            await axios.delete(`/products/${id}`); // Requête DELETE avec l'ID du produit
            products.value = products.value.filter(prod => prod.id !== id); // Mise à jour de la liste locale
            alert('Produit supprimé avec succès !');
        } catch (error) {
            console.error('Erreur lors de la suppression :', error);
            alert('Une erreur est survenue lors de la suppression du produit.');
        }
    }


}

</script>

<style scoped>
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
/* Styling pour le tableau */
table {
  width: 100%; /* Prend toute la largeur du conteneur */
  border-collapse: collapse; /* Supprime les espaces entre les bordures */
  margin-top: 20px; /* Espace entre le tableau et le reste */
  background-color: #f9f9f9; /* Couleur de fond */
  font-size: 16px; /* Taille du texte */
  text-align: left; /* Texte aligné à gauche */
  border-radius: 8px; /* Coins arrondis */
  overflow: hidden; /* Pour respecter les coins arrondis */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre discrète */
}

/* Bordure pour les cellules */
td,
th {
  padding: 12px; /* Espacement intérieur */
  border: 1px solid #ddd; /* Bordure grise claire */
}

/* Style pour les en-têtes */
th {
  background-color: #1976d2; /* Couleur principale */
  color: white; /* Texte blanc */
  font-weight: bold; /* Texte en gras */
  text-transform: uppercase; /* Texte en majuscules */
}

/* Effet survol pour les lignes */
tr:hover {
  background-color: #f1f1f1; /* Change la couleur de fond au survol */
  cursor: pointer; /* Change le curseur */
}

/* Alignement centré pour les données numériques */
td {
  text-align: center;
}

/* Largeur spécifique des colonnes si nécessaire */
td:first-child,
th:first-child {
  width: 10%; /* Id : 10% de la largeur du tableau */
}
/* Boutons d'action (Supprimer et Modifier) */
td button {
  padding: 8px 12px; /* Espacement intérieur */
  font-size: 14px; /* Taille du texte */
  border: none; /* Supprime les bordures par défaut */
  border-radius: 6px; /* Coins arrondis */
  cursor: pointer; /* Change le curseur au survol */
  transition: background-color 0.3s ease, transform 0.2s ease; /* Animation au survol */
  margin-right: 5px; /* Espacement entre les boutons */
}

/* Bouton Modifier */
td button:nth-child(2) {
  background-color: #4caf50; /* Vert pour "Modifier" */
  color: white; /* Texte blanc */
}

td button:nth-child(2):hover {
  background-color: #45a049; /* Couleur plus foncée au survol */
  transform: scale(1.05); /* Légère mise en avant */
}

/* Bouton Supprimer */
td button:nth-child(1) {
  background-color: #f44336; /* Rouge pour "Supprimer" */
  color: white; /* Texte blanc */
}

td button:nth-child(1):hover {
  background-color: #e53935; /* Couleur plus foncée au survol */
  transform: scale(1.05); /* Légère mise en avant */
}

/* Aligner les boutons au centre de la cellule */
td {
  text-align: center;
}

</style>
