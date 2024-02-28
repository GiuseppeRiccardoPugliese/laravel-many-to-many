<script>

//Importo AXIOS
import axios from 'axios';

export default {
    name: 'ApiContent',

    data() {
        return {
            technologies: [],
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
            })

    }
}
</script>

<template>
    <h1>Technologies: </h1>

    <ul>
        <li v-for="technology in technologies" :key="technology.id">
            <h2>{{ technology.name }}</h2>
        </li>
    </ul>
</template>