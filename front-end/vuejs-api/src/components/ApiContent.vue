<script>

//Importo AXIOS
import axios from 'axios';

export default {
    name: 'ApiContent',

    data() {
        return {
            technologies: [], //Array per inserire le mie tecnologie

            currentPage: 1, //Salvo la pagina CORRENTE per le PAGINATION

            pageLinks: [], //Array per gestire i LINKS delle PAGINATION

            createFormActive: false, //Variabile per l'if & else

            newTech: { //Variabile per la nuova Technology
                name: '',
            }
        }
    },
    methods: {
        toggleCreateNewTech() {
            this.createFormActive = true;
        },
        submitNewTech() {
            axios.post('http://localhost:8000/api/v1/technologies', this.newTech)
                .then(res => {

                    const data = res.data;

                    if (data.status == 'success')
                        this.technologies.push(data.technology);
                    this.createFormActive = false;

                })
                .catch(err => {
                    console.err(err);
                });

            // console.log('submit with:', this.newTech);
        },
        changePage(url) {
            axios.get(url)
                .then(res => {

                    const data = res.data;

                    if (data.status == 'success')
                        this.currentPage = data.technologies.current_page;
                    //Salvo i miei dati
                    this.pageLinks = data.technologies.links;
                    this.technologies = data.technologies.data;
                })
                .catch(err => {
                    console.err(err);
                });
        }
    },
    mounted() {
        this.changePage('http://localhost:8000/api/v1/technologies');
    }
};
</script>

<template>
    <h1>Technologies: </h1>

    <form v-if="createFormActive" @submit.prevent="submitNewTech">
        <label for="name">Name: </label>
        <input v-model="newTech.name" type="text" name="name" id="name">
        <br>
        <input type="submit" value="CREATE">
    </form>

    <div v-else>
        <button @click="toggleCreateNewTech">Create New Tech</button>

        <ul>
            <li v-for="technology in technologies" :key="technology.id">
                <h2>{{ technology.name }}</h2>
            </li>
        </ul>
    </div>

    <!-- Gestione delle pagine attraverso l'oggettone link -->
    <div>
        <ul>
            <li v-for="link in pageLinks" :key="link">
                <button @click="changePage(link.url)" v-html="link.label" :class="link.active ? 'bg-light' : ''" />
            </li>
        </ul>
    </div>
</template>

<style scoped>
ul {
    list-style-type: none;
}

button.bg-light {
    background-color: white;
    color: black;
}
</style>
