<script>

//Importo AXIOS
import axios from 'axios';

export default {
    name: 'ApiContent',



    mounted() {

        axios.get('http://localhost:8000/api/v1/test')
            .then(res => {

                const data = res.data;
                console.log(data);

            })
            .catch(err => {
                console.err(err);
            })

    }
}
</script>

<template>
    <h1>hello world from api content!</h1>
</template>