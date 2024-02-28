<script>

//Importo AXIOS
import axios from 'axios';

export default {
    name: 'ApiContent',

    data() {
        return {
            technologies: [], //Array per inserire le mie tecnologie

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
        }
    },
    mounted() {

        axios.get('http://localhost:8000/api/v1/technologies')
            .then(res => {

                const data = res.data;

                if (data.status == 'success')
                    this.technologies = data.technologies;
            })
            .catch(err => {
                console.err(err);
            });
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
</template>